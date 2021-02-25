<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\writerregister;
use App\Models\ActiveJob;
use App\Models\Bid;
use App\Models\Message;
use App\Models\Notification;
use App\Models\Order;
use App\Models\TimeExtension;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class accountController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }
    public function index()
    {
        $clients = User::where('user_category', 'client')->get();
        $writers = User::where('user_category', 'writer')->get();
        $orders = Order::where('status', 'admin')->get();
        $extensions = TimeExtension::where('status', 'waiting')->get();
        $activebids = Order::where('status', 'active')->get();
        $completedorders = Order::where('status', 'completed')->get();
        $completedjobs = ActiveJob::where('task_status', 'completed')->get();
        $notifications = Notification::where('receiver', auth()->user()->email)->get();
        return view('admin.dashboard', compact(['clients', 'writers', 'orders', 'completedorders', 'activebids', 'extensions', 'completedjobs', 'notifications']));
    }

    public function notifications()
    {
        $notifications = Message::where('receiver', "support staff")->get();
        return view('admin.notifications', compact('notifications'));
    }
    public function availableorders()
    {
        $orders = Order::where('status', 'admin')->get();
        return view('admin.neworders', compact('orders'));
    }

    public function orderdetails($token)
    {
        $order = Order::where('task_id', $token)->first();

        if ($order == '') {
            return redirect()->back();
        } else {
            return view('admin.orderdetails', compact('order'));
        }
    }

    public function allwriters()
    {
        $writers = User::where('user_category', 'writer')->get();
        return view('admin.allwriters', compact('writers'));
    }

    public function writerdetails($token)
    {
        $user = User::query()
            ->where('user_category', 'writer')
            ->where('userid', $token)
            ->first();
        $tasks = ActiveJob::query()
            ->where('writer_email', $user->email) 
            ->where('task_status', "completed")
            ->get();
        $progresstasks = ActiveJob::query()
            ->where('writer_email', $user->email) 
            ->where('task_status', "in progress")
            ->get();
        $bids = Bid::query()
            ->where('writer_email', $user->email)  
            ->get();

        return view('admin.writerdetails', compact(['user', 'tasks', 'progresstasks', 'bids']));
    }

    public function addnewwriter()
    {
        return view('admin.newwriter');
    }
    public function registerwriter(Request $request)
    {
        $this->validate($request, [
            'full_names' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|numeric|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'

        ]);
        $token = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
        $user = new User;
        $user->name = $request->input('full_names');
        $user->email = $request->input('email');
        $user->user_category = "writer";
        $user->phone_number = $request->input('phone_number');
        $user->password = bcrypt($request->input('password'));
        $user->userid = $token;
        $user->verification_code = sha1(time());
        $user->save();
        $user->attachRole('user');
        $data = array(
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'code' => $user->verification_code
        );


        // Mail::to($user->email)->send(new writerregister($data));
        Toastr::info('Writer Account has been created.Notify the client to check his/her email', 'Success',  ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function suspendwriter()
    {
        $writers = User::query()
            ->where('user_category', 'writer')
            ->where('status', 'ACTIVE')
            ->get();
        return view('admin.suspendwriter', compact('writers'));
    }
    public function blockwriter(Request $request, $token)
    {
        $user = User::where('userid', $token)->first();
        $user->status = "BLOCKED";
        $user->save();
        Toastr::info('Writer Account has been blocked', 'Success',  ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function blockedwriters()
    {
        $writers = User::query()
            ->where('user_category', 'writer')
            ->where('status', 'BLOCKED')
            ->get();
        return view('admin.blockedwriters', compact('writers'));
    }
    public function unblockwriter($token)
    {
        $user = User::where('userid', $token)->first();
        $user->status = "ACTIVE";
        $user->save();
        return redirect('admin/all-writers');
    }
    public function deletewriter($token)
    {
        $user = User::where('userid', $token)->first();
        if ($user->picture !== '') {
            Storage::delete('/public/profiles/' . $user->picture);
        }
        $user->delete();
        Toastr::warning('Writer Account has been deleted', 'Success',  ["positionClass" => "toast-top-right"]);
        return redirect('admin/all-writers');
    }

    public function allclients()
    {
        $clients = User::where('user_category', 'client')->get();
        return view('admin.allclients', compact('clients'));
    }

    public function clientdetails($token)
    {
        $user = User::query()
            ->where('user_category', 'client')
            ->where('userid', $token)
            ->first();
        return view('admin.clientdetails', compact('user'));
    }

    public function viewbidsplaced($token)
    {
        $order = Order::where('task_id', $token)->first();
        $bids = Bid::query()
            ->where('order_id', $token)
            ->get();
        return view('admin.writerbids', compact(['bids', 'order']));
    }
    public function publishorder($token)
    {
        $order = Order::where('task_id', $token)->first();
        $order->status = "active";

        $order->save();
        Toastr::warning('Order has been published', 'Success',  ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function allocatetask(Request $request, $token, $client)
    {
        $clientdetails = Order::where('task_id', $token)->first();
        $writerdetails = User::where('email', $client)->first();
        $bid = Bid::query()
            ->where('writer_email', $client)
            ->where('order_id', $token)
            ->first();
        $job = new ActiveJob;
        $job->order_id = $token;
        $job->client_email = $clientdetails->client_email;
        $job->client_id = $clientdetails->client_id;
        $job->writer_id = $writerdetails->userid;
        $job->writer_email = $writerdetails->email;
        $job->task_category = $clientdetails->category;
        $job->bid_amount = $bid->bid_amount;
        $job->task_amount = $clientdetails->amount;
        $job->task_amount = $clientdetails->amount;
        $job->task_status = "in progress";
        $job->client_remarks = "";
        $job->solution_format = $clientdetails->solution_format;
        $job->payment_status = "pending";
        $job->penalties_awarded = "pending";
        $job->submission_date = $clientdetails->submission_date;
        $job->save();

        $clientdetails->status = "in progress";
        $clientdetails->save();


        $bids = Bid::where('order_id', $token)->get();
        foreach ($bids as $bid) {
            $bid->delete();
        }

        $alert = new Notification;
        $alert->sender = auth()->user()->email;
        $alert->receiver = $client;
        $alert->task_id = $token;
        $alert->topic = "Congratulations";
        $alert->description = "Your bid was Successfull for Order Id Number" . $token;
        $alert->status = "new";
        $alert->save();

        Toastr::warning('Order has been assigned to writer', 'Success',  ["positionClass" => "toast-top-right"]);
        return redirect()->route('superadmin');
    }
    public function allrevisions()
    {
        $jobs = ActiveJob::where('task_status', 'rejected')->get();

        return view('admin.allrevisions', compact('jobs'));
    }

    public function orderrevisiondetails($token)
    {
        $order = ActiveJob::query()
            ->where('task_status', "rejected")
            ->where('order_id', $token)
            ->first();
        return view('admin.orderrevisiondetails', compact('order'));
    }

    public function notifyclientrevision(Request $request)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);

        $alert = new Notification;
        $alert->sender = auth()->user()->email;
        $alert->receiver = $request->input('writeremail');
        $alert->task_id = $request->input('taskid');
        $alert->topic = "Revision Needed";
        $alert->description = $request->input('description');
        $alert->status = "new";
        $alert->save();

        Toastr::warning('Notification send to Writer', 'Success',  ["positionClass" => "toast-top-right"]);
        return redirect()->route('superadmin');
    }
    public function opendeadlineextension($token)
    {
        $task = TimeExtension::where('task_id', $token)->first();
        return view('admin.timeextension', compact('task'));
    }

    public function timeextensionresponse(Request $request, $token)
    {
        $this->validate($request, [
            'description' => 'required',
            'decision' => 'required'
        ]);

        $decision = $request->input('decision');
        if ($decision == "Accepted") {
            $job = TimeExtension::where('task_id', $token)->first();
            $clienttime = $job->time_requested;
            $currentdeadline = $job->current_deadline;

            $check = strtotime($currentdeadline);
            $seconds = ($clienttime * 3600);
            $finaldates = $seconds + $check;

            // dd($finaldates);
            $newfinaldates = date('d/m/Y, h:i:s', $finaldates);

            
            // $job->current_deadline = $newfinaldates;
            $job->status = "Accepted";
            $job->save();

            // UPDATING ORDERS TABLE
            // $order = Order::where('task_id', $token)->first();
            
            // $order->submission_date = $job->current_deadline;
             
            // $order->save();
            // UPDATING ACTIVE JOB TABLE
            // $jobtable = ActiveJob::where('order_id', $token)->first();
            // $jobtable->submission_date = $job->current_deadline;
            // $jobtable->save();


            // SENDIN NOTIFICATION TO WRITER

            $alert = new Notification;
            $alert->sender = auth()->user()->email;
            $alert->receiver = $job->writer_email;
            $alert->task_id = $token;
            $alert->topic = "Time Extension Request Accepted";
            $alert->description = $request->input('description');
            $alert->status = "new";
            $alert->save();

            Toastr::warning('Deadline extension allocated and send to Writer', 'Success',  ["positionClass" => "toast-top-right"]);
            return redirect()->route('superadmin');
        } else {

            $job = TimeExtension::where('task_id', $token)->first();
            $alert = new Notification;
            $alert->sender = auth()->user()->email;
            $alert->receiver = $job->writer_email;
            $alert->task_id = $token;
            $alert->topic = "Time Extension Request Accepted";
            $alert->description = $request->input('description');
            $alert->status = "new";
            $alert->save();

            Toastr::warning('Deadline extension rejected and send to Writer', 'Success',  ["positionClass" => "toast-top-right"]);
            return redirect()->route('superadmin');
        }
    }



    public function startthread(Request $request){
        $this->validate($request, [
            'description' => 'required',
            'taskid' => 'required',
            'receiver' => 'required|email',
        ]);

        $chat = new Message;
        $chat->sender = "support staff";
        $chat->receiver = $request->input('receiver');
        $chat->task_id = $request->input('taskid');
        $chat->description = $request->input('description');
        $chat->status = "new";
        $chat->save();

        return redirect('admin/admin-notifications');

    }

    public function openthread($token){
        $messages  = Message::query()
                            ->where('task_id', $token)
                            ->where('sender',  "support staff")
                            ->orWhere('receiver',  "support staff")
                            ->get();
        return view('admin.openthread', compact(['messages', 'token']));

    }

    public function sendthreadmessage(Request $request, $token){
        $this->validate($request, [
            'description' => 'required' 
        ]);

        $email = Message::where('task_id', $token)->first();
        $chat = new Message;
        $chat->sender = "support staff";
        $chat->receiver = $email->receiver;
        $chat->task_id = $token;
        $chat->description = $request->input('description');
        $chat->status = "";
        $chat->save();
            return redirect('admin/admin-notifications/');
    }
}
