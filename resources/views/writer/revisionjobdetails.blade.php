@extends('writer.layout')
@section('content')
    <div class="taskreview">
        <div class="toptaskreview">
            <div class="sectiononereview">
                <span>Job Details - {{ $task->task_id }}</span>
            </div>
            <div class="sectiononejobinfo">
                <div class="leftsectiononejobinfo">
                    <div class="oneleft">
                        <span>{{ substr($task->task_id, 3) }}</span>
                    </div>
                    <div class="oneright">
                        <h5>Task Id: <span>{{ $task->task_id }}</span></h5>
                        <h6>Category: <span>{{ $task->category }}</span></h6>
                        <h5>Deadline <span>{{date('h a, d/m/y', strtotime($task->submission_date)) }}</span></h5> 
                    </div>
                </div>
                
            </div>
        </div>
        <br>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Client Comment!</h4>
            <p>{{ $message->client_remarks }}</p>
            <hr>
             
          </div>
          <br>
        <div class="topicedit">
            <div class="toptopicedit">
                <div class="lefttopedit">
                    <h5>topic</h5>
                </div>
                <div class="righttopedit">
                     
                </div>
            </div>
            <div class="bottomtopicedit">
                <p>{{ $task->topic }}</p>
            </div>
        </div>
        <div class="topicedit">
            <div class="toptopicedit">
                <div class="lefttopedit">
                    <h5>description</h5>
                </div>
                <div class="righttopedit"> 
                     
                </div>
            </div>
            <div class="bottomtopicedit">
                <p>{{ $task->description }}</p>
            </div>
        </div>
        <div class="topicedit">
            <div class="toptopicedit">
                <div class="lefttopedit">
                    <h5>Solution Format</h5>
                </div>
                <div class="righttopedit"> 
                   
                </div>
            </div>
            <div class="bottomtopicedit">
                <p>{{ $task->solution_format }}</p>
            </div>
        </div>
        @if ($task->picture !== '')
        <div class="topicedit">
            <div class="toptopicedit">
                <div class="lefttopedit">
                    <h5>Attachments</h5>
                </div>
                <div class="righttopedit">
                     
                </div>
            </div>
            <div class="bottomtopicedit">
                <p>{{ $task->picture }}</p>
            </div>
        </div>
        @endif
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
                        <section>Time Duration: </section>
                        <section>{{date('h a, d/m/y', strtotime($task->submission_date)) }}</section>
                     </div> 
                      
                     <div class="eachbdetail">
                        <section>Education Level: </section>
                        <section>{{ $task->education_level }} </section>
                     </div>  
                     <div class="eachbdetail">
                        <section>Language: </section>
                        <section>{{ $task->language }}</section>
                     </div> 
                       
                 </div>
                  
            </div>
        </div>
        
    </div>
    {{-- MODALS CONTENT --}}
 <!-- Button trigger modal -->
 
  
 
@endsection