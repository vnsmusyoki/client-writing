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
                        <span>{{ substr($task->task_id, 5) }}</span>
                    </div>
                    <div class="oneright">
                        <h5>Task Id: <span>{{ $task->task_id }}</span></h5>
                        <h5>Bid Amount: Ksh <span>{{ $bid->bid_amount }}</span></h5>
                        <h6>Category: <span>{{ $task->category }}</span></h6>
                        <h5>Deadline <span>{{date('h a, d/m/y', strtotime($task->submission_date)) }}</span></h5> 
                        <a  href="{{ url('writer/delete-bid/'.$task->task_id) }}" class="btn btn-danger" >Remove Bid</a>
                    </div>
                </div>
                
            </div>
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
                @if($task->picture !== '')
                    <p>{{ $task->picture }}</p>
                    <a href="" class="btn btn-primary">download document(s)</a>
                @endif
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
 
  
  <!-- Modal -->
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
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection