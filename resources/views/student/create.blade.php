@extends('master')

@section('content')
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 aling="center">Add Data</h3>
  <br />
  @if(count($errors) > 0)
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $error)
    <li>{{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif

  <form method="post" action="{{url('student')}}">
   {{csrf_field()}}

   <div class="form-group">
   <label>Titel : </label>
    <input type="text" name="titel" class="form-control" placeholder="Enter Titel" />
   </div>

   <div class="form-group">
   <label>Prioriteit :</label>
    <select class="form-control" name="prioriteit" >
        <option value="Laag">Laag</option>
        <option value="Normaal">Normaal</option>
        <option value="Hoog">Hoog</option>
    </select>
   </div>

   <div class="form-group">
   <label>Status :</label>
    <select class="form-control" name="status" >
        <option value="Afgerond">Afgerond</option>
        <option value="Niet afgerond">Niet afgerond</option>
    </select>
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
@endsection
