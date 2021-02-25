@extends('clientaccount.layout')
@section('content')
    <div class="taskreview">
        <div class="toptaskreview">
            <div class="sectiononereview">
                <span>Job Details</span>
            </div>
            <div class="sectiononejobinfo">
                <div class="leftsectiononejobinfo">
                    <div class="oneleft">
                        <span>{{ substr($task->task_id, 6) }}</span>
                    </div>
                    <div class="oneright">
                        <h5>Task Id: <span>{{ $task->task_id }}</span></h5>
                        <h6>Category: <span>{{ $task->category }}</span></h6>
                        <h5>Time created <span>{{ $task->created_at->diffForHumans() }}</span></h5>
                    </div>
                </div>
                <div class="rightsectiononejobinfo">
                    <div class="clientpay">
                        <h5>Amount paying: <span>{{ $task->amount }} dollars</span></h5>
                    </div>
                    <div class="clientaction">
                        <div class="deleteorder">
                          <input type="hidden" class="taskid" value="{{ $task->id }}">
                            <button class="deletejob">delete</button>

                        </div>
                        <div class="uploadorder">
                          
                          <a href="{{ url('client/jobreview/uploadadmin/'.$task->id) }}"> <i class="fas fa-file-upload"></i>  Send to Admin </a>
                        </div>
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
                    <button data-toggle="modal" data-target="#modaltopicedit" 
                    data-recordid="{{ $task->id }}"  data-topic="{{ $task->topic }}">change</button>
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
                    <button data-toggle="modal" data-target="#modaldescriptioncedit" 
                    data-recordid="{{ $task->id }}"  data-description="{{ $task->description }}">change</button>
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
                    <button data-toggle="modal" data-target="#modalsolutionformatedit" 
                    data-recordid="{{ $task->id }}"  data-solution="{{ $task->solution_format }}">change</button>
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
                    <button data-toggle="modal" data-target="#modalattachmentsedit" 
                    data-recordid="{{ $task->id }}">change</button> 
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
                    <button data-toggle="modal" data-target="#modalotherdetailsedit" 
                    data-recordid="{{ $task->id }}" data-deadline="{{ $task->deadline }}" data-language="{{ $task->language }}" data-education="{{ $task->education_level }}" data-amount="{{ $task->amount }}">change</button> 
                </div>
            </div>
            <div class="bottomtopicedit">
                 <div class="bmoredetails">
                     <div class="eachbdetail">
                        <section>Time Duration: </section>
                        <section>{{ $task->deadline }} hour(s)</section>
                     </div> 
                     <div class="eachbdetail">
                        <section>Amount </section>
                        <section>{{ $task->amount }} dollars</section>
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

    {{-- MODAL FOR EDITING THE TOPIC --}}

 
  
  <!-- Modal -->
  <div class="modal fade" data-keyboard="false" data-backdrop="static" id="modaltopicedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('client/jobreview/topic') }}" method="POST"> 
            @csrf
        <div class="modal-body">
          <div class="form-group">
                <label for="">Topic</label>
                <input type="text" name="topicedit" id="modaltopic" class="form-control form-control-lg" required>
          </div>
          <input type="hidden" id="modalrecord" name="modalrecordtitle">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  {{-- EDITING DESCRIPTION CONTENT --}}
  <div class="modal fade" data-keyboard="false" data-backdrop="static" id="modaldescriptioncedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('client/jobreview/description') }}" method="POST"> 
            @csrf
        <div class="modal-body">
          <div class="form-group">
                <label for="">Description</label>
                {{-- <input type="text" name="modaldescritption" id="modaldescritption" class="form-control form-control-lg" required> --}}
                <textarea name="modaldescritption" id="modaldescritption" cols="30" rows="10" class="form-control form-control-lg" required></textarea>
          </div>
          <input type="hidden" id="modalrecord" name="modalrecordtitle">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  {{-- EDITING SOLUTION FORMAT NEEDED --}}
  <div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalsolutionformatedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('client/jobreview/solutionformat') }}" method="POST"> 
            @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="">Solution Format</label>
            <select name="solution_format" id="solution" class="form-control">
                <option value="">select</option>
                <option value="Fully types step by step solutions(Match Tasks Mostly)">Fully types step by step solutions(Match Tasks Mostly)</option>
                <option value="Handwritten fully worked out step by step solutions(Maths Mostly)">Handwritten fully worked out step by step solutions(Maths Mostly)</option>
                <option value="Answers Only(Multiple choice questions and Online Tasks)">Answers Only(For Onlinetasks and Multiple choice questions)</option>
                <option value="Word Document">Word DOcument</option>
                <option value="PDF Format">PDF format</option>
                <option value="Analysis files(Excel, SPSS, STATA etc)">Analysis files(Excel, SPSS, STATA etc)</option>
                <option value="Any other files(Not Specified here)">Any other files(Not Specified here)</option>
            </select>

                
          </div>
          
          <input type="hidden" id="modalrecord" name="modalrecordtitle">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  {{-- EDITING ATTACHMENTS --}}
  <div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalattachmentsedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('client/jobreview/attachments') }}" method="POST" enctype="multipart/form-data"> 
            @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="">FIles Upload</label>
            <input  type="file" name="picture" id="images" class="form-control" required>
                             
          </div>
          
          <input type="hidden" id="modalrecord" name="modalrecordtitle">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
{{-- DELETING ORDER --}}
<!-- Button trigger modal --> 

<!-- Modal -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="deletingorder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dailog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  {{-- EDITING OTHER DETAILS  --}}
  <div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalotherdetailsedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('client/jobreview/lastdetails') }}" method="POST"> 
            @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="">Deadline.(note that this will only apply after admin has received your order)</label>  
            <select name="deadline" id="modaldeadline" class="form-control" required>
              <option value="">select</option>
              <option value="1">1 hour</option>
              <option value="2">2 Hours</option>
          </select>           
          </div>
          <div class="form-group">
            <label for="">Amount paying in dollars</label>
            <input  type="number" min="1" name="amount" id="modalamount" class="form-control" required>   
                      
          </div>
          <div class="form-group">
            <label for="">Language</label>
            <select name="language" id="" class="form-control" required>
                <option value="">select</option>
                <option value="English">English</option>
                <option value="Spanish">Spanish</option>
                <option value="French">French</option>
            </select>               
          </div>
          <div class="form-group">
            <label for="">Education Level</label>
            <select name="education_level" id="education" class="form-control" required>
                <option value="">select</option>
                <option value="High School">High School</option>
                <option value="College">College</option>
                <option value="University">University</option>
                <option value="Masters">Masters</option>
                <option value="PHD">Ph.D</option>
            </select>
            
       </div>
          
          <input type="hidden" id="modalrecord" name="modalrecordtitle">
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