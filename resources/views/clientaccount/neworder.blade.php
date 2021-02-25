@extends('clientaccount.layout')
@section('content')
    <div class="dashboardone" style="background-color: #E8EDF2;">
        <div class="neworder">    
        </div>
        <div class="orderform">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4">
                    <div class="fielddescription" id="fielddescription">
                        <div class="eachdescription">
                            <div class="topeachdescription">
                                <h5><span></span>Make sure to check on this to see the descriptions</h5>
                                <p id="category" style="color: rgb(235, 23, 129);margin-top:9rem;"></p> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-8">
                    <form action="{{ url('client/upload_task') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select name="category" id="categoryfield" class="form-control">
                                        <option value="">select</option>
                                        <option value="Accounting">Accounting</option>
                                        <option value="Essay">Essay</option>
                                    </select>
                                    @error('category')
                                        <small class="text-danger">{{$message }}</small>
                                    @enderror
                            </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="">Deadline</label>
                                    <select name="deadline" id="deadlinefield" class="form-control">
                                        <option value="">select</option>
                                        <option value="1">1 hour</option>
                                        <option value="2">2 Hours</option>
                                    </select>
                                    @error('category')
                                        <small class="text-danger">{{$message }}</small>
                                    @enderror
                               </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Topic</label>
                            <input  type="text" name="topic" id="topic" class="form-control" value="{{ old('topic') }}">
                              
                            @error('topic')
                                <small class="text-danger">{{$message }}</small>
                            @enderror
                       </div>
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
                            @error('solution_format')
                                <small class="text-danger">{{$message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="">Attachments</label>
                                    <input  type="file" name="picture" id="images" class="form-control" value="{{ old('attachments') }}">
                             
                                    @error('picture')
                                        <small class="text-danger">{{$message }}</small>
                                    @enderror
                            </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="">Education Level</label>
                                    <select name="education_level" id="education" class="form-control">
                                        <option value="">select</option>
                                        <option value="High School">High School</option>
                                        <option value="College">College</option>
                                        <option value="University">University</option>
                                        <option value="Masters">Masters</option>
                                        <option value="PHD">Ph.D</option>
                                    </select>
                                    @error('category')
                                        <small class="text-danger">{{$message }}</small>
                                    @enderror
                               </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="">Amount Paying(in dollars)</label>
                                    <input  type="number" min="1" name="amount" id="amount" class="form-control" value="{{ old('amount') }}">
                             
                                    @error('amount')
                                        <small class="text-danger">{{$message }}</small>
                                    @enderror
                            </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="">Language</label>
                                    <select name="language" id="language" class="form-control">
                                        <option value="">select</option>
                                        <option value="English">English</option>
                                        <option value="Spanish">Spanish</option>
                                        <option value="French">French</option> 
                                    </select>
                                    @error('language')
                                        <small class="text-danger">{{$message }}</small>
                                    @enderror
                               </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="description" cols="30" class="form-control" rows="10">{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{$message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Upload Now</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection