@extends('writer.layout')
@section('content')
<div class="topcontent">
    <div class="lefttopcontent">
        <h5>Revision Tasks<span class="badge badge-success">{{ $jobs->count()  }}</span></h5>
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
            <th scope="col">Solution Format</th> 
            <th scope="col">Deadline</th> 
            <th scope="col">Details</th> 
            <th scope="col">Submit Task</th>  
          </tr>
        </thead>
        <tbody> 
              @foreach ($jobs as $key=>$bid)
              <tr>
                <td>{{++$key}}</td>
                <td>{{ $bid->order_id }}</td> 
                <td>{{ $bid->task_category }} </td>
                <td>{{ $bid->bid_amount }}</td>
                <td><span class="badge badge-pill badge-danger">{{$bid->task_status }}</span></td>  
                <td>{{$bid->solution_format }}</td>  
                <td>{{date('h:i:s  a, d/m/y', strtotime($bid->submission_date)) }}</td>  
                <td><a href="{{ url('writer/revision-order-details/'.$bid->order_id) }}" class="btn btn-success">see instructions</a></td>  
                <td><a href="{{ url('writer/final-document-upload/'.$bid->order_id) }}" class="btn btn-warning">upload final</a></td>  
                    </tr>
              @endforeach 
        </tbody>
    </table>
    @else
    <div class="topbottomcontent">
        <img src="{{ asset('pages/images/no-bids.svg') }}" alt="">
        <h5>Nothing Here</h5>
        <p>No have records here</p>
    </div>
    @endif
     
</div>
@endsection