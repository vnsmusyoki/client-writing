@extends('admin.layout')
@section('content')
<div class="fourthadmindashboard">
    <div class="toprequest">
        <h5><span>Blocked Writers</span> </h5>
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
                       <td>{{ $writer->userid}}</td>
                       <td>{{ $writer->email}}</td>
                       <td>{{ $writer->phone_number}}</td> 
                       <td>
                           <a href="{{ url('admin/unblock_writer/'.$writer->userid) }}" class="btn btn-primary">unblock writer</a>
                           <a href="{{ url('admin/delete_writer/'.$writer->userid) }}" class="btn btn-danger">delete writer</a>
                       </td>
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