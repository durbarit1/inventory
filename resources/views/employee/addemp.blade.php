@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>
<!-- content wrpper -->
<div class="content_wrapper">
	<!--middle content wrapper-->
	<!-- page content -->
	<div class="middle_content_wrapper">
		<section class="page_content">
			<div class="panel mb-0">
				<div class="panel_header">
					<div class="panel_title">
						<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Add Employee</span>
					</div>
				</div>
				<div class="panel_body">
					<div class="row">
						<div class="col-md-10 col-xs-12 offset-1">
							<div >
								<div class="card">
									<h5 class="card-header">Employee Form</h5>
									<div class="card-body">
										@if ($errors->all())
										<div class="alert alert-danger">
											@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
											@endforeach
										</div>
										@endif
										<form action="{{ url('/insert/employee') }}" enctype="multipart/form-data" method="post">
											@csrf
											<div class="form-row">
												<div class="col-md-4 col-xs-12">
													<div class="form-group">
														<label>Employee Name</label>
														<input type="text" class="form-control"  name="emp_name" value="">
													</div>
												</div>
												<div class="col-md-4 ccol-xs-12">
													<div class="form-group">
														<label>Present Address</label>
														<input type="text" class="form-control" name="presentaddress" value="">
													</div>
												</div>
												<div class="col-md-4 col-xs-12">
													<div class="form-group">
														<label>Permanent Address</label>
														<input type="text" class="form-control"  name="permanentaddress" value="">
													</div>
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-4 col-xs-12">
													<div class="form-group">
														<label>Phone</label>
														<input type="text" class="form-control"  name="phone" value="">
													</div>
												</div>
												<div class="col-md-4 col-xs-12">
													
													<div class="form-group">
														<label>NID</label>
														<input type="text" class="form-control"  name="nid" value="">
													</div>
												</div>
												<div class="col-md-4 col-xs-12">
													<div class="form-group">
														<label>Email</label>
														<input type="text" class="form-control"  name="email" value="">
													</div>
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-4 col-xs-12">
													<div class="form-group">
														<label>Age</label>
														<input type="text" class="form-control"  name="age" value="">
													</div>
												</div>
												<div class="col-md-4 col-xs-12">
													<div class="form-group">
														<label>Salary</label>
														<input type="number" class="form-control"  name="salary" value="" id="salary" onkeyup="sum();">
													</div>
												</div>
												<div class="col-md-4 col-xs-12">
													<div class="form-group">
														<label>Designation</label>
														<select class="form-control"  name="deg_id">
															<option selected>Select</option>
															@foreach($desg as $deg)
															<option value="{{$deg->id}}">{{$deg->deg_name}}</option>
															@endforeach
															
														</select>
													</div>
												</div>
											</div>
											
											<div class="form-row">
												<div class="col-md-4 col-xs-12">
													<div class="form-group">
														<label>Education</label>
														<input type="text" class="form-control"  name="education" value="">
													</div>
												</div>
												<div class="col-md-4 col-xs-12">
													<div class="form-group">
														<label>Marital Status</label>
														<select class="form-control"  name="marital_status">
															<option selected>Select</option>
															<option value="1">Yes</option>
															<option value="2">No</option>
															
														</select>
													</div>
												</div>
												<div class="col-md-4 col-xs-12">
													<div class="form-group">
														<label>Per Day</label>
														<input type="number" class="form-control"  name="per_day"  id="perday" readonly >
													</div>
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-6 col-xs-12">
													<div class="form-group">
														<label>Upload Photo</label>
														<input type="file" class="form-control"  name="image" >
													</div>
												</div>
												<div class="col-md-6 col-xs-12">
													
												</div>
												
											</div>
											<button type="submit" class="btn btn-primary">Add Employee</button>
										</form>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
				</div> <!--/ panel body -->
				</div><!--/ panel -->
			</section>
			<!--/ page content -->
			<!-- start code here... -->
			</div><!--/middle content wrapper-->
			</div><!--/ content wrapper -->
			<script type="text/javascript">
				function sum() {
			var salary = document.getElementById('salary').value;
			var result = parseInt(salary) /28;
			if (!isNaN(result)) {
			document.getElementById('perday').value = parseInt(result);
			}
			}
			</script>
			@endsection