@extends('admin.layout')
@section('content')
    <div class="orderdetails">
        
        <div class="topicedit">
            <div class="toptopicedit">
                <div class="lefttopedit">
                    <h5>Order Details  ({{ $order->order_id }} )</h5>
                </div>
                <div class="righttopedit">
                    <button data-toggle="modal" data-target="#modaleditpassword" 
                       data-topic="{{ Auth()->user()->id }}">Notify Writer</button>
                </div>
            </div>
            <div class="bottomtopicedit">
                <div class="bmoredetails">
                    <div class="eachbdetail">
                       <section>Date Rejected: </section>
                       <section>  {{ $order->updated_at }}</section>
                    </div> 
                    <div class="eachbdetail">
                       <section>Solution Format: </section>
                       <section>  {{ $order->solution_format }}</section>
                    </div> 
                    <div class="eachbdetail">
                       <section>Date Expected: </section>
                       <section>  {{ $order->submission_date }}</section>
                    </div> 
                    <div class="eachbdetail">
                       <section>Client Remarks: </section>
                       <section>  {{ $order->client_remarks }} </section>
                    </div> 
                    <div class="eachbdetail">
                       <section>Client Pay </section>
                       <section>  {{ $order->task_amount }} dollars </section>
                    </div> 
                    <div class="eachbdetail">
                       <section>Amount Paying </section>
                       <section>  Ksh {{ $order->bid_amount }} </section>
                    </div> 
                    
                     
                </div>
            </div>
        </div>
        <div class="topicedit">
            <div class="toptopicedit">
                <div class="lefttopedit">
                    <h5>Notify client</h5>
                </div>
                 
            </div>
            <div class="bottomtopicedit">
                  
                <form action="{{ url('admin/notify-client-revision') }}" method="POST">
                    @csrf
                   
                    <div class="form-group">
                      <label for="">Add Additional Content to what the client said here</label> 
                      
                       <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $order->client_remarks }}</textarea>
                       @error('description')
                           <small class="text-danger">{{ $message }}</small>
                       @enderror
                  </div>
                   <input type="hidden" name="taskid" value="{{$order->order_id }}">
                   <input type="hidden" name="clientemail" value="{{$order->client_email }}">
                   <input type="hidden" name="writeremail" value="{{$order->writer_email }}">
                   
                  <div class="modal-footer"> 
                    <button type="submit" class="btn btn-primary">Upload Final Document </button>
                  </div>
                </form>
                  
            </div>
        </div>
    </div>
@endsection