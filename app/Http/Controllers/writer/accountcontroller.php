<?php

namespace App\Http\Controllers\writer;

use App\Http\Controllers\Controller;
use App\Models\ActiveJob;
use App\Models\Bid;
use App\Models\Message;
use App\Models\Notification;
use App\Models\Order;
use App\Models\RevisionTask;
use App\Models\TimeExtension;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class accountcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');
        // $this->middleware(['role:user', 'verified']);
    }
    public function index(){
        $bids = Bid::query()
                    ->where('writer_email', auth()->user()->email)
                    ->where('writer_id', auth()->user()->userid)
                    ->get();
        $inprogressjobs = ActiveJob::query()
                    ->where('writer_email', auth()->user()->email)
                    ->where('writer_id', auth()->user()->userid)
                    ->where('task_status', 'in progress')
                    ->get();
        $orders = Order::where('status', 'active')->get();
        return view('writer.dashboard', compact(['orders', 'bids', 'inprogressjobs']));
    }
    
    public function mytransactions(){
        return view('writer.mytransactions');
    }
    public function mynotifications(){
        $notifications = Notification::where('receiver', auth()->user()->email)->get();
        return view('writer.mynotifications', compact('notifications'));
    }
    public function guidelines(){
        return view('writer.guidelines');
    }
    public function orderdetails($token){
        $task = Order::where('task_id', $token)->first();
        return view('writer.orderdetails', compact('task'));
    }
    public function orderinstructions($token){
        $task = Order::where('task_id', $token)->first();
        return view('writer.jobinstructions', compact('task'));
    }
    public function placingbid(Request $request){
        $this->validate($request, [  
            'amount' => 'required|numeric'
            
        ]); 
        $taskid = $request->input('recordnumber');
        $task = Order::where('task_id', $taskid)->first();
        
        $bid = Bid::query()
                    ->where('writer_email', auth()->user()->email)
                    ->where('writer_id', auth()->user()->userid)
                    ->first();
        if($bid == ''){
            $bid = new Bid;
            $bid->client_email = $task->client_email;
            $bid->client_id = $task->client_id; 
            $bid->order_id = $taskid; 
            $bid->writer_id =  auth()->user()->userid;
            $bid->writer_email =  auth()->user()->email;
            $bid->task_category = $task->category;
            $bid->bid_amount = $request->input('amount');
            $bid->save();
        }else{

            
            Toastr::info('Bid Was Success', 'Success',  ["positionClass" => "toast-top-right"]);
            return redirect()->route('writer');

        } 
        Toastr::info('Bid Was Success', 'Success',  ["positionClass" => "toast-top-right"]);
        return redirect()->route('writer');
    }

    public function placedbiddetails($token){
         
        $task = Order::where('task_id', $token)->first();
        $bid= Bid::query()
                    ->where('writer_email', auth()->user()->email)
                    ->where('writer_id', auth()->user()->userid)
                    ->where('order_id', $token)
                    ->first();
        
        return view('writer.biddetails', compact(['task', 'bid']));
    }
    public function deletebid($token){ 
        $bid= Bid::query()
                    ->where('writer_email', auth()->user()->email)
                    ->where('writer_id', auth()->user()->userid)
                    ->where('order_id', $token)
                    ->first();
        $bid->delete();

        Toastr::warning('Bid has been removed', 'Success',  ["positionClass" => "toast-top-right"]);
        
        return redirect()->route('writer');
    }

    public function completedjobs(){
        $jobs= ActiveJob::query()
                    ->where('writer_email', auth()->user()->email)
                    ->where('writer_id', auth()->user()->userid) 
                    ->where('task_status', "completed") 
                    ->get();
        return view('writer.completedjobs', compact('jobs'));
    }
    public function revisionjobs(){
        $jobs= RevisionTask::query()
                    ->where('writer_email', auth()->user()->email) 
                    ->where('task_status', "rejected") 
                    ->get();
        return view('writer.jobrevisions', compact('jobs'));
    }

    public function acceptorders($token){
        $job= Notification::query()
                    ->where('receiver', auth()->user()->email)
                    ->where('task_id', $token) 
                    ->first();

        $job->status = "confirmed";
        $job->save();

        Toastr::warning('Make sure You have completed task given before time ellapses to avoid attracting penalties', 'Success',  ["positionClass" => "toast-top-right"]);
        return redirect('writer/dashboard/my-notifications');
    }

    public function jobextensiontimerequest(Request $request){
        $this->validate($request, [  
            'time_extension' => 'required|numeric'
        ]); 
        $taskid = $request->input('recordnumber');
        $order = Order::where('task_id', $taskid)->first();
        $clientjob = ActiveJob::query()
                    ->where('writer_email', auth()->user()->email)
                    ->where('writer_id', auth()->user()->userid)
                    ->where('task_status', 'in progress')
                    ->where('order_id', $taskid)
                    ->first();
        
        $job = new TimeExtension;
        $job->task_id = $taskid;
        $job->client_id = $order->client_id;
        $job->client_email = $order->client_email;
        $job->writer_id = auth()->user()->userid;
        $job->writer_email = auth()->user()->email;
        $job->current_deadline = $order->submission_date;
        $job->client_amount = $order->amount;
        $job->client_amount = $clientjob->task_amount;
        $job->writer_amount = $clientjob->bid_amount;
        $job->time_requested = $request->input('time_extension');
        $job->date_assigned = $clientjob->created_at;
        $job->status = "waiting";
        $job->save();
        
        Toastr::warning('Request sent.Meanwhile Continue working on assigned task within the set time limit', 'Success',  ["positionClass" => "toast-top-right"]);
        return redirect('writer/dashboard/time-extension-requests');
    }

    public function finaldocument($token){

        $task = Order::where('task_id', $token)->first();
        $bid = ActiveJob::query()
                    ->where('writer_email', auth()->user()->email)
                    ->where('writer_id', auth()->user()->userid)
                    ->where('task_status', 'in progress')
                    ->where('order_id', $token)
                    ->first();
        return view('writer.uploadfinaldocument', compact(['task', 'bid']));
    }
    public function uploadcompletedwork(Request $request){
         
        $this->validate($request, [
            'picture' => 'required|image|mimes:jpg,img,png,jpeg,gif,svg|max:6048'
        ]);

        $taskid = $request->input('recordnumber'); 
         
        $job = ActiveJob::query()
                    ->where('writer_email', auth()->user()->email)
                    ->where('writer_id', auth()->user()->userid)
                    ->where('task_status', 'in progress')
                    ->where('order_id', $taskid)
                    ->first();
         
        $job->task_status = "completed"; 
        $fileNameWithExt = $request->picture->getClientOriginalName();
        $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $Extension = $request->picture->getClientOriginalExtension();
        $filenameToStore = $fileName . '_' . time() . '.' . $Extension;
        $path = $request->picture->storeAs('downloads', $filenameToStore, 'public');
        $job->final_document = $filenameToStore;
        $job->save();

        $order = Order::where('task_id', $job->order_id)->first();
        $order->status = "completed";
        $order->save();

        Toastr::info('Job Completed.Client will be notified so that any noted revisions can be sent back to you', 'Success',  ["positionClass" => "toast-top-right"]);
        return redirect('writer/dashboard');
            
      

         
    }


    public function alltimeextensions(){
         
        $extensions = TimeExtension::query()
                    ->where('writer_email', auth()->user()->email)
                    ->where('writer_id', auth()->user()->userid) 
                    ->get();

        return view('writer.timeextensions', compact('extensions'));
    }

    public function mymessages(){
        $messages = Message::query()
                    ->where('sender', auth()->user()->email)
                    ->orWhere('receiver', auth()->user()->email) 
                    ->get();

        return view('writer.mymessages', compact('messages'));
    }

    public function startthread(Request $request){
        $this->validate($request, [
            'description' => 'required' 
        ]);

        $chat = new Message;
        $chat->sender = auth()->user()->email;
        $chat->receiver = "support staff";
        $chat->task_id = "General Quiz";
        $chat->description = $request->input('description');
        $chat->status = "";
        $chat->save();
            return redirect('writer/my-messages');
    }

    public function threadchats($token){
        $messages = Message::query()
                            ->where('task_id', $token)
                            ->where('receiver', auth()->user()->email)
                            ->orWhere('sender', auth()->user()->email)
                            ->get();
        return view('writer.openchatthread', compact(['messages', 'token']));
    }

    public function revisionjobdetails($token){
        $task = Order::where('task_id', $token)->first();
        $message = RevisionTask::query()
                            ->where('order_id', $token)
                            ->where('writer_email', auth()->user()->email) 
                            ->first();

        return view('writer.revisionjobdetails', compact(['task', 'message']));
    }

    public function myaccount(){
        $jobs = ActiveJob::where('writer_email', auth()->user()->email)->get();
        $acceptedjobs = ActiveJob::query() 
                            ->where('writer_email', auth()->user()->email)
                            ->get();
        $rejectedjobs = RevisionTask::query() 
                            ->where('writer_email', auth()->user()->email)
                            ->get();
       $total = ($acceptedjobs->count() + $rejectedjobs->count());

       $salary = 0;
       foreach($acceptedjobs as $jobb){
           $salary = $salary + $jobb->bid_amount;
       }

       $pay = 0;
       foreach($rejectedjobs as $view){
           $pay = $pay + $view->bid_amount;
       }
       $amount = $pay + $salary;
        return view('writer.myaccount', compact(['rejectedjobs', 'acceptedjobs', 'total', 'amount']));
    }

    public function mysettings(){
        return view('writer.accountsettings');
    }
    public function removeavatar(){
        $client = User::where('email', auth()->user()->email)->first();
        
        if($client->picture !== ''){
            Storage::delete('/public/profiles/' . $client->picture);
            $client->picture = "";
            $client->save();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
        return view('writer.accountsettings');
    }
    public function updateavatar(Request $request){
        $this->validate($request, [ 
            'picture' => 'image|mimes:jpg,img,png,jpeg,gif,svg|max:6048'
        ]); 
        $client = User::where('email', auth()->user()->email)->first();
        Storage::delete('/public/profiles/'.$client->picture);
        $fileNameWithExt = $request->picture->getClientOriginalName();
            $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $Extension = $request->picture->getClientOriginalExtension();
            $filenameToStore = $fileName . '_' . time() . '.' . $Extension;
            $path = $request->picture->storeAs('profiles', $filenameToStore, 'public');
            $client->picture = $filenameToStore; 
         
        $client->save();
        return redirect()->back();
    }
    public function updatepassword(Request $request){
        $this->validate($request, [
            'password' => 'required|min:6|max:20|confirmed',
            'password_confirmation' => 'required'
        ]);
        $password = $request->input('password');
        $cpassword = $request->input('password_confirmation');
        if($password !== $cpassword){
            Toastr::warning('Match Your password credentials', 'Success',  ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }else{
            $user = User::where('email', auth()->user()->email)->first();
            $user->password = bcrypt($password);
            $user->save();
            Toastr::info('Password has been updated', 'Success',  ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }

    public function updateemail(Request $request){
        $this->validate($request, [ 
            'email' => 'required|email|unique:users'
        ]); 
        $client = User::where('email', auth()->user()->email)->first(); 
        $activeemail = $client->email;
        // UPDATING BIDS TABLE 
        $bids = Bid::where('writer_email', $activeemail)->get();
        if($bids->count() >= 1){
            foreach($bids as $bid){
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
        if($notifications->count() >= 1){
            foreach($notifications as $notify){
                $notify->sender = $request->input('email');
                $notify->save();
            }
        }
        if($notificationsreceiver->count() >= 1){
            foreach($notificationsreceiver as $change){
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
        if($messagesender->count() >= 1){
            foreach($messagesender as $changesender){
                $changesender->sender = $request->input('email');
                $changesender->save();
            }
        }
        if($messagereceiver->count() >= 1){
            foreach($messagereceiver as $changereceiver){
                $changereceiver->receiver = $request->input('email');
                $changereceiver->save();
            }
        }
        // UPDATING ACTIVE JOBS TABLE 
        $activejobs = ActiveJob::where('writer_email', $activeemail)->get();
        if($activejobs->count() >= 1){
            foreach($activejobs as $activejob){
                $activejob->client_email = $request->input('email');
                $activejob->save();
            }
        }
        // UPDATING REVISION TASKS TABLE 
        $revisionjobs = RevisionTask::where('writer_email', $activeemail)->get();
        if($revisionjobs->count() >= 1){
            foreach($revisionjobs as $revisionjob){
                $revisionjob->writer_email = $request->input('email');
                $revisionjob->save();
            }
        }
       
        // UPDATING TIME EXTENSIONS TABLE 
        $timeextensions = TimeExtension::where('writer_email', $activeemail)->get();
        if($timeextensions->count() >= 1){
            foreach($timeextensions as $timeextension){
                $timeextension->writer_email = $request->input('email');
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
    public function updatephone(Request $request){
        $this->validate($request, [ 
            'phone_number' => 'required|numeric|unique:users'

        ]); 
        $client = User::where('email', auth()->user()->email)->first(); 
        
        $client->phone_number = $request->input('phone_number');
        $client->save();
        return redirect()->back();
    }
}





