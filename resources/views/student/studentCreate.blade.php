@extends('layout.template')

@section('body')
<div class="content">
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="card">
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
	                                    <input id="name" name="name" type="text" class="form-control" placeholder="Username" value="{{ isset($student)? $student->name: ""}}">
	                                </div>
	                            </div>
                            </div>

                            <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group">
	                                    <label for="name">Email address</label>
	                                    <input id="email" name="email" type="email" class="form-control" placeholder="Email" value="{{ isset($student)? $student->email: ""}}">
	                                </div>
	                            </div>
                            </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group">
	                                    <label>Address</label>
	                                    <input id="address" name="address" type="text" class="form-control" placeholder="Home Address" value="{{ isset($student)? $student->address: ""}}">
	                                </div>
	                            </div>
	                        </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group">
	                                    <label>Date of Birth</label>
	                                    <input id="dob" name="dob" type="text" class="form-control" placeholder="DOB" value="{{ isset($student)? $student->dob: ""}}">
	                                </div>
	                            </div>
                            </div>

                            <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group">
	                                    <label>Gender</label>
	                                    <div>
                                        	<label class="radio-inline">
                                                <input type="radio" value="m" name="gender" {{ isset($student) && ($student->gender =='m') ? 'checked' :""}}>Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" value="f" {{ isset($student) && ($student->gender =='f') ? 'checked' :""}} name="gender">Female
                                            </label>
	                                    </div>
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