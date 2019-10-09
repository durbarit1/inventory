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
      <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
          Add Category
          </button>


                     <!-- Modal -->
<div class="modal fade mt-4" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:40px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="{{ url('insert/category') }}" method="post">
            @csrf
             <div class="form-group">
               <label class="font-weight-bold" >Category Name</label>
               <input type="text" class="form-control @error('category_name') is-invalid @enderror "  placeholder="Enter your category name" name="category_name" value="{{old('category_name')}}">
                  @error('category_name')
                     <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                  @enderror
             </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>


    </div>
  </div>
</div>












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
                  <th>Category Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $cat)
                <tr>
                  <td>{{$loop->index + 1 }}</td>
                  <td>{{$cat->category_name}}</td>
                  <td>
                    <div class="btn-group" role="group">
                      <a href="{{url('delete/category')}}/{{$cat->id}}" id="delete"  class="btn btn-sm btn-danger">Delete</a>
                      {{-- <a href="{{url('edit/category')}}/{{$cat->id}}" class="btn btn-sm btn-primary">Edit</a> --}}
                      <a href="{{url('edit/category/'.$cat->id)}}" class="btn btn-sm btn-primary">Edit</a>
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
