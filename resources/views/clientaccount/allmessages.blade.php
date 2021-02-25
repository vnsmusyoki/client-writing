@extends('clientaccount.layout')
@section('content')
    <div class="dashboardone">
        
         <div class="mynotifications">
                <div class="topmynotifications">
                    <h5>Messages</h5>
                </div>
                @if ($messages->count() >= 1)
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date Received</th>
                        <th scope="col">From</th>
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
                                <td>{{$message->task_id}}</td>
                                <td>{{$message->description}}</td>
                                <td>{{$message->status}}</td>
                                <td><a href="{{ url('client/chat-thread/'.$message->task_id) }}" class="badge badge-primary badge-pill">Open Thread</a></td>
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