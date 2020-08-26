@extends('master-admin')
@section('title', 'All Categories')
@section('content')
<br>
        <h3 class="agileinfo_sign">All Categories</h3>
  @if(session('status'))
<div class="alert alert-success">
  {{  session('status') }}
</div>
@endif
@if ($categories->isEmpty())
<p> There is no category.</p>
@else
<table class="table">
  <thead>
    <tr>
      <th>Category Name</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
    <tr>
      <td><a href="/{{$category->slug}}">{!! $category->name !!}</a>
        </td>

    </tr>
    @endforeach
  </tbody>
</table>
@endif
@endsection
