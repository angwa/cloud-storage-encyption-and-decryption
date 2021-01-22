@extends('layouts.main')



@section('contents')

  <div class="container">
    <div class="col-12 login" style="margin-top:-30px">
 <div class="row">
    <div class="col-md-3">

        <ul class="list-group">
          <li class="list-group-item active">Dashboard</a></li>
           <li class="list-group-item"><a href="{{route('upload')}}">Upload File <i class="fa fa-upload"></i></a></li>
          <li class="list-group-item"><a href="{{route('view')}}">View Files</a></li>
          <li class="list-group-item">Download File</li>
          <li class="list-group-item">Update Profile</li>
        </ul>
    </div>
    <div class="col-md-9">
        <h4>{{Auth::user()->name}}</h4>
        <hr>
        <h5>My Documents</h5>
             @if(session()->has('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">{{session()->get('msg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            @endif 
        <table class="table table-striped table-bordered table-hovered" id="exportTable">
            <thead>
            <tr>
                <th>#</th>
                <th>File Name</th>
                <th>Uploaded Time</th>
                <th>Type</th>
                <th>Action</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $key => $data)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->created_at->diffForHumans()}}</td>
                <td>{{$data->type}}</td>
                <td>
                    <form action="{{route('delete',['id' => $data->id])}}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-sm btn-danger">Delete <i class="fa fa-trash"> </i></button>
                    </form>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-success">Decrypt <i class="fa fa-download"></i></a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
 </div>
    </div>
</div>

@endsection