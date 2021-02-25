@extends('writer.layout')
@section('content')
    <div class="dashboardone">
        
         <div class="mynotifications">
                <div class="topmynotifications">
                    <h5>Messages</h5>
                    <br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Start Conversation Now
                      </button>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel" style="font-size: 12px !important;">Start Chat Thread</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{ url('writer/start-chat-thread') }}" method="POST">
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
                <div class="bottomcontent"> 
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
                            <th scope="col">Action</th>
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
                                    <td>{{$message->status}}</td>
                                    <td><a href="{{ url('writer/chat-thread/'.$message->task_id) }}" class="badge badge-primary badge-pill">Open Thread</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="bottommynotifications">
                        <img src="{{ asset('pages/images/no-transactions.svg') }}" alt="">
                        <h5>You don’t have any notifications</h5>
                        <p>You have not started any conversation</p>
                    </div>
                    @endif
                </div>
         </div>
    </div>
@endsection