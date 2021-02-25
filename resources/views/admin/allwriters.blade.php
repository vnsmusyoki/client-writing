@extends('admin.layout')
@section('content')
<div class="fourthadmindashboard">
    <div class="toprequest">
        <h5><span>All Writers</span> </h5>
    </div>
    <div class="bottomtable">
       <table class="table table-bordered">
           <thead>
             <tr>
               <th scope="col">#</th>
               <th scope="col">Avatar</th>
               <th scope="col">Full Names</th>  
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
               @if ($writers->count() >= 1)
                   @foreach ($writers as $key=>$writer)
                   <tr>
                       <td>{{ ++ $key }}</td>
                       <td>
                           @if ($writer->picture == '')
                           <div class="showuser">
                               <span>{{ substr( $writer->userid, 5) }}</span>    
                           </div> 
                           @else
                               <img src="{{ asset('storage/profiles/'.$writer->picture) }}" style="height: 45px;width:45px;border-radius:50%;" alt="">
                           @endif
                               
                       </td> 
                       <td>{{ $writer->name}}</td> 
                       <td>{{ $writer->email}}</td>
                       <td>{{ $writer->phone_number}}</td>
                       <td>{{ $writer->submission_date}}</td>
                       <td>{{ $writer->submission_date}}</td>
                       <td>{{ $writer->submission_date}}</td>
                       <td>{{ $writer->submission_date}}</td>
                       <td><a href="{{ url('admin/writer_details/'.$writer->userid) }}" class="btn btn-danger">view</a></td>
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