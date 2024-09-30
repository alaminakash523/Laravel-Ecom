<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header text-center">
                <h3>Register</h3>
              </div>
              <div class="card-body">
                <form action="/register" method="POST">
                    @csrf
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                  </div>
                  <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="confirm-password" placeholder="Confirm your password" required>
                  </div>
                  <div class="form-group">
                    <label for="profile-image">Profile Image</label>
                    <input type="file" name="avater" class="form-control-file" id="profile-image" accept="image/*">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>
              </div>
              <div class="card-footer text-center">
                <small>Already have an account? <a href="/login">Login here</a></small>
              </div>
            </div>
          </div>
        </div>
      </div>
</x-layout>