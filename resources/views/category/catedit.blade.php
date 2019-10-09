@extends('layouts.app')
@section('content')




<div class="container mt-3">
  <div class="row">

    <div class="col-10 ">
      <div class="card">
        <div class="card-header bg-primary text-white">
           Update Category
        </div>
        <div class="card-body">

          <form action="{{ url('edit/category/insert') }}" method="post">
            @csrf
             <div class="form-group">
             	 <input type="hidden" name="category_id" value="{{$degedit->id}}">
               <label class="font-weight-bold" >Category Name</label>
               <input type="text" class="form-control" name="category_name" value="{{ $degedit->category_name }} " required="">
             </div>
              <button type="submit" class="btn btn-primary">Update</button>
          </form>


        </div>
      </div>
    </div>
  </div>
</div>


@endsection
