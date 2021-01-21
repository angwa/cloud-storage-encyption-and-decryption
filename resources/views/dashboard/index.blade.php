@extends('layouts.main')



@section('contents')

  <div class="container">
    <div class="col-12 login" style="margin-top:-30px">
 <div class="row">
    <div class="col-md-4">

        <ul class="list-group">
          <li class="list-group-item active">Dashboard</a></li>
          <li class="list-group-item"><a href="jjjjj">Upload File</a></li>
          <li class="list-group-item">View File</li>
          <li class="list-group-item">Download</li>
          <li class="list-group-item">Update Profile</li>
        </ul>
    </div>
    <div class="col-md-8">
        <h4>{{Auth::user()->name}}</h4>
        <hr>
    </div>
 </div>
    </div>
</div>

@endsection