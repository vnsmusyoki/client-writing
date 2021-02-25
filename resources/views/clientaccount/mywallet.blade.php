@extends('clientaccount.layout')
@section('content')
    <div class="dashboardone">
        <div class="topdashboardone">
            <div>
                <h5>My Wallet</h5>
                <br>
                <small></small>
            </div>
            <div>
                <img class="dtopavatar" src="{{ asset('clients/img/logo.jpg') }}" alt="">
                <a href=""> Top Up now</a>
            </div>
        </div>
        <div class="bottomdashboardone">
            
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active customerorders" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="topcontent">
                        <div class="lefttopcontent">
                            <h5>All Rejected Tasks <span>({{ $tasks->count()}})</span></h5>
                        </div>
                        <div class="righttopcontent">
                            <form action="">
                                <div class="scontent"> 
                                <input type="text" class="toprightinput" placeholder="search">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="bottomcontent">
                        @if ($tasks->count() >=1) 
                                
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Task Id</th>
                                        <th scope="col">Education Level</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">language</th>
                                        <th scope="col">status</th>
                                        <th scope="col">Date Uploaded</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($tasks as $key=>$task)
                                      <tr>
                                        <th scope="row">{{++ $key }}</th>
                                        <td>{{ $task->category }}</td>
                                        <td>{{ $task->task_id }}</td>
                                        <td>{{ $task->education_level }}</td>
                                        <td>{{ $task->deadline }}</td>
                                        <td>{{ $task->amount }}</td>
                                        <td>{{ $task->language }}</td>
                                        <td>{{ $task->status }}</td>
                                        <td>{{ $task->created_at }}</td>
                                        <td><a href="{{ url('client/jobreview/'.$task->task_id) }}" class="btn btn-primary"> <i class="far fa-eye"></i> click to view</a><td>
                                      </tr>
                                    @endforeach
                                    </tbody>
                                  </table>
                               
                            
                        @else
                        <div class="topbottomcontent">
                            <img src="{{ asset('pages/images/no-opened.svg') }}" alt="">
                            <h5>Nothing Here</h5>
                            <p>All rejected tasks will be displayed here. Read through your guide to see when a task can be rejected</p>
                        </div>
                        @endif
                        
                    </div>
                </div>
                 
              </div>
        </div>
    </div>
@endsection