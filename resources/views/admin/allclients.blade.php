@extends('admin.layout')
@section('content')
<div class="fourthadmindashboard">
    <div class="toprequest">
        <h5><span>All Clients</span> </h5>
    </div>
    <div class="bottomtable">
       <table class="table table-bordered">
           <thead>
             <tr>
               <th scope="col">#</th>
               <th scope="col">Avatar</th>
               <th scope="col">Full Names</th> 
               <th scope="col">Writer Id</th> 
               <th scope="col">Email Address</th> 
               <th scope="col">Phone Number</th> 
               <th scope="col">Completed</th>
               <th scope="col">Amount</th>
               <th scope="col">Penalized</th>
               <th scope="col">Status</th>
               <th scope="col">Action</th>
             </tr>
           </thead>
           <tbody>
               @if ($clients->count() >= 1)
                   @foreach ($clients as $key=>$client)
                   <tr>
                       <td>{{ ++ $key }}</td>
                       <td>
                           @if ($client->picture == '')
                           <div class="showuser">
                               <span>{{ substr( $client->userid, 5) }}</span>    
                           </div> 
                           @else
                               <img src="{{ asset('storage/profiles/'.$client->picture) }}" style="height: 45px;width:45px;border-radius:50%;" alt="">
                           @endif
                               
                       </td> 
                       <td>{{ $client->name}}</td>
                       <td>{{ $client->userid}}</td>
                       <td>{{ $client->email}}</td>
                       <td>{{ $client->phone_number}}</td>
                       <td>{{ $client->submission_date}}</td>
                       <td>{{ $client->submission_date}}</td>
                       <td>{{ $client->submission_date}}</td>
                       <td>{{ $client->submission_date}}</td>
                       <td><a href="{{ url('admin/client_details/'.$client->userid) }}">view</a></td>
                   </tr>
                       
                   @endforeach
               @else
                   <tr>
                       <td colspan="11">No clients</td>
                   </tr>
               @endif
               
              
           </tbody>
       </table>
   
    </div>
</div>
@endsection