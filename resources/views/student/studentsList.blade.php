@extends('layout.template')

@section('body')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
            		<div class="header list-group pull-right">
            			 <a class="list-group-item" href="/student/create"><i class="fa fa-user fa-fw fa-1x" aria-hidden="true"></i>&nbsp; Create User</a>
            		</div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover">
                            <thead>
                                <th>REg. No.</th>
                            	<th>Name</th>
                            	<th>Email</th>
                            	<th>Address</th>
                            	<th>DOB</th>
                            	<th>Gender</th>
                            </thead>
                            <tbody>
					        	@foreach ($students as $student)
					                <tr>
					                	<td>{{ $student->id }}</td>
					                	<td>{{ $student->name }}</td>
					                	<td>{{ $student->email }}</td>
					                	<td>{{ $student->address }}</td>
					                	<td>{{ $student->dob }}</td>
					                	<td>{{ $student->gender }}</td>
					                	<td class="td-actions text-right">
                                            <a rel="tooltip" title="Edit" class="btn btn-info btn-simple btn-xs" href={{ URL::route('student.edit', ['id' => $student->id]) }}>
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs" href={{ URL::route('student.delete', ['id' => $student->id]) }}>
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
					                </tr>
								@endforeach
					        </tbody>
                            <tbody>
					        	
					        </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection