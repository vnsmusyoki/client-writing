@extends('clientaccount.layout')
@section('content')
    <div class="dashboardone" >
        
         <div class="mynotifications" style="background-color: white; padding:2rem 1rem;overflow-x:scroll; ">
                <div class="topmynotifications">
                    <h5>Chat Thread ({{ $messages->count() }} messages)</h5>
                    <br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
                        Start Conversation Now
                      </button>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Send Response</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{ url('client/send-chat-thread/'.$token) }}" method="POST">
                              @csrf 
                            <div class="modal-body">
                               
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
                @if ($messages->count() >= 1)
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date Received</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Task Id</th>
                        <th scope="col">Message</th> 
                        <th scope="col">Status</th> 
                        <th scope="col">Time</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $key=>$message)
                            <tr>
                                <td>{{++$key }}</td>
                                <td>{{$message->created_at}}</td>
                                <td>{{$message->sender}}</td>
                                <td>{{$message->receiver}}</td>
                                <td>{{$message->task_id}}</td>
                                <td>{{$message->description}}</td>
                                <td><span class="badge badge-primary badge-pill">{{$message->status}}</span></td>
                                <td>{{ $message->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="bottommynotifications">
                    <img src="{{ asset('pages/images/no-transactions.svg') }}" alt="">
                    <h5>You don’t have any notifications</h5>
                    <p>Please complete any action such as placing a bid to receive new notifications</p>
                </div>
                @endif
                
         </div>
    </div>
@endsection