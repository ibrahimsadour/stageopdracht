@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center"> Data </h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
   <a href="{{route('student.create')}}" class="btn btn-primary">Toevoegen</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>Titel</th>
    <th>Prioriteit</th>
    <th>Status</th>
    <th>Bewerken</th>
    <th>Status bewerekn</th>
   </tr>
   @foreach($students as $row)
   <tr>
    <td>{{$row['titel']}}</td>
    <td>{{$row['prioriteit']}}</td>
    <td>{{$row['status']}}</td>
    <td><a href="{{action('StudentController@edit', $row['id'])}}" class="btn btn-warning">Bewerken</a></td>
    <td>
     <form method="post" class="delete_form" action="{{action('StudentController@destroy', $row['id'])}}">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-success">Afronden</button>
     </form>
    </td>
   </tr>
   @endforeach
  </table>
 </div>
</div>
<script>
$(document).ready(function(){
 $('.delete_form').on('submit', function(){
  if(confirm("Are you sure you want to complete it?"))
  {
   return true;
  }
  else
  {
   return false;
  }
 });
});
</script>
@endsection