@extends('admin.layout')
@section('content')
    <div class="writerdetails">
         <div class="leftwriterdetails">
             <div class="topleftwriterdetails">
                <img src="{{ asset('storage/profiles/'.$user->picture) }}" class="img-fluid" alt="">
             </div>
             <div class="middleleftwriterdetails">
                 <div class="eachcontent">
                     <h5>Full Names</h5>
                     <p>{{$user->name }}</p>
                 </div>
                 <div class="eachcontent">
                     <h5>Email Address</h5>
                     <p>{{$user->email }}</p>
                 </div>
                 <div class="eachcontent">
                     <h5>Writer Id</h5>
                     <p>{{$user->userid }}</p>
                 </div>
                 <div class="eachcontent">
                     <h5>Member Since</h5>
                     <p>{{date('h:i:s a, d/m/Y', strtotime($user->created_at)) }}</p>
                 </div>
                 <div class="eachcontent">
                     <h5>Phone Number</h5>
                     <p>+ {{$user->phone_number }}</p>
                 </div>
                 <div class="eachcontent">
                     <h5>Completed Tasks</h5>
                     <p>{{$user->userid }}</p>
                 </div>
                 <div class="eachcontent">
                     <h5>Penalties Awarded</h5>
                     <p>{{$user->userid }}</p>
                 </div>
                 <div class="eachcontent">
                     <h5>Amount paid</h5>
                     <p>{{$user->userid }}</p>
                 </div>
                 <div class="eachcontent">
                     <h5>Pending Payments</h5>
                     <p>{{$user->userid }}</p>
                 </div>
             </div>
         </div>
         <div class="rightwriterdetails">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="comments-tab" data-bs-toggle="tab" data-bs-target="comments" type="button" role="tab" aria-controls="comments" aria-selected="true">Comments</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="tasks-tab" data-bs-toggle="tab" data-bs-target="#tasks" type="button" role="tab" aria-controls="tasks" aria-selected="false">Tasks</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="inprogress-tab" data-bs-toggle="tab" data-bs-target="#inprogress" type="button" role="tab" aria-controls="inprogress" aria-selected="false">On Progress</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="payments-tab" data-bs-toggle="tab" data-bs-target="#payments" type="button" role="tab" aria-controls="payments" aria-selected="false">Payments</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="disputedpayments-tab" data-bs-toggle="tab" data-bs-target="#disputedpayments" type="button" role="tab" aria-controls="disputedpayments" aria-selected="false">Disputed Payments</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="bids-tab" data-bs-toggle="tab" data-bs-target="#bids" type="button" role="tab" aria-controls="bids" aria-selected="false">Bids</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active commentscheck" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                     
                        <div class="eachcomment">
                            <div class="lefteachcomment">
                                <img src="{{ asset('clients/img/logo.jpg') }}" alt="">
                            </div>
                            <div class="righteachcomment">
                                <div class="toprighteachcomment">
                                    <span class="name">kimeu musyoki</span>
                                    <span class="time">Mon 12,23,2021 - 12:24pm</span>
                                </div>
                                <div class="bottomrighteachcomment">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore voluptatum, aperiam ut provident atque dolore, ipsa magni autem nihil quas natus esse qui non. Voluptatibus possimus obcaecati explicabo veniam mollitia! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim minus, aut sint quo illo officia ut adipisci error tempora dolor odit, doloremque ullam sit recusandae. Ipsum neque ea odit molestias?</p>
                                </div>
                                <div class="footerrighteachcomment">
                                    <div class="footeritem">
                                        <span class="topic">Client Id</span>
                                        <span>1298746</span>
                                    </div>
                                    <div class="footeritem">
                                        <span class="topic">Task Id</span>
                                        <span>129874</span>
                                    </div>
                                    <div class="footeritem">
                                        <span class="topic">Client Id</span>
                                        <span>1298746</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="eachcomment">
                            <div class="lefteachcomment">
                                <img src="{{ asset('clients/img/logo.jpg') }}" alt="">
                            </div>
                            <div class="righteachcomment">
                                <div class="toprighteachcomment">
                                    <span class="name">kimeu musyoki</span>
                                    <span class="time">Mon 12,23,2021 - 12:24pm</span>
                                </div>
                                <div class="bottomrighteachcomment">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore voluptatum, aperiam ut provident atque dolore, ipsa magni autem nihil quas natus esse qui non. Voluptatibus possimus obcaecati explicabo veniam mollitia! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim minus, aut sint quo illo officia ut adipisci error tempora dolor odit, doloremque ullam sit recusandae. Ipsum neque ea odit molestias?</p>
                                </div>
                                <div class="footerrighteachcomment">
                                    <div class="footeritem">
                                        <span class="topic">Client Id</span>
                                        <span>1298746</span>
                                    </div>
                                    <div class="footeritem">
                                        <span class="topic">Task Id</span>
                                        <span>129874</span>
                                    </div>
                                    <div class="footeritem">
                                        <span class="topic">Client Id</span>
                                        <span>1298746</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                </div>
                <div class="tab-pane fade" id="tasks" role="tabpanel" aria-labelledby="tasks-tab">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Task Id</th>
                            <th scope="col">Amount Paid</th>
                            <th scope="col">Client Offer</th>
                            <th scope="col">Date Submitted</th>
                            <th scope="col">status</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if($tasks->count() >= 1)
                          @foreach ($tasks as $key=>$task)
                          <tr>
                            <th>{{++$key }}</th>
                            <td>{{ $task->order_id }}</td>
                            <td>KSh {{ $task->bid_amount }}</td> 
                            <td>{{ $task->task_amount }} dollars</td> 
                            <td>{{ $task->submission_date }}</td> 
                            <td><button type="button" class="btn btn-outline-warning">{{ $task->payment_status}}</button></td>
                          </tr>
                          @endforeach
                          
                         @endif
                        </tbody>
                      </table>
                </div>
                <div class="tab-pane fade" id="inprogress" role="tabpanel" aria-labelledby="inprogress-tab">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Task Id</th>
                          <th scope="col">Amount Paid</th>
                          <th scope="col">Client Offer</th>
                          <th scope="col">Date Submitted</th>
                          <th scope="col">status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($progresstasks->count() >= 1)
                        @foreach ($progresstasks as $key=>$taskcheck)
                        <tr>
                          <th>{{++$key }}</th>
                          <td>{{ $taskcheck->order_id }}</td>
                          <td>KSh {{ $taskcheck->bid_amount }}</td> 
                          <td>{{ $taskcheck->task_amount }} dollars</td> 
                          <td>{{ $taskcheck->submission_date }}</td> 
                          <td><button type="button" class="btn btn-outline-warning">{{ $taskcheck->payment_status}}</button></td>
                        </tr>
                        @endforeach
                        
                       @endif
                      </tbody>
                      </table>
                </div>
                <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Task Id</th>
                            <th scope="col">Client Id</th>
                            <th scope="col">Category</th>
                            <th scope="col">Date Submited</th>
                            <th scope="col">Date Paid</th>
                            <th scope="col">Amount</th>
                            <th scope="col">status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th>1</th>
                            <td>987654</td>
                            <td>987654</td>
                            <td>accounting</td>
                            <td>12/12/2021</td>
                            <td>12/12/2021</td>
                            <td>Ksh 3000</td>
                            <td><button type="button" class="btn btn-outline-warning">paid</button></td>
                          </tr>
                         
                        </tbody>
                      </table>
                </div>
                <div class="tab-pane fade" id="disputedpayments" role="tabpanel" aria-labelledby="disputedpayments-tab">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Task Id</th>
                            <th scope="col">Client Id</th>
                            <th scope="col">Category</th>
                            <th scope="col">Date Submited</th>
                            <th scope="col">Date Paid</th>
                            <th scope="col">Amount</th>
                            <th scope="col">status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th>1</th>
                            <td>987654</td>
                            <td>987654</td>
                            <td>accounting</td>
                            <td>12/12/2021</td>
                            <td>12/12/2021</td>
                            <td>Ksh 3000</td>
                            <td><button type="button" class="btn btn-outline-warning">pending</button></td>
                          </tr>
                         
                        </tbody>
                      </table>
                </div>
                <div class="tab-pane fade" id="bids" role="tabpanel" aria-labelledby="bids-tab">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task Id</th>
                        <th scope="col">Bid Amount</th>
                        <th scope="col">Task Category</th>
                        <th scope="col">Date Placed</th> 
                      </tr>
                    </thead>
                    <tbody>
                      @if($bids->count() >= 1)
                      @foreach ($bids as $key=>$bid)
                      <tr>
                        <th>{{++$key }}</th>
                        <td>{{ $bid->order_id }}</td>
                        <td>KSh {{ $bid->bid_amount }}</td> 
                        <td>{{ $bid->task_amount }} dollars</td> 
                        <td>{{ $bid->submission_date }}</td>  
                      </tr>
                      @endforeach
                      
                     @endif
                    </tbody>
                    </table>
                </div>
              </div>
         </div>
    </div>
@endsection