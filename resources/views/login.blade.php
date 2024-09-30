<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-5">
            <div class="card">
              <div class="card-header text-center">
                <h3>Login</h3>
                @if (session()->has('failed'))
                <p style="color: red">{{session('failed')}}</p>
                @endif
              </div>
              <div class="card-body">
                <form action="login" method="POST">
                    @csrf
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" value="{{old('email')}}" name="email" class="form-control" id="email" placeholder="Enter your email">
                    @error('email')
                        <p style="color: red">{{$message}}</p>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                    @error('password')
                        <p style="color: red">{{$message}}</p>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
              </div>
              <div class="card-footer text-center">
                {{-- <small><a href="#">Forgot Password?</a></small><br> --}}
                <small>Don't have an account? <a href="/register">Register here</a></small>
              </div>
            </div>
          </div>
        </div>
      </div>    
</x-layout>