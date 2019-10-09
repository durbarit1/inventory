@extends('layouts.app')
@section('content')

<!-- content wrpper -->
<div class="content_wrapper">
  <!--middle content wrapper-->
  <!-- page content -->
  <div class="middle_content_wrapper">
    <section class="page_content">
      <!-- panel -->

      <!-- panel -->
 

      <div class="panel mb-0">


        <div class="panel_header">

          <div class="panel_title">
            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>data table with search box</span>
          </div>
        </div>
        <div class="panel_body">

          <div class="table-responsive">
            <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
              <thead>
                <tr>
                  <th>SL No.</th>
                  <th>Employee Name</th>                                    
                  <th>Phone</th>
                  <th>NID</th>
                  <th>Age</th>                 
                  <th>Education</th>
                   <th>Designation</th>
                  <th>Salary</th>
                  <th>Marital Status</th>
                  <th>Photo</th>
                  <th>Per</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($employee as $emp)
                <tr>
                 <td>{{$loop->index + 1}}</td>
                 <td>{{$emp->emp_name}}</td>
                  
                  <td>{{$emp->phone}}</td>
                   <td>{{$emp->nid}}</td>
                  
                  <td>{{$emp->age}}</td>
                  <td>{{$emp->education}}</td> 
                   <td>{{$emp->deg_name}}</td>
                    <td>{{$emp->salary}}</td>          
                  
                  <td>
                    @if($emp->marital_status==1)                    
                        Yes                  
                    @else
                        NO               
                    @endif
                    
                  </td>
                  <td><img src="{!! asset('public/images/employee/'.$emp->image) !!}" width="100" > </td>
                  <td>{{$emp->per_day}}</td>
                  
                  <td>
                    <div class="btn-group" role="group">
                      <a href="{{url('/delete/employee/'.$emp->id)}}" id="delete"  class="btn btn-sm btn-danger">Delete</a>
                      <a href="{{-- {{url('/edit/employee/'.$emp->id)}} --}}" class="btn btn-sm btn-primary">Edit</a>
                    </div>
                  </td>
                </tr>
                @endforeach
         
              </tbody>
            </table>

          </div>
          </div> <!--/ panel body -->
          </div><!--/ panel -->
        </section>
        <!--/ page content -->
        <!-- start code here... -->

        </div><!--/middle content wrapper-->
        </div><!--/ content wrapper -->




















@endsection
