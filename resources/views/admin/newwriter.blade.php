@extends('admin.layout')
@section('content')
    <div class="newwriter">
        <div class="leftnewwriter">
            <form method="POST" action="{{ url('admin/registerwriter') }}" autocomplete="off" >
                @csrf
                <h6>Register New Writer</h6>
                <hr>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"> <i class="ik ik-user-check"></i></div>
                  </div>
                  <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Full names" name="full_names" value="{{ old('full_names') }}">
                 
                </div> 
                @error('full_names')
                <small class="text-danger">{{ $message }}</small>
            @enderror
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="ik ik-voicemail"></i></div>
                  </div>
                  <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Email address" name="email" value="{{ old('email') }}">
                  
                </div>
                @error('email')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="ik ik-phone-call"></i></div>
                  </div>
                  <input type="number" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Phone number" max="0799999999" min="0700000001" name="phone_number" value="{{ old('phone_number') }}">
                  
                </div>
                @error('phone_number')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="ik ik-settings"></i></div>
                  </div>
                  <input type="password" class="form-control" id="inlineFormInputGroupUsername2" placeholder="password" name="password" value="{{ old('password') }}">
                  
                </div>
                @error('password')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="ik ik-voicemail"></i></div>
                  </div>
                  <input type="password" class="form-control" id="inlineFormInputGroupUsername2" placeholder="confirm password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                </div>
                
                
              
                <button type="submit" class="btnregister">Submit</button>
              </form>
        </div>
        <div class="rightnewwriter"></div>
    </div>
@endsection