@extends('writer.layout')
@section('content')
<div class="myaccount">
    <div class="topmyaccount">
        <div class="leftmyaccount">
            <h5>{{ Auth::user()->name }}</h5>
        </div>
        <div class="rightmyaccount">
            <a href="{{ url('writer/settings') }}">Edit Profile</a>
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
                <span class="statnumber">{{ $total }}</span>
                <p>Jobs Given</p>
            </div>
            <div class="infocontent">
                <span class="statnumber">Ksh {{ $amount }}</span>
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
                    <th scope="col">Client Id</th>
                    <th scope="col">Solution Format</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date Submited</th>
                  </tr>
                </thead>
                <tbody>
                    @if ($acceptedjobs->count() >=1)
                        @foreach ($acceptedjobs as $key=>$acceptedjob)
                        <tr>
                            <td>{{ ++$key}}</td>
                            <td>{{ $acceptedjob->order_id }}</td> 
                            <td>{{ $acceptedjob->client_id }}</td> 
                            <td>{{ $acceptedjob->solution_format }}</td> 
                            <td>Ksh {{ $acceptedjob->bid_amount }}</td> 
                            <td><button class="btn btn-outline-primary">{{ $acceptedjob->task_status }}</button></td>
                            <td>{{ $acceptedjob->updated_at }} </td> 
                         </tr> 
                        @endforeach
                    @endif
                   
                </tbody>
              </table>
        </div>
    </div>
    <div class="bottomaccount">
        <div class="topbottomaccount">
            <span class="topic">Revision Jobs</span>
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
                    @if ($rejectedjobs->count() >=1)
                        @foreach ($rejectedjobs as $key=>$rejectedjob)
                        <tr>
                            <td>{{ ++$key}}</td>
                            <td>{{ $rejectedjob->order_id }}</td> 
                            <td>{{ $rejectedjob->client_id }}</td> 
                            <td>{{ $rejectedjob->solution_format }}</td> 
                            <td>Ksh {{ $rejectedjob->bid_amount }}</td> 
                            <td><button class="btn btn-outline-primary">{{ $rejectedjob->task_status }}</button></td>
                            <td>{{ $rejectedjob->updated_at }} </td> 
                         </tr> 
                        @endforeach
                    @endif
                   
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
