@extends('admin.layout')
@section('content')
    <div class="orderdetails">
        
        <div class="topicedit">
            <div class="toptopicedit">
                <div class="lefttopedit">
                    <h5>Order Details  ({{ $task->task_id }} )</h5>
                </div>
                <div class="righttopedit">
                    <button data-toggle="modal" data-target="#modaleditpassword" 
                       data-topic="{{ Auth()->user()->id }}">Notify Writer</button>
                </div>
            </div>
            <div class="bottomtopicedit">
                <div class="bmoredetails">
                    <div class="eachbdetail">
                       <section>Time Requesting  </section>
                       <section>  {{ $task->time_requested }} hour(s)</section>
                    </div> 
                    <div class="eachbdetail">
                       <section>Time Requested: </section>
                       <section>  {{ $task->current_deadline }}</section>
                    </div> 
                    <div class="eachbdetail">
                       <section>Date Assigned: </section>
                       <section>  {{ $task->date_assigned }}</section>
                    </div> 
                     
                    <div class="eachbdetail">
                       <section>Writer </section>
                       <section>  {{ $task->writer_email }}  </section>
                    </div> 
                    
                    
                     
                </div>
            </div>
        </div>
        <div class="topicedit">
            <div class="toptopicedit">
                <div class="lefttopedit">
                    <h5>Send Response Now</h5>
                </div>
                 
            </div>
            <div class="bottomtopicedit">
                  
                <form action="{{ url('admin/writer-deadline-extension-response/'.$task->task_id) }}" method="POST">
                    @csrf
                   
                    <div class="form-group">
                      <label for="">Select </label> 
                       
                       <select name="decision" id="" class="form-control">
                           <option value="">select</option>
                           <option value="Accepted">Add More time</option>
                           <option value="Rejected">Reject Writer Request</option>
                       </select>
                       @error('decision')
                           <small class="text-danger">{{ $message }}</small>
                       @enderror
                  </div>
                    <div class="form-group">
                      <label for="">Add Additional Content to what the client said here</label> 
                      
                       <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $task->client_comment }}</textarea>
                       @error('description')
                           <small class="text-danger">{{ $message }}</small>
                       @enderror
                  </div> 
                   
                  <div class="modal-footer"> 
                    <button type="submit" class="btn btn-primary">Send to Writer </button>
                  </div>
                </form>
                  
            </div>
        </div>
    </div>
@endsection