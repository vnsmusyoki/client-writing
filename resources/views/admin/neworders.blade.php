@extends('admin.layout')
@section('content')
<div class="fourthadmindashboard">
    <div class="toprequest">
        <h5><span>All New Orders</span> </h5>
    </div>
    <div class="bottomtable">
       <table class="table table-bordered">
           <thead>
             <tr>
               <th scope="col">#</th>
               <th scope="col">Order Id</th> 
               <th scope="col">Notify Writers</th> 
               <th scope="col">Client</th> 
               <th scope="col">Client Id</th> 
               <th scope="col">Category</th>
               <th scope="col">Amount</th>
               <th scope="col">Deadline</th>
               <th scope="col">Action</th>
             </tr>
           </thead>
           <tbody>
               @if ($orders->count() >= 1)
                   @foreach ($orders as $key=>$order)
                   <tr>
                       <td>{{ ++ $key }}</td>
                       <td>{{ $order->task_id}}</td>
                       <td><a href="" class="btn btn-outline-success">post Now</a> </td>
                       <td>{{ $order->client_email}}</td>
                       <td>{{ $order->client_id}}</td>
                       <td>{{ $order->category}}</td>
                       <td>{{ $order->amount}}</td>
                       <td>{{ $order->submission_date}}</td>
                       <td><a href="{{ url('admin/order_details/'.$order->task_id) }}">view</a></td>
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