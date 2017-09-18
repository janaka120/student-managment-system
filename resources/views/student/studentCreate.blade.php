@extends('layout.template')

@section('body')
<div class="content">
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="card">
	                <div class="flash-message">
					    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
					      @if(Session::has('alert-' . $msg))
						    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a 	href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    </p>
					      @endif
					    @endforeach
				  	</div>    
	                <div class="header">
	                    <h4 class="title">{{isset($student) ? 'Update' : 'Create'}} Student</h4>
	                </div>
	                <div class="content">
	                    <form method="POST" action="{{ isset($student) ? route('student.update', $student->id) : route('student.store') }}">
	                    	{{ csrf_field() }}
	                    	<input type="hidden" name="_method" value="{{ isset($student) ? 'PUT': 'POST'}}" />
							<div class="row">	                    	
	                            <div class="col-md-12">
	                                <div class="form-group">
	                                    <label>Full Name</label>
	                                    <input id="name" name="name" type="text" class="form-control" placeholder="Username" value="{{ isset($student)? $student->name: old('name')}}">
	                                    @if($errors->has('name'))
	                          				<p class="alert alert-danger">{{ $errors->first('name') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
	                                    @endif
	                                </div>
	                            </div>
                            </div>

                            <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group">
	                                    <label for="name">Email address</label>
	                                    <input id="email" name="email" type="email" class="form-control" placeholder="Email" value="{{ isset($student)? $student->email: old('email')}}">
	                                    @if($errors->has('email'))
	                          				<p class="alert alert-danger">{{ $errors->first('email') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
	                                    @endif
	                                </div>
	                            </div>
                            </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group">
	                                    <label>Address</label>
	                                    <input id="address" name="address" type="text" class="form-control" placeholder="Home Address" value="{{ isset($student)? $student->address: old('address')}}">
	                                	@if($errors->has('address'))
	                          				<p class="alert alert-danger">{{ $errors->first('address') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
	                                    @endif
	                                </div>
	                            </div>
	                        </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group">
	                                    <label>Date of Birth</label>
	                                    <input id="dob" name="dob" type="text" class="form-control" placeholder="DOB" value="{{ isset($student)? $student->dob: old('dob')}}">
                                    	@if($errors->has('dob'))
	                          				<p class="alert alert-danger">{{ $errors->first('dob') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
	                                    @endif
	                                </div>
	                            </div>
                            </div>

                            <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group">
	                                    <label>Gender</label>
	                                    <div>
                                        	<label class="radio-inline">
                                                <input type="radio" value="m" id="gender" name="gender" {{ (isset($student) && ($student->gender =='m')) || old('gender') ? 'checked' :""}}>Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" id="gender" value="f" {{ (isset($student) && ($student->gender =='f') || old('gender')) ? 'checked' :""}} name="gender">Female
                                            </label>
	                                    </div>
	                                    @if($errors->has('gender'))
	                          				<p class="alert alert-danger">{{ $errors->first('gender') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
	                                    @endif
	                                </div>
	                            </div>
                            </div>

                            <div class="row"> 
                            	<div class="col-md-6">
                            		<a class="btn btn-danger btn-fill pull-right" href="{{ route('student.index') }}">Cancel</a>
                            	</div>
                            	<!-- <div class="col-md-4">
                            		<button class="btn btn-warning btn-fill center-block">Clear</button>
                            	</div> -->
                            	<div class="col-md-6">
	                        		<button type="submit" class="btn btn-primary pull-left btn-fill">{{isset($student) ? 'Update' : 'Create'}}</button>
                            	</div>
                            </div>
	                        <div class="clearfix"></div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

@endsection