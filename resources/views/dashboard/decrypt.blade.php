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
        <h5>Decrypt File - {{$data->name}}</h5>
         @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">{{$errors->first() }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
        @endif   

         @if(session()->has('not'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">{{session()->get('not') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
        @endif 
         @if(session()->has('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">{{session()->get('msg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
        @endif   
        <form action="{{route('check')}}" method="post">
            @csrf
            <label>Enter File Key</label>
            <input type="text" name="key" class="form-control">
            <input type="hidden" name="file" class="form-control" value="{{$data->id}}">
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
    </div>
 </div>
    </div>
</div>

@endsection