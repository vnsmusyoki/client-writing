@extends('clientaccount.layout')
@section('content')
<div class="myaccount">
    <div class="topmyaccount">
        <div class="leftmyaccount">
            <h5>{{ Auth::user()->name }}</h5>
        </div>
        <div class="rightmyaccount">
            <a href="{{ url('client/settings') }}">Edit Profile</a>
        </div>
    </div>
    <div class="middleaccount">
        <div class="leftmiddleaccount">
             
            <div class="oneleft">
                @if (Auth()->user()->picture == '')
                <span>{{ substr( Auth()->user()->userid, 6) }}</span>
                @else
                <img class="dtopavatar" src="{{ asset('storage/profiles/'.Auth()->user()->picture) }}" alt="">
                @endif
                
            </div>
            <div class="righticon">
                <h5>Client Id: <span>{{ Auth::user()->userid }}</span></h5>
                <h6>Email Address: <span>{{ Auth::user()->email }}</span></h6>
                <h5>Member since: <span>{{ Auth::user()->created_at->diffForHumans() }}</span></h5>
            </div>
        </div>
        <div class="rightmiddleaccount">
            <div class="infocontent">
                <span class="statnumber">{{ $jobs->count() }}</span>
                <p>Jobs Given</p>
            </div>
            <div class="infocontent">
                <span class="statnumber">{{ $amount }} dollars</span>
                <p>Amount paid</p>
            </div>
            <div class="infocontent">
                <span class="statnumber">{{ $rejectedjobs->count() }}</span>
                <p>Tasks Rejected</p>
            </div>
            
        </div>
    </div>
    <div class="bottomaccount">
        <div class="topbottomaccount">
            <span class="topic">All Jobs</span>
        </div>
        <div class="bottomallorders">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order Id</th>
                    <th scope="col">Writer Id</th>
                    <th scope="col">Solution Format</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Comment</th>
                  </tr>
                </thead>
                <tbody>
                    @if ($jobs->count() >=1)
                        @foreach ($jobs as $key=>$job)
                        <tr>
                            <td>{{ ++$key}}</td>
                            <td>{{ $job->order_id }}</td> 
                            <td>{{ $job->writer_id }}</td> 
                            <td>{{ $job->solution_format }}</td> 
                            <td>{{ $job->task_amount }} dollars</td> 
                            <td><button class="btn btn-outline-primary">{{ $job->task_status }}</button></td>
                            <td>{{ $job->client_remarks }} </td> 
                         </tr> 
                        @endforeach
                    @endif
                   
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
