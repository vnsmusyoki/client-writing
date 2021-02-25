@extends('admin.layout')
@section('content')
     <div class="admindashboard">
          
          
         <div class="fourthadmindashboard">
          <div class="toprequest">
              <h5>Client Amount <span>{{ $order->amount }} dollars</span></h5>
          </div>
          <div class="bottomtable" style="padding: 2rem .5rem;">
             <table class="table table-bordered" id="receivedorders">
                 <thead>
                   <tr>
                     <th scope="col">#</th>
                     <th scope="col">Order Id</th> 
                     <th scope="col">Client Id</th> 
                     <th scope="col">Client Email</th> 
                     <th scope="col">Writer Id</th>
                     <th scope="col">Writer Email</th>
                     <th scope="col">Task Category</th> 
                     <th scope="col">Amount</th>
                     <th scope="col">Read More</th>
                   </tr>
                 </thead>
                 <tbody>
                   @if ($bids->count() >= 1)
                       @foreach ($bids as $key=>$bid)
                       <tr>
                        <td>{{++$key}}</td>
                        <td>{{ $bid->order_id }}</td> 
                        <td>{{ $bid->client_id }} hour(s)</td>
                        <td>{{ $bid->client_email }}</td>
                        <td>{{ $bid->writer_id }}</td>
                        <td>{{ $bid->writer_email }} </td>
                        <td>{{ $bid->task_category }}</td> 
                        <td>{{ $bid->bid_amount }} dolars</td>  
                        <td><a href="{{ url('admin/assign_task/'.$bid->order_id.'/'.$bid->writer_email) }}" class="btn btn-danger">Assign Task</a></td> 
                      </tr>
                       @endforeach
                   @endif
                    
                    
                 </tbody>
             </table>
         
          </div>
      </div>
        
          
     </div>
@endsection