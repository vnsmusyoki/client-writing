@extends('admin.layout')
@section('content')
     <div class="admindashboard">
          
          
         <div class="fourthadmindashboard">
          <div class="toprequest">
              <h5>All Conversations </span></h5>
              <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Start Conversation Now
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Start Chat Thread</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('admin/start-chat-thread') }}" method="POST">
        @csrf 
      <div class="modal-body">
        <div class="form-group">
            <label for="">Client Email</label>
            <input type="email" name="receiver" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Task Id</label>
            <input type="number" min="10000000" max="99999999" name="taskid" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Message Body</label> 
            <textarea name="description" id="" cols="30" rows="10" class="form-control" required></textarea>
        </div>
      </div>
      <div class="modal-footer"> 
        <button type="submit" class="btn btn-primary">Send Message</button>
      </div>
      </form>
    </div>

  </div>
</div>
          </div>
          <div class="bottomtable" style="padding: 2rem .5rem;">
             <table class="table table-bordered" id="receivedorders">
                 <thead>
                   <tr>
                     <th scope="col">#</th>
                     <th scope="col">Sender</th> 
                     <th scope="col">Receiver</th> 
                     <th scope="col">Task Id</th> 
                     <th scope="col">Message </th> 
                     <th scope="col">Time Sent </th> 
                     <th scope="col">Open Chat</th>
                   </tr>
                 </thead>
                 <tbody>
                   @if ($notifications->count() >= 1)
                       @foreach ($notifications as $key=>$notification)
                       <tr>
                        <td>{{++$key}}</td>
                        <td>{{ $notification->sender }}</td> 
                        <td>{{ $notification->receiver }}</td>
                        <td>{{ $notification->task_id }}</td>
                        <td>{{ $notification->description }}</td>
                        <td>{{ $notification->created_at->diffForHumans() }}</td>
                        <td><a href="{{ url('admin/open-thread/'.$notification->task_id) }}" class="badge badge-primary badge-pill">Open Thread</a></td>
                      </tr>
                       @endforeach
                   @endif
                    
                    
                 </tbody>
             </table>
         
          </div>
      </div>
        
          
     </div>
@endsection