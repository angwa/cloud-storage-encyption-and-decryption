@extends('layouts.main')



@section('contents')

  <div class="container">
    <div class="col-12 login" style="margin-top:-30px">
 <div class="row">
    <div class="col-md-4">

        <ul class="list-group">
          <li class="list-group-item active">Dashboard</a></li>
          <li class="list-group-item"><a href="{{route('upload')}}">Upload File <i class="fa fa-upload"></i></a></li>
          <li class="list-group-item"><a href="{{route('view')}}">View Files</a></li>
          <li class="list-group-item">Download File</li>
          <li class="list-group-item">Update Profile</li>
        </ul>
    </div>
    <div class="col-md-8">
        <h4>{{Auth::user()->name}}</h4>
        <hr>
        <h5>Recent Uploads</h5>
        <table class="table table-striped table-bordered table-hovered">
            <tr>
                <th>#</th>
                <th>File Name</th>
                <th>Hash Value</th>
                <th>Type</th>
                <th>Download</th>
            </tr>
            <tr>
                <td>1</td>
                <td>fdkfsd</td>
                <td>jdffhsj</td>
                <td>fjdksf</td>
                <td>fjdksf</td>
            </tr>

            
        </table>
    </div>
 </div>
    </div>
</div>

@endsection