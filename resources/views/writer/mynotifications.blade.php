@extends('writer.layout')
@section('content')
    <div class="dashboardone">
        
         <div class="mynotifications">
                <div class="topmynotifications">
                    <h5>Notifications  <span class="badge badge-success">{{ $notifications->count()  }}</span></h5>
                </div>
                
         </div>
         
        <div class="bottomcontents">
            @if ($notifications->count() >= 1)
            <table class="table table-bordered table-striped table-hover" id="allbids" style="width: 100% !important;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task Id </th> 
                    <th scope="col">Title</th>  
                    <th scope="col">Description</th> 
                    <th scope="col">Received At</th> 
                    <th scope="col">Status</th> 
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody> 
                      @foreach ($notifications as $key=>$notification)
                      <tr>
                       <td>{{++$key}}</td>
                       <td>{{ $notification->task_id }}</td> 
                       <td>{{ $notification->topic }} </td>
                       <td>{{ $notification->description }}</td>
                       <td>{{date('h:i:s  a, d/m/y', strtotime($notification->created_at)) }}</td>  
                       <td><a  class="badge badge-success badge-pill text-light">{{ $notification->status }} message</a></td>  
                       <td><a href="{{ url('writer/accept-order/'.$notification->task_id) }}" class="btn btn-warning">Mark as Read</a></td>  
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