@extends('clientaccount.layout')
@section('content')
    <div class="dashboardone">
        <div class="topdashboardone">
            <div>
                <h5>My Task List</h5>
                <br>
                <small></small>
            </div>
            <div>
                <img class="dtopavatar" src="{{ asset('clients/img/logo.jpg') }}" alt="">
                <a href=""> {{ Auth::user()->name }}</a>
            </div>
        </div>
        <div class="bottomdashboardone">

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active customerorders" id="nav-home" role="tabpanel"
                    aria-labelledby="nav-home-tab">
                    <div class="topcontent">
                        <div class="lefttopcontent">
                            <h5>Uploaded Tasks <span>({{ $tasks->count() }})</span></h5>
                        </div>
                        <div class="righttopcontent">

                        </div>
                    </div>
                    <div class="bottomcontent">
                        @if ($tasks->count() >= 1)

                            <table class="table table-bordered table-stripped" id="allprices">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Task Id</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Date Uploaded</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Payment status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $key => $task)
                                        <tr>
                                            <th>{{ ++$key }}</th>
                                            <td>{{ $task->category }}</td>
                                            <td>{{ $task->task_id }}</td>
                                            <td>{{ $task->amount }} dollars </td>
                                            <td>{{ $task->created_at }}</td>
                                            <td>{{ $task->deadline }} hour(s)</td>
                                            <td>
                                                @if ($task->payment_agreement == 'waiting')
                                                    <span class="badge badge-pill badge-warning">waiting</span>
                                                @elseif($task->payment_agreement == 'accepted')
                                                    <span class="badge badge-pill badge-primary">agreed</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">rejected</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($task->payment_agreement == 'waiting')
                                                    <a href="{{  url('client/checkout/'.$task->task_id) }}" class="btn  btn-primary">
                                                        pay Now
                                                    </a>
                                                 
                                                   @else
                                                    <span class="badge badge-pill badge-danger">rejected</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        @else
                            <div class="topbottomcontent">
                                <img src="{{ asset('pages/images/no-opened.svg') }}" alt="">
                                <h5>Nothing Here</h5>
                                <p>You have not uploaded any task so far</p>
                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
