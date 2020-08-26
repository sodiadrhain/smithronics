@extends('master-admin')
@section('title', 'All roles')
@section('content')
<br>
        <h3 class="agileinfo_sign">All Roles</h3>
@if(session('status'))
<div class="alert alert-success">
{{  session('status') }}
</div>
@endif
@if ($roles->isEmpty())
<p> <center><b>There is no role.<br><br></b></center></p>
@else
<table class="table">
<thead>
  <tr>
    <th>Name</th>
    <th>Display Name</th>
    <th>Description</th>
  </tr>
</thead>
<tbody>
  @foreach($roles as $role)
  <tr>
    <td>{!! $role->name !!}</td>
    <td>{!! $role->display_name !!}</td>
    <td>{!! $role->description !!}</td>
  </tr>
  @endforeach
</tbody>
</table>
@endif

@endsection
