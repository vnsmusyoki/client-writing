@extends('clientaccount.layout')
@section('content')
    <div class="taskreview">
        <div class="toptaskreview">
            <div class="sectiononereview">
                <span>Settings</span>
            </div>
            <div class="sectiononejobinfo">
                <div class="leftsectiononejobinfo">
                    <div class="oneleft">
                        @if (Auth()->user()->picture == '')
                        <span>{{ substr( Auth()->user()->userid, 6) }}</span>
                        @else
                        <img class="dtopavatar" src="{{ asset('storage/profiles/'.Auth()->user()->picture) }}" alt="">
                        @endif
                        
                    </div>
                    <div class="oneright">
                        <h5>My Id: <span>{{ Auth()->user()->userid }}</span></h5>
                        <h6>Category: <span>Client</span></h6>
                        <h5>Member since: <span>{{ Auth()->user()->created_at->diffForHumans() }}</span></h5>
                    </div>
                </div>
                <div class="rightsectiononejobinfo">
                    <div class="clientpay">
                        {{-- <h5>Amount paying: <span>  dollars</span></h5> --}}
                    </div>
                    <div class="clientaction">
                        <div class="deleteorder">
                          <input type="hidden" class="taskid" value="">
                          <a href="{{ url('client/remove-avatar') }}">   Remove Avatar </a>

                        </div>
                        <div class="uploadorder">
                           
                          <a href="" data-toggle="modal" data-target="#modalupdateavatar"><i class="fas fa-recycle"></i> update avatar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="topicedit">
            <div class="toptopicedit">
                <div class="lefttopedit">
                    <h5>Password</h5>
                </div>
                <div class="righttopedit">
                    <button data-toggle="modal" data-target="#modaleditpassword" 
                       data-topic="{{ Auth()->user()->id }}">change</button>
                </div>
            </div>
            <div class="bottomtopicedit">
                <p>*******</p>
            </div>
        </div>
        <div class="topicedit">
            <div class="toptopicedit">
                <div class="lefttopedit">
                    <h5>email address</h5>
                </div>
                <div class="righttopedit"> 
                    <button data-toggle="modal" data-target="#modaleditemail" 
                       data-email="{{ Auth()->user()->email}}">change</button>
                </div>
            </div>
            <div class="bottomtopicedit">
                <p>{{ Auth()->user()->email }}</p>
            </div>
        </div>
        <div class="topicedit">
            <div class="toptopicedit">
                <div class="lefttopedit">
                    <h5>Client Id</h5>
                </div>
                <div class="righttopedit">  
                </div>
            </div>
            <div class="bottomtopicedit">
                <p>{{ Auth()->user()->userid }}</p>
            </div>
        </div> 
        <div class="topicedit">
            <div class="toptopicedit">
                <div class="lefttopedit">
                    <h5>Phone Number</h5>
                </div>
                <div class="righttopedit">
                    <button data-toggle="modal" data-target="#updatephonenumber" 
                    data-recordid="{{ Auth()->user()->id }}">change</button> 
                </div>
            </div>
            <div class="bottomtopicedit">
                <p>+ {{ Auth::user()->phone_number }}</p>
            </div>
        </div> 
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
                        <section>Date Created account: </section>
                        <section>  {{ Auth()->user()->created_at }}</section>
                     </div> 
                     <div class="eachbdetail">
                        <section>Last Update </section>
                        <section>  {{ Auth()->user()->updated_at }}</section>
                     </div> 
                     <div class="eachbdetail">
                        <section>Total Completed Jobs</section>
                        <section>12</section>
                     </div>  
                     <div class="eachbdetail">
                        <section>Total Amount paid out: </section>
                        <section> 98365 dollars</section>
                     </div> 
                       
                 </div>
                  
            </div>
        </div>
        
    </div>
    {{-- MODALS CONTENT --}}

    {{-- MODAL FOR EDITING THE TOPIC --}}

 
  
  <!-- Modal -->
  <div class="modal fade" data-keyboard="false" data-backdrop="static" id="modaleditpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Account Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('client/updatepassword') }}" method="POST"> 
            @csrf
        <div class="modal-body">
          <div class="form-group">
                <label for="">New Password</label>
                <input type="password" name="password" id="modaltopic" class="form-control form-control-lg" required>
                @error('password')
                    <small class="text-danger">{{$message }}</small>
                @enderror
          </div>
          <div class="form-group">
                <label for="">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="modaltopic" class="form-control form-control-lg" required>
                @error('password_confirmation')
                <small class="text-danger">{{$message }}</small>
            @enderror
          </div> 
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
  <div class="modal fade" data-keyboard="false" data-backdrop="static" id="modaleditemail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Email Address</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('client/updateemail') }}" method="POST"> 
            @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="">Email Address</label>
                <input type="email" name="email" id="modaltopic" class="form-control form-control-lg" required value="{{ Auth::user()->email }}">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit now</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
  {{-- EDITING ATTACHMENTS --}}
  <div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalupdateavatar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update your profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('client/update-avatar') }}" method="POST" enctype="multipart/form-data"> 
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
          <button type="submit" class="btn btn-primary">Upload now</button>
        </div>
        </form>
      </div>
    </div>
  </div>
{{-- DELETING ORDER --}}
<!-- Button trigger modal --> 

<!-- Modal -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="updatephonenumber" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('client/update-phone-number') }}" method="POST">
        @csrf 
      <div class="modal-body">
        <div class="form-group">
            <label for="">Phone Number</label>
            <input type="number" min="1" name="phone_number" id="" class="form-control form-control-lg" required value="{{ Auth::user()->phone_number }}">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
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