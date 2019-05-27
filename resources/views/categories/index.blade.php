@extends('layouts.admin')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Category Name</td>
          <td>Description</td>
          <td>Status</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        <a href="{{ route('categories.create')}}" class="btn btn-primary">Add</a>
        <a href="/" class="btn btn-danger">Go Back</a>
        @foreach($categories as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->status}}</td>
            <td><a href="{{ route('categories.edit',$item->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('categories.destroy', $item->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection