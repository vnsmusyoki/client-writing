@extends('admin.layout')
@section('content')
<div class="fourthadmindashboard">
    <div class="toprequest">
        <h5><span>All Revisions</span> </h5>
    </div>
    <div class="bottomtable">
       <table class="table table-bordered">
           <thead>
             <tr>
               <th scope="col">#</th>
               <th scope="col">Order Id</th> 
               <th scope="col">Writer </th>  
               <th scope="col">Status</th> 
               <th scope="col">Comment</th>
               <th scope="col">Date Received</th>
               <th scope="col">Action</th>
             </tr>
           </thead>
           <tbody>
               @if ($jobs->count() >= 1)
                   @foreach ($jobs as $key=>$job)
                   <tr>
                       <td>{{ ++ $key }}</td>
                       <td>{{ $job->order_id}}</td> 
                       <td>{{ $job->writer_email}}</td> 
                       <td><span class="badge badge-pill badge-danger">{{ $job->task_status}}</span></td>
                       <td>{{ $job->client_remarks}}</td>
                       <td>{{ $job->updated_at}}</td>
                       <td><a href="{{ url('admin/order_revision/'.$job->order_id) }}" class="btn btn-danger">view</a></td>
                   </tr>
                       
                   @endforeach
               @else
                   <tr>
                       <td>No new Orders</td>
                   </tr>
               @endif
               
              
           </tbody>
       </table>
   
    </div>
</div>
@endsection