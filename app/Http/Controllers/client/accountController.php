<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\ActiveJob;
use App\Models\Bid;
use App\Models\Message;
use App\Models\Notification;
use App\Models\Order;
use App\Models\RevisionTask;
use App\Models\TimeExtension;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments; 

class accountController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:administrator');
        // $this->middleware(['role:administrator', 'verified']);
    }
    public function index()
    {
        $tasks = Order::query()
            ->where('client_email', auth()->user()->email)
            ->get();
        return view('clientaccount.dashboard', compact('tasks'));
    }
    public function allmyorderprices()
    {
        $tasks = Order::query()
            ->where('client_email', auth()->user()->email)
            ->where('status', "admin")
            ->get();
        return view('clientaccount.myordersprices', compact('tasks'));
    }
    public function getExpressCheckout($token)
    {   
        $order = Order::where('task_id', $token)->first();
       
        $totalprice = $order->amount;
        $task = $order->category ." work worth ".$order->amount;
         
        $checkoutdata = [
            'items'=>$task,
            'return_url'=>route('paypalsuccess'),
            'cancel_url'=>route('paypalcancel'),
            'invoice_id'=>uniqid(),
            'invoice_description'=>" Order Description ",
            'total'=>$totalprice
        ];
        // $provider = PayPal::setProvider('express_checkout'); 
        $provider = new ExpressCheckout();
        $response = $provider->setExpressCheckout($checkoutdata);

        dd($response);
    }

    public function CancelPage(){
        dd("payment will be cancelled now");
    }
    public function myaccount()
    {
        $jobs = ActiveJob::where('client_email', auth()->user()->email)->get();
        $rejectedjobs = ActiveJob::query()
            ->where('client_email', auth()->user()->email)
            ->where('task_status', "rejected")
            ->get();
        $amount = 0;
        foreach ($jobs as $job) {
            $amount = $amount + $job->task_amount;
        }
        return view('clientaccount.myaccount', compact(['jobs', 'rejectedjobs', 'amount']));
    }
    public function neworder()
    {

        return view('clientaccount.neworder');
    }
    public function uploadorder(Request $request)
    {
        $this->validate($request, [
            'picture' => 'image|mimes:jpg,img,png,jpeg,gif,svg|max:6048',
            'category' => 'required',
            'deadline' => 'required',
            'topic' => 'required',
            'solution_format' => 'required',
            'education_level' => 'required',
            'amount' => 'required',
            'language' => 'required',
            'description' => 'required'
        ]);
        $token = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
        $job = new Order;
        $client = auth()->user()->email;
        $job->client_email = auth()->user()->email;
        $job->client_id = auth()->user()->userid;
        $job->category = $request->input('category');
        $job->deadline = $request->input('deadline');
        $job->topic = $request->input('topic');
        $job->solution_format = $request->input('solution_format');
        $job->education_level = $request->input('education_level');
        $job->amount = $request->input('amount');
        $job->language = $request->input('language');
        $job->description = $request->input('description');
        $job->status = "uploaded";
        $job->task_id = $token;
        if ($request->hasFile('picture')) {
            $fileNameWithExt = $request->picture->getClientOriginalName();
            $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $Extension = $request->picture->getClientOriginalExtension();
            $filenameToStore = $fileName . '_' . time() . '.' . $Extension;
            $path = $request->picture->storeAs('jobattachments', $filenameToStore, 'public');
            $job->picture = $filenameToStore;
        }
        $job->save();
        return redirect('client/jobreview/' . $token);
    }

    public function uploadpreview($token)
    {
        $task = Order::query()
            ->where('client_email', auth()->user()->email)
            ->where('task_id', $token)
            ->first();
        return view('clientaccount.neworderpreview', compact('task'));
    }

    public function updatetitle(Request $request)
    {
        $this->validate($request, [
            'topicedit' => 'required'
        ]);
        $jobid = $request->input('modalrecordtitle');
        $job = Order::findOrFail($jobid);
        $job->topic =  $request->input('topicedit');
        $job->save();

        return redirect()->back();
    }
    public function updatedescription(Request $request)
    {
        $this->validate($request, [
            'modaldescritption' => 'required'
        ]);
        $jobid = $request->input('modalrecordtitle');
        $job = Order::findOrFail($jobid);
        $job->description =  $request->input('modaldescritption');
        $job->save();

        return redirect()->back();
    }
    public function updatesolutionformat(Request $request)
    {
        $this->validate($request, [
            'solution_format' => 'required'
        ]);
        $jobid = $request->input('modalrecordtitle');
        $job = Order::findOrFail($jobid);
        $job->solution_format =  $request->input('solution_format');
        $job->save();

        return redirect()->back();
    }
    public function updateattachments(Request $request)
    {
        $this->validate($request, [
            'picture' => 'image|mimes:jpg,img,png,jpeg,gif,svg|max:6048'
        ]);
        $jobid = $request->input('modalrecordtitle');
        $job = Order::findOrFail($jobid);
        Storage::delete('/public/jobattachments/' . $job->picture);
        $fileNameWithExt = $request->picture->getClientOriginalName();
        $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $Extension = $request->picture->getClientOriginalExtension();
        $filenameToStore = $fileName . '_' . time() . '.' . $Extension;
        $path = $request->picture->storeAs('jobattachments', $filenameToStore, 'public');
        $job->picture = $filenameToStore;
        $job->save();

        return redirect()->back();
    }
    public function updatelastdetails(Request $request)
    {

        $this->validate($request, [
            'deadline' => 'required',
            'language' => 'required',
            'education_level' => 'required',
            'amount' => 'required',
            'language' => 'required'
        ]);
        $jobid = $request->input('modalrecordtitle');

        $job = Order::findOrFail($jobid);
        $job->deadline = $request->input('deadline');
        $job->amount = $request->input('amount');
        $job->language = $request->input('language');
        $job->education_level = $request->input('education_level');
        $job->save();

        return redirect()->back();
    }
    public function removetask($token)
    {
        $job = Order::findOrFail($token);

        if ($job->picture !== '') {
            Storage::delete('/public/jobattachments/' . $job->picture);
        }
        $job->delete();

        return redirect('client/drafts');
    }
    public function uploadadmin($token)
    {
        $job = Order::findOrFail($token);
        $time = $job->deadline;
        $timenow = Carbon::now();
        $deadline = $timenow->addHours($time);

        $job->status = "admin";
        $job->submission_date = $deadline;
        $job->save();

        return redirect('client/myorders');
    }

    public function pendingtasks()
    {
        $tasks = Order::query()
            ->where('client_email', auth()->user()->email)
            ->where('status', "uploaded")
            ->get();
        return view('clientaccount.alljobdrafts', compact('tasks'));
    }
    public function myorders()
    {
        $tasks = Order::query()
            ->where('client_email', auth()->user()->email)
            ->get();
        return view('clientaccount.myorders', compact('tasks'));
    }
    public function rejectedorders()
    {
        $tasks = Order::query()
            ->where('client_email', auth()->user()->email)
            ->where('status', "rejected")
            ->get();
        return view('clientaccount.rejectedorders', compact('tasks'));
    }
    public function mynotifications()
    {
        $notifications = Notification::query()
            ->where('receiver', auth()->user()->email)
            ->get();
        return view('clientaccount.mynotifications', compact('notifications'));
    }
    public function mywallet()
    {
        $tasks = Notification::query()
            ->where('receiver', auth()->user()->email)
            ->get();
        return view('clientaccount.mywallet', compact('tasks'));
    }

    public function mysettings()
    {
        return view('clientaccount.accountsettings');
    }
    public function removeavatar()
    {
        $client = User::where('email', auth()->user()->email)->first();

        if ($client->picture !== '') {
            Storage::delete('/public/profiles/' . $client->picture);
            $client->picture = "";
            $client->save();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
        return view('clientaccount.accountsettings');
    }
    public function updateavatar(Request $request)
    {
        $this->validate($request, [
            'picture' => 'image|mimes:jpg,img,png,jpeg,gif,svg|max:6048'
        ]);
        $client = User::where('email', auth()->user()->email)->first();
        Storage::delete('/public/profiles/' . $client->picture);
        $fileNameWithExt = $request->picture->getClientOriginalName();
        $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $Extension = $request->picture->getClientOriginalExtension();
        $filenameToStore = $fileName . '_' . time() . '.' . $Extension;
        $path = $request->picture->storeAs('profiles', $filenameToStore, 'public');
        $client->picture = $filenameToStore;

        $client->save();
        return redirect()->back();
    }

    public function updateemail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users'
        ]);
        $client = User::where('email', auth()->user()->email)->first();
        $activeemail = $client->email;
        // UPDATING BIDS TABLE 
        $bids = Bid::where('client_email', $activeemail)->get();
        if ($bids->count() >= 1) {
            foreach ($bids as $bid) {
                $bid->client_email = $request->input('email');
                $bid->save();
            }
        }
        // UPDATING NOTIFICATIONS TABLE 
        $notifications = Notification::query()
            ->where('sender', $activeemail)
            ->get();
        $notificationsreceiver = Notification::query()
            ->where('receiver', $activeemail)
            ->get();
        if ($notifications->count() >= 1) {
            foreach ($notifications as $notify) {
                $notify->sender = $request->input('email');
                $notify->save();
            }
        }
        if ($notificationsreceiver->count() >= 1) {
            foreach ($notificationsreceiver as $change) {
                $change->receiver = $request->input('email');
                $change->save();
            }
        }
        // UPDATING MESSAGES TABLE 
        $messagesender = Message::query()
            ->where('sender', $activeemail)
            ->get();
        $messagereceiver = Message::query()
            ->where('receiver', $activeemail)
            ->get();
        if ($messagesender->count() >= 1) {
            foreach ($messagesender as $changesender) {
                $changesender->sender = $request->input('email');
                $changesender->save();
            }
        }
        if ($messagereceiver->count() >= 1) {
            foreach ($messagereceiver as $changereceiver) {
                $changereceiver->receiver = $request->input('email');
                $changereceiver->save();
            }
        }
        // UPDATING ACTIVE JOBS TABLE 
        $activejobs = ActiveJob::where('client_email', $activeemail)->get();
        if ($activejobs->count() >= 1) {
            foreach ($activejobs as $activejob) {
                $activejob->client_email = $request->input('email');
                $activejob->save();
            }
        }
        // UPDATING REVISION TASKS TABLE 
        $revisionjobs = RevisionTask::where('client_email', $activeemail)->get();
        if ($revisionjobs->count() >= 1) {
            foreach ($revisionjobs as $revisionjob) {
                $revisionjob->client_email = $request->input('email');
                $revisionjob->save();
            }
        }
        // UPDATIN ORDERS TABLE
        $bidjobs = Order::where('client_email', $activeemail)->get();
        if ($bidjobs->count() >= 1) {
            foreach ($bidjobs as $bidjob) {
                $bidjob->client_email = $request->input('email');
                $bidjob->save();
            }
        }
        // UPDATING TIME EXTENSIONS TABLE 
        $timeextensions = TimeExtension::where('client_email', $activeemail)->get();
        if ($timeextensions->count() >= 1) {
            foreach ($timeextensions as $timeextension) {
                $timeextension->client_email = $request->input('email');
                $timeextension->save();
            }
        }
        // UPDATING USERS TABLE 
        $client = User::where('email', auth()->user()->email)->first();
        $client->email = $request->input('email');
        $client->save();

        Toastr::info('Email has been updated and all your data Synchronized', 'Success',  ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function updatephone(Request $request)
    {
        $this->validate($request, [
            'phone_number' => 'required|numeric|unique:users'

        ]);
        $client = User::where('email', auth()->user()->email)->first();

        $client->phone_number = $request->input('phone_number');
        $client->save();
        return redirect()->back();
    }

    public function allmessages()
    {
        $messages = Message::where('receiver', auth()->user()->email)->get();
        return view('clientaccount.allmessages', compact('messages'));
    }

    public function chatthread($token)
    {
        $messages = Message::query()
            ->where('task_id', $token)
            ->where('receiver', auth()->user()->email)
            ->orWhere('sender', auth()->user()->email)
            ->get();
        return view('clientaccount.openchatthread', compact(['messages', 'token']));
    }

    public function sendresponse(Request $request, $token)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);

        $chat = new Message;
        $chat->sender = auth()->user()->email;
        $chat->receiver = "support staff";
        $chat->task_id = $token;
        $chat->description = $request->input('description');
        $chat->status = "";
        $chat->save();
        return redirect('client/chat-thread/' . $token);
    }

    public function downloadfinal($token)
    {
        $job = ActiveJob::query()
            ->where('order_id', $token)
            ->where('client_email', auth()->user()->email)
            ->first();
        $task = Order::query()
            ->where('task_id', $token)
            ->where('client_email', auth()->user()->email)
            ->first();

        return view('clientaccount.downloadfinal', compact(['job', 'task']));
    }


    public function finalremarks(Request $request, $token)
    {
        $this->validate($request, [
            'description' => 'required',
            'decision' => 'required'
        ]);

        $decision = $request->input('decision');
        if ($decision == "Accepted") {
            $job = Order::where('task_id', $token)->first();
            $job->status = "approved";
            $job->save();

            $order = ActiveJob::query()
                ->where('order_id', $token)
                ->where('client_email', auth()->user()->email)
                ->first();
            $order->task_status = "approved";
            $order->client_remarks = $request->input('description');
            $order->save();


            Toastr::warning('Thanks for the Positive Remark. looking forward to work with you in future projects', 'Success',  ["positionClass" => "toast-top-right"]);
            return redirect()->route('client');
        } else {

            $job = Order::where('task_id', $token)->first();
            $job->status = "rejected";
            $job->submission_date = Carbon::now()->addHours(5);
            $job->save();

            $ordered = ActiveJob::query()
                ->where('order_id', $token)
                ->where('client_email', auth()->user()->email)
                ->first();

            $revision = new RevisionTask;
            $revision->order_id = $token;
            $revision->client_email = auth()->user()->email;
            $revision->client_id = auth()->user()->userid;
            $revision->writer_id = $ordered->writer_id;
            $revision->writer_email = $ordered->writer_email;
            $revision->task_category = $ordered->task_category;
            $revision->bid_amount = $ordered->bid_amount;
            $revision->task_amount = $ordered->bid_amount;
            $revision->task_status = "rejected";
            $revision->client_remarks =  $request->input('description');
            $revision->solution_format = $ordered->solution_format;
            $revision->submission_date = Carbon::now()->addHours(5);
            $revision->save();

            $ordered->delete();


            Toastr::warning('Your Task has been rescheduled for revision.We will Notify when it will be ready. looking forward to work with you in future projects', 'Success',  ["positionClass" => "toast-top-right"]);
            return redirect()->route('client');
        }
    }

    public function updatepassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6|max:20|confirmed',
            'password_confirmation' => 'required'
        ]);
        $password = $request->input('password');
        $cpassword = $request->input('password_confirmation');
        if ($password !== $cpassword) {
            Toastr::warning('Match Your password credentials', 'Success',  ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        } else {
            $user = User::where('email', auth()->user()->email)->first();
            $user->password = bcrypt($password);
            $user->save();
            Toastr::info('Password has been updated', 'Success',  ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }
}
