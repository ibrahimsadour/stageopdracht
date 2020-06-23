@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3>Edit Record</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('StudentController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <input type="text" name="titel" class="form-control" value="{{$student->titel}}" placeholder="Enter titel" />
   </div>
   <div class="form-group">
    <input type="text" name="prioriteit" class="form-control" value="{{$student->prioriteit}}" placeholder="Enter prioriteit" />
   </div>
   <div class="form-group">
    <input type="text" name="status" class="form-control" value="{{$student->status}}" placeholder="Enter status" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>

@endsection