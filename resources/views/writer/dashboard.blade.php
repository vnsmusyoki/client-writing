@extends('writer.layout')
@section('content')
    <div class="dashboardone">
        <div class="topdashboardone">
            <div>
                <h5>My orders</h5>
            </div>
            <div>
              @if (Auth()->user()->picture == '')
              <span>{{ substr( Auth()->user()->userid, 6) }}</span>
              @else
              <img class="dtopavatar" src="{{ asset('storage/profiles/'.Auth()->user()->picture) }}" alt="">
              @endif
              <a href="{{ url('client/settings') }}"> {{ Auth::user()->name }}</a>
            </div>
        </div>
        <div class="bottomdashboardone">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">New Orders <span class="badge badge-secondary">{{ $orders->count() }}</span></a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">In Progress <span class="badge badge-danger">{{ $inprogressjobs->count()  }}</span></a>
                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Bids <span class="badge badge-success">{{ $bids->count() }}</span></a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active customerorders" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="topcontent">
                        <div class="lefttopcontent">
                            <h5>New Orders<span class="badge badge-secondary">{{ $orders->count() }}</span></h5>
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
                        @if ($orders->count() >= 1)
                        <table class="table table-bordered" id="receivedorders">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Order Id</th> 
                                <th scope="col">Category</th> 
                                <th scope="col">Solution Format</th> 
                                <th scope="col">Deadline</th>
                                <th scope="col">Education Level</th> 
                                <th scope="col">Read More</th> 
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody> 
                                  @foreach ($orders as $key=>$order)
                                  <tr>
                                   <td>{{++$key}}</td>
                                   <td>{{ $order->task_id }}</td> 
                                   <td>{{ $order->category }} </td>
                                   <td>{{ $order->solution_format }}</td>
                                   <td>{{date('h a, d/m/y', strtotime($order->submission_date)) }}</td>
                                   <td>{{ $order->education_level }}</td> 
                                   <td><a href="{{ url('writer/order-details/'.$order->task_id) }}" class="btn btn-primary">View details</a></td> 
                                   <td><button class="btn btn-danger" data-toggle="modal" data-target="#bidtask" data-recordid="{{ $order->task_id }}">Place Bid Now</button></td> 

                                 </tr>
                                  @endforeach 
                               
                               
                            </tbody>
                        </table>
                        @else
                        <div class="topbottomcontent">
                            <img src="{{ asset('pages/images/no-opened.svg') }}" alt="">
                            <h5>Nothing Here</h5>
                            <p>No active pending orders</p>
                        </div>
                        @endif
                        
                    </div>
                </div>
                <div class="tab-pane fade customerorders" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="topcontent">
                        <div class="lefttopcontent">
                            <h5>In Progress <span class="badge badge-danger">{{ $inprogressjobs->count()  }}</span></h5>
                        </div>
                        <div class="righttopcontent">
                            <form action="">
                                <div class="scontent"> 
                                <input type="text" class="toprightinput" placeholder="search">
                                </div>
                            </form>
                        </div>
                    </div>
                     
                    <div class="bottomcontents">
                        @if ($inprogressjobs->count() >= 1)
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
                                <th scope="col">Additional Time</th>
                              </tr>
                            </thead>
                            <tbody> 
                                  @foreach ($inprogressjobs as $key=>$bid)
                                  <tr>
                                   <td>{{++$key}}</td>
                                   <td>{{ $bid->order_id }}</td> 
                                   <td>{{ $bid->task_category }} </td>
                                   <td>{{ $bid->bid_amount }}</td>
                                   <td>{{$bid->task_status }}</td>  
                                   <td>{{$bid->solution_format }}</td>  
                                   <td>{{date('h:i:s  a, d/m/y', strtotime($bid->submission_date)) }}</td>  
                                   <td><a href="{{ url('writer/order-instructions/'.$bid->order_id) }}" class="btn btn-success">see instructions</a></td>  
                                   <td><a href="{{ url('writer/final-document-upload/'.$bid->order_id) }}"  class="btn btn-primary">upload final</a></td>   
                                   <td><button  class="btn btn-warning" data-toggle="modal" data-target="#modaltimeextension" data-recordid="{{ $order->task_id }}">Request Here</button></td>  
                                 </tr>
                                  @endforeach 
                            </tbody>
                        </table>
                        @else
                        <div class="topbottomcontent">
                            <img src="{{ asset('pages/images/no-wishes.svg') }}" alt="">
                            <h5>Easy buddy</h5>
                            <p>You have no active jobs</p>
                        </div>
                        @endif
                         
                    </div>
                </div>
                <div class="tab-pane fade customerorders" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="topcontent">
                        <div class="lefttopcontent">
                            <h5>All Bids <span class="badge badge-success">{{ $bids->count()  }}</span></h5>
                        </div>
                        <div class="righttopcontent">
                            <form action="">
                                <div class="scontent">  
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="bottomcontent">
                        @if ($bids->count() >= 1)
                        <table class="table table-bordered table-striped table-hover" id="allbids" style="width: 100% !important;">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Order Id</th> 
                                <th scope="col">Category</th>  
                                <th scope="col">Amount</th> 
                                <th scope="col">Date Placed</th> 
                                <th scope="col">Remove</th> 
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody> 
                                  @foreach ($bids as $key=>$bid)
                                  <tr>
                                   <td>{{++$key}}</td>
                                   <td>{{ $bid->order_id }}</td> 
                                   <td>{{ $bid->task_category }} </td>
                                   <td>{{ $bid->bid_amount }}</td>
                                   <td>{{date('h:i:s  a, d/m/y', strtotime($bid->created_at)) }}</td>  
                                   <td><a href="{{ url('writer/bid-order-details/'.$bid->order_id) }}" class="btn btn-success">view details</a></td>  
                                   <td><a href="{{ url('writer/delete-bid/'.$bid->order_id) }}" class="btn btn-warning">delete</a></td>  
                                 </tr>
                                  @endforeach 
                            </tbody>
                        </table>
                        @else
                        <div class="topbottomcontent">
                            <img src="{{ asset('pages/images/no-bids.svg') }}" alt="">
                            <h5>Nothing Here</h5>
                            <p>No active  Bids.Click the new orders tab and place your bid now</p>
                        </div>
                        @endif
                         
                    </div>
                </div>
              </div>
        </div>
    </div>




    <div class="modal fade" data-keyboard="false" data-backdrop="static" id="bidtask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('writer/placebid') }}" method="POST" autocomplete="off">
                @csrf 
            <div class="modal-body">
              <div class="form-group">
                  <label for="">Bid Amount</label>
                  <input type="number" min="1" name="amount" id="bidamount" class="form-control" required>
              </div>
              <input type="hidden" min="100" name="recordnumber" id="orderid" class="form-control" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit Now</button>
            </div>
            </form>
          </div>
        </div>
    </div>




<!-- Modal -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modaltimeextension" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('writer/job-extension-time') }}" method="POST">
        @csrf
      <div class="modal-body">
        <div class="form-group">
          <label for="">Select from the list given below</label> 
          <select name="time_extension" id="" class="form-control" required>
            <option value=""></option>
            <option value="1">2 hours</option>
            <option value="2">4 hours</option>
            <option value="3">5 hours</option>
            <option value="1">1 day</option>
            <option value="2"> 2 days</option>
            <option value="3">3 days</option>
          </select>
      </div>
      <input type="hidden"  name="recordnumber" id="orderid" class="form-control" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send Request </button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalfinaldocumentupload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('writer/upload-final-document') }}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <div class="form-group">
          <label for="">Make sure the file uploading is of same solution format expected by client</label> 
           <input type="file" name="picture" class="form-control" required>
      </div>
      <input type="hidden"  name="recordnumber" id="orderid" class="form-control" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upload Final Document </button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection