@extends('clientaccount.layout')
@section('content')
    <div class="taskreview"> 
        <div class="topicedit">
            <div class="toptopicedit">
                <div class="lefttopedit">
                    <h5>other details</h5>
                </div>
                <div class="righttopedit"> 
                       </div>
            </div>
            <div class="bottomtopicedit">
                 <div class="bmoredetails">
                     <div class="eachbdetail">
                        <section>Date Submited: </section>
                        <section>{{date('h:i:s  a, d/m/y', strtotime($task->updated_at)) }}</section>
                     </div> 
                      
                     <div class="eachbdetail">
                        <section>Education Level: </section>
                        <section>{{ $task->education_level }} </section>
                     </div>  
                     <div class="eachbdetail">
                        <section>Language: </section>
                        <section>{{ $task->language }}</section>
                     </div> 
                     <div class="eachbdetail">
                        <section>Solution Format: </section>
                        <section>{{ $task->solution_format }}</section>
                     </div> 
                       
                 </div>
                  
            </div>
        </div>
        <div class="topicedit">
            <div class="toptopicedit">
                <div class="lefttopedit">
                    <h5>Download Final  Document</h5>
                    <a href="" class="btn btn-primary">download now</a>
                </div>
                 
            </div>
            <div class="bottomtopicedit">
                  
                <form action="{{ url('client/request-order-revision/'.$task->task_id) }}" method="POST">
                    @csrf
                   {{ $task->task_id}}
                    <div class="form-group">
                      <label for="">Select </label> 
                       
                       <select name="decision" id="" class="form-control">
                           <option value="">select</option>
                           <option value="Accepted">Task Was Done As Expected</option>
                           <option value="Rejected">I need a Revision</option>
                       </select>
                       @error('decision')
                           <small class="text-danger">{{ $message }}</small>
                       @enderror
                  </div>
                    <div class="form-group">
                      <label for="">Send your Response here</label> 
                      
                       <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
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
    {{-- MODALS CONTENT --}}
 <!-- Button trigger modal -->
 
@endsection