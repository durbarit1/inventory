@extends('layouts.app')
@section('content')




<div class="container mt-3">
  <div class="row">

    <div class="col-10 ">
      <div class="card">
        <div class="card-header bg-primary text-white">
           Add Category
        </div>
        <div class="card-body">

          <form action="{{ url('insert/category') }}" method="post">
            @csrf
             <div class="form-group">
               <label class="font-weight-bold" >Category Name</label>
               <input type="text" class="form-control"  placeholder="Enter your category name" name="category_name" value="">
             </div>
              <button type="submit" class="btn btn-primary">Add Category</button>
          </form>


        </div>
      </div>
    </div>
  </div>
</div>


@endsection
