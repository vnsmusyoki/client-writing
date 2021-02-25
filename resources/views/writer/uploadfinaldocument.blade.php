@extends('writer.layout')
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
                        <section>Submit Before: </section>
                        <section>{{date('h:i:s  a, d/m/y', strtotime($task->submission_date)) }}</section>
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
                    <h5>Upload Final Document</h5>
                </div>
                 
            </div>
            <div class="bottomtopicedit">
                  
                <form action="{{ url('writer/upload-final-document') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                   
                    <div class="form-group">
                      <label for="">Make sure the file uploading is of same solution format expected by client</label> 
                       <input type="file" name="picture" class="form-control">
                       @error('picture')
                           <small class="text-danger">{{ $message }}</small>
                       @enderror
                  </div>
                  <input type="hidden"  name="recordnumber" id="orderid" class="form-control" value="{{ $task->task_id }}">
                   
                  <div class="modal-footer"> 
                    <button type="submit" class="btn btn-primary">Upload Final Document </button>
                  </div>
                </form>
                  
            </div>
        </div>
        
    </div>
    {{-- MODALS CONTENT --}}
 <!-- Button trigger modal -->
 
@endsection