@extends('writer.layout')
@section('content')
<div class="topcontent">
    <div class="lefttopcontent">
        <h5>Completed Tasks<span class="badge badge-success">{{ $jobs->count()  }}</span></h5>
    </div>
    <div class="righttopcontent">
        <form action="">
            <div class="scontent">  
            </div>
        </form>
    </div>
</div>
<div class="bottomcontent">
    @if ($jobs->count() >= 1)
    <table class="table table-bordered table-striped table-hover" id="allbids" style="width: 100% !important;">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Task Assigned</th> 
            <th scope="col">Category</th>  
            <th scope="col">Total Pay</th> 
            <th scope="col">Status</th> 
            <th scope="col">Penalties</th> 
            <th scope="col">Deadline</th> 
            <th scope="col">Payment Status</th> 
            <th scope="col">Solution Format</th> 
            <th scope="col">Submit Task</th> 
            <th scope="col">Date Submited</th>   
          </tr>
        </thead>
        <tbody> 
              @foreach ($jobs as $key=>$bid)
              <tr>
                <td>{{++$key}}</td>
                <td>{{ $bid->order_id }}</td> 
                <td>{{ $bid->task_category }} </td>
                <td>Ksh {{ $bid->bid_amount }}</td>
                <td>
                    
                    @if ($bid->task_status == "completed")
                    <span class="badge badge-pill badge-secondary">waiting</span>
                    @elseif($bid->task_status == "approved")
                    <span class="badge badge-pill badge-success">Approved</span>
                    @else
                    <span class="badge badge-pill badge-danger">Rejected</span>
                    @endif
                </td>  
                <td>{{$bid->penalties_awarded }}</td>  
                <td>{{$bid->submission_date }}</td>  
                <td>{{$bid->payment_status }}</td>  
                <td>{{$bid->solution_format }}</td>  
                <td>{{date('h:i:s  a, d/m/y', strtotime($bid->submission_date)) }}</td>  
                <td>{{date('h:i:s  a, d/m/y', strtotime($bid->updated_at)) }}</td>   
             </tr>
              @endforeach 
        </tbody>
    </table>
    @else
    <div class="topbottomcontent">
        <img src="{{ asset('pages/images/no-bids.svg') }}" alt="">
        <h5>Nothing Here</h5>
        <p>No have not completed any task</p>
    </div>
    @endif
     
</div>
@endsection