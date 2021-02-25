@extends('clientaccount.layout')
@section('content')
    <div class="dashboardone">
        
         <div class="mynotifications">
                <div class="topmynotifications">
                    <h5>Notifications</h5>
                </div>
                @if ($notifications->count() >= 1)
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date Received</th>
                        <th scope="col">From</th>
                        <th scope="col">Task Id</th>
                        <th scope="col">Request</th> 
                        <th scope="col">Status</th> 
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $key=>$notification)
                            <tr>
                                <td>{{++$key }}</td>
                                <td>{{$notification->created_at}}</td>
                                <td>{{$notification->sender}}</td>
                                <td>{{$notification->task_id}}</td>
                                <td>{{$notification->topic}}</td>
                                <td>{{$notification->status}}</td>
                                <td><button class="btn btn-primary">click here</button></td>
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