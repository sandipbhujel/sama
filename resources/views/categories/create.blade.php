@extends('layouts.admin')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Category
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="name">Category Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="description">Description :</label>
              <input type="text" class="form-control" name="description"/>
          </div>

          <div class="form-group">
              <label for="filepath">Category Image :</label>
              <input type="file" class="form-control" name="filepath"/>
          </div>
          <div class="form-group">
              <label for="status">Status:</label>
              <input type="radio" name="status" value = '1' checked/>Active
              <input type="radio" name="status" value = '0' />Deactive
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection