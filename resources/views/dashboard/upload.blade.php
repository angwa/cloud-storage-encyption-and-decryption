@extends('layouts.main')



@section('contents')

  <div class="container">
    <div class="col-12 login" style="margin-top:-30px">
 <div class="row">
    <div class="col-md-4">

        <ul class="list-group">
          <li class="list-group-item active">Dashboard</a></li>
         <li class="list-group-item"><a href="{{route('upload')}}">Upload File <i class="fa fa-upload"></i></a></li>
          <li class="list-group-item">View Files</li>
          <li class="list-group-item">Download File</li>
          <li class="list-group-item">Update Profile</li>
        </ul>
    </div>
    <div class="col-md-8">
        <h4>{{Auth::user()->name}}</h4>
        <hr>
        <h5>Upload Files</h5>

        <form action="{{route('submitF')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label>Input File Name</label>
            <input type="text" name="name" class="form-control">
            <label>Select File</label>
            <input type="file" name="file" class="form-control">
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
    </div>
 </div>
    </div>
</div>

@endsection