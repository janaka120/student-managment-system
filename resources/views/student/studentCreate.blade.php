@extends('layout.template')

@section('body')
<div class="content">
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="card">
	                <div class="header">
	                    <h4 class="title">Create Student</h4>
	                </div>
	                <div class="content">
	                    <form method="POST" action="{{ isset($student) ? route('student.update', $student->id) : route('student.store') }}">
	                    	{{ csrf_field() }}
	                    	<input type="hidden" name="_method" value="{{ $student && $student->id? 'PUT': 'POST'}}" />
							<div class="row">	                    	
	                            <div class="col-md-12">
	                                <div class="form-group">
	                                    <label>Full Name</label>
	                                    <input id="name" name="name" type="text" class="form-control" placeholder="Username" value="{{ $student && $student->id? $student->name: ""}}">
	                                </div>
	                            </div>
                            </div>

                            <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group">
	                                    <label for="name">Email address</label>
	                                    <input id="email" name="email" type="email" class="form-control" placeholder="Email" value="{{ $student && $student->id? $student->email: ""}}">
	                                </div>
	                            </div>
                            </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group">
	                                    <label>Address</label>
	                                    <input id="address" name="address" type="text" class="form-control" placeholder="Home Address" value="{{ $student && $student->id? $student->address: ""}}">
	                                </div>
	                            </div>
	                        </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group">
	                                    <label>Date of Birth</label>
	                                    <input id="dob" name="dob" type="text" class="form-control" placeholder="DOB" value="{{ $student && $student->id? $student->dob: ""}}">
	                                </div>
	                            </div>
                            </div>

                            <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group">
	                                    <label>Gender</label>
	                                    <div>
                                        	<label class="radio-inline">
                                                <input type="radio" value="m" name="gender" {{ $student && $student->id && ($student->gender =='m') ? 'checked' :""}}>Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" value="f" {{ $student && $student->id && ($student->gender =='f') ? 'checked' :""}} name="gender">Female
                                            </label>
	                                    </div>
	                                </div>
	                            </div>
                            </div>

                            <div class="row"> 
                            	<div class="col-md-6">
                            		<a class="btn btn-danger btn-fill pull-right" href="/student">Cancel</a>
                            	</div>
                            	<!-- <div class="col-md-4">
                            		<button class="btn btn-warning btn-fill center-block">Clear</button>
                            	</div> -->
                            	<div class="col-md-6">
	                        		<button type="submit" class="btn btn-primary pull-left btn-fill">Create</button>
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