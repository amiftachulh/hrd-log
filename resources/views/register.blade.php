<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Daftar | HRD Log</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ URL::asset('style.css') }}">
</head>
<body>
  <div class="d-flex align-items-center justify-content-center vh-100">
    <div class="register-form" style="background-color: #f7f7f7">
      <form action="{{ route('actionRegister') }}" method="post">
        @csrf
        <!-- Email input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="username">Username</label>
          <input type="text" id="username" name="username" class="form-control" />
        </div>
      
        <!-- Password input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="password">Password</label>
          <input type="password" id="password" name="password" class="form-control" />
        </div>
      
        <!-- Submit button -->
        <div class="text-center">
          <button class="btn btn-primary btn-block mb-4">Daftar</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>