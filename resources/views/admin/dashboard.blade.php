@extends('admin.layout')
@section('content')
     <div class="admindashboard">
         <div class="topadmindashboard">
             <div class="adminbox">
                 <div class="leftadminbox">
                    <i class="fas fa-user-tag"></i>
                 </div>
                 <div class="rightadminbox">
                     <h5>{{ $clients->count() }}</h5>
                     <p>Clients</p>
                 </div>
             </div>
             <div class="adminbox">
                 <div class="leftadminbox">
                    <i class="fas fa-users"></i>
                 </div>
                 <div class="rightadminbox">
                     <h5>{{ $writers->count() }}</h5>
                     <p>Writers</p>
                 </div>
             </div>
             <div class="adminbox">
                 <div class="leftadminbox">
                    <i class="fas fa-sort-amount-down-alt"></i>
                 </div>
                 <div class="rightadminbox">
                     <h5>{{ $orders->count() }}</h5>
                     <p>Available Orders</p>
                 </div>
             </div>
             <div class="adminbox">
                 <div class="leftadminbox">
                    <i class="fas fa-truck-loading"></i>
                 </div>
                 <div class="rightadminbox">
                     <h5>{{ $completedjobs->count() }}</h5>
                     <p>Completed orders</p>
                 </div>
             </div>
         </div>
          
         <div class="fourthadmindashboard">
          <div class="toprequest">
              <h5><span>Received </span> Orders</h5>
          </div>
          <div class="bottomtable" style="padding: 2rem .5rem;">
             <table class="table table-bordered" id="receivedorders">
                 <thead>
                   <tr>
                     <th scope="col">#</th>
                     <th scope="col">Order Id</th> 
                     <th scope="col">Client</th> 
                     <th scope="col">Client Email</th> 
                     <th scope="col">Category</th>
                     <th scope="col">Amount</th>
                     <th scope="col">Education Level</th> 
                     <th scope="col">View Bids</th>
                     <th scope="col">Publish Order</th>
                     <th scope="col">Read More</th>
                   </tr>
                 </thead>
                 <tbody>
                   @if ($orders->count() >= 1)
                       @foreach ($orders as $key=>$order)
                       <tr>
                        <td>{{++$key}}</td>
                        <td>{{ $order->task_id }}</td> 
                        <td>{{ $order->deadline }} hour(s)</td>
                        <td>{{ $order->submission_date }}</td>
                        <td>{{ $order->category }}</td>
                        <td>{{ $order->amount }} dollars</td>
                        <td>{{ $order->education_level }}</td> 
                        <td><a href="{{ url('admin/post_order/'.$order->task_id) }}" class="btn btn-primary">View Bids</a></td> 
                        <td><a href="{{ url('admin/activate_order/'.$order->task_id) }}" class="btn btn-warning">Publish Order</a></td> 
                        <td><a href="{{ url('admin/order_details/'.$order->task_id) }}" class="btn btn-danger">View Details</a></td> 
                      </tr>
                       @endforeach
                   @endif
                    
                    
                 </tbody>
             </table>
         
          </div>
         </div>
         <div class="thirdadmindashboard">
             <div class="leftthirdadmindashboard">
                 <div class="toprequest">
                     <h5><span>Deadline Extension</span> Requests</h5>
                 </div>
                 <div class="bottomtable">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Order Id</th>
                            <th scope="col">Open Order</th>
                            <th scope="col">Writer</th>
                            <th scope="col">Client</th>
                            <th scope="col">Current Deadline</th>
                            <th scope="col">Time Requesting</th>
                            <th scope="col">Date Assigned</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if ($extensions->count() >= 1)
                          @foreach ($extensions  as $key=>$extension)
                          <tr>
                            <td>{{++$key}}</td>
                            <td>{{ $extension->task_id}}</td>
                            <td><a href="">click to view</a></td>
                            <td>{{ $extension->writer_email}}</td>
                            <td>{{ $extension->client_email}}</td>
                            <td>{{ $extension->current_deadline}}</td>
                            <td>{{ $extension->time_requested}}</td>
                            <td>{{ $extension->date_assigned}}</td>
                            <td><span class="badge badge-success">{{ $extension->status}}</span></td> 
                            <td><a href="{{ url('admin/deadline-extension/'.$extension->task_id) }}" class="btn btn-warning">Respond</a></td> 
                          </tr>
                          @endforeach
                          
                          @else
                              <tr>
                                <td>No writer time extensions requests</td>
                              </tr>
                          @endif
                          
                          
                           
                        </tbody>
                      </table>
                 </div>
             </div>
             <div class="rightthirdadmindashboard">
                <div class="toprequest">
                    <h5><span>Completed Client </span> Jobs</h5>
                </div>
                <div class="bottomtable">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order Id</th> 
                        <th scope="col">Writer</th>
                        <th scope="col">Client</th>
                        <th scope="col">Time Uploaded</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Client Pay</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if ($completedjobs->count() >= 1)
                      @foreach ($completedjobs  as $key=>$completedjob)
                      <tr>
                        <td>{{++$key}}</td>
                        <td>{{ $completedjob->order_id}}</td> 
                        <td>{{ $completedjob->writer_email}}</td>
                        <td>{{ $completedjob->client_email}}</td>
                        <td>{{ $completedjob->updated_at}}</td>
                        <td>{{ $completedjob->submission_date}}</td>
                        <td>{{ $completedjob->bid_amount}}</td>
                        <td><span class="badge badge-success">{{ $completedjob->task_status}}</span></td> 
                        <td><a href="" class="btn btn-warning">Send Now</a></td> 
                      </tr>
                      @endforeach
                      
                      @else
                          <tr>
                            <td>No completed jobs</td>
                          </tr>
                      @endif
                      
                      
                       
                    </tbody>
                  </table>
                 </div>
             </div>
         </div>
         <div class="fourthadmindashboard">
          <div class="toprequest">
              <h5><span>All Accepted  </span> Job Bids </h5>
          </div>
          <div class="bottomtable" style="padding: 2rem .5rem;">
             <table class="table table-bordered" id="receivedorders">
                 <thead>
                   <tr>
                     <th scope="col">#</th>
                     <th scope="col">Order Id</th> 
                     <th scope="col">Client</th> 
                     <th scope="col">Date Expected</th> 
                     <th scope="col">Category</th>
                     <th scope="col">Amount</th>
                     <th scope="col">Education Level</th> 
                     <th scope="col">View Bids</th> 
                   </tr>
                 </thead>
                 <tbody>
                   @if ($activebids->count() >= 1)
                       @foreach ($activebids as $key=>$task)
                       <tr>
                        <td>{{++$key}}</td>
                        <td>{{ $task->task_id }}</td> 
                        <td>{{ $task->deadline }} hour(s)</td>
                        <td>{{ $task->submission_date }}</td>
                        <td>{{ $task->category }}</td>
                        <td>{{ $task->amount }} dollars</td>
                        <td>{{ $task->education_level }}</td> 
                        <td><a href="{{ url('admin/post_order/'.$task->task_id) }}" class="btn btn-danger">View Bids</a></td>   
                      </tr>
                       @endforeach
                   @endif
                    
                    
                 </tbody>
             </table>
         
          </div>
         </div>
         <div class="fourthadmindashboard">
             <div class="toprequest">
                 <h5><span>Order Revision</span> Requests</h5>
             </div>
             <div class="bottomtable">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order Id</th> 
                    <th scope="col">Writer</th>
                    <th scope="col">Client</th>
                    <th scope="col">Time Uploaded</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Client Pay</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($completedjobs->count() >= 1)
                  @foreach ($completedjobs  as $key=>$completedjob)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{ $completedjob->order_id}}</td> 
                    <td>{{ $completedjob->writer_email}}</td>
                    <td>{{ $completedjob->client_email}}</td>
                    <td>{{ $completedjob->updated_at}}</td>
                    <td>{{ $completedjob->submission_date}}</td>
                    <td>{{ $completedjob->bid_amount}}</td>
                    <td><span class="badge badge-success">{{ $completedjob->task_status}}</span></td> 
                    <td><a href="" class="btn btn-warning">Send Now</a></td> 
                  </tr>
                  @endforeach
                  
                  @else
                      <tr>
                        <td>No Rejected Jobs</td>
                      </tr>
                  @endif
                  
                  
                   
                </tbody>
              </table>
             </div>
         </div>
     </div>
@endsection