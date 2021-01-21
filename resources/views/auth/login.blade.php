@extends('layouts.main')



@section('contents')

  <div class="container">
    <div class="col-6 offset-3 login">
      <h3>lOGIN</h3>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        @error('email')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ $message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        <label for="username">Enter your Email</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
            </div>
            <input type="text" name="email" placeholder="Email" class="form-control" value="{{ old('username') }}">             
        </div>
     
        <label>Enter your Password</label>
        <div class="input-group mb-3">                
                <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                      <input type="password" name="password" placeholder="*******" class="form-control">            
                                          
        </div>
          <div class="form-group row">
                            <div class="col-md-6 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
<button type="submit" name="submit" class="btn btn-md btn-info mr-auto">Login</button> 
<label>Forget Password? Click <a href="{{ route('password.request') }}">here</a></label>


    </form>
    </div>
</div>

@endsection