@extends('writer.layout')
@section('content')
    <div class="dashboardone">
        
         <div class="mynotifications">
                <div class="topmynotifications">
                    <h5>Time Extensions Requested  <span class="badge badge-success">{{ $extensions->count()  }}</span></h5>
                </div>
                
         </div>
         
        <div class="bottomcontents">
            @if ($extensions->count() >= 1)
            <table class="table table-bordered table-striped table-hover" id="allbids" style="width: 100% !important;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task Id </th> 
                    <th scope="col">Expected deadline</th>  
                    <th scope="col">Time Requesting</th> 
                    <th scope="col">Received At</th> 
                    <th scope="col">Status</th> 
                    <th scope="col">Comments</th>
                  </tr>
                </thead>
                <tbody> 
                      @foreach ($extensions as $key=>$extension)
                      <tr>
                       <td>{{++$key}}</td>
                       <td>{{ $extension->task_id }}</td> 
                       <td>{{ $extension->current_deadline }} </td>
                       <td>{{ $extension->time_requested }} hour(s)</td>
                       <td>{{date('h:i:s  a, d/m/y', strtotime($extension->created_at)) }}</td>  
                       <td>
                           @if ($extension->status == "accepted")
                              <a  class="badge badge-success badge-pill text-light"> request {{ $extension->status }}</a>
                           @elseif($extension->status == "denied")
                              <a  class="badge badge-danger badge-pill text-light">request {{ $extension->status }} </a>
                           @else
                              <a  class="badge badge-primary badge-pill text-light"> {{ $extension->status }} decision </a>
                           @endif
                           
                        </td>  
                       <td>
                        @if ($extension->status == "accepted")
                         <a  class="badge badge-success badge-pill text-light">  {{ $extension->admin_comment }}</a>
                     @elseif($extension->status == "denied")
                        <a  class="badge badge-danger badge-pill text-light">{{ $extension->admin_comment }} </a>
                     @else
                        <a  class="badge badge-primary badge-pill text-light"> {{ $extension->admin_comment }}  </a>
                     @endif
                        </td>  
                     </tr>
                      @endforeach 
                </tbody>
            </table>
            @else
            <div class="bottommynotifications">
                <img src="{{ asset('pages/images/no-transactions.svg') }}" alt="">
                <h5>You don’t have any notifications</h5>
                <p>Please complete any action such as placing a bid to receive new notifications</p>
            </div>
            @endif
             
        </div>
    </div>
@endsection