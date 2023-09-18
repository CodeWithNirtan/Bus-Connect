<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/logstyle.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="POST" action="{{ route('login') }}" class="sign-in-form">
          @csrf
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password"/>
            </div>
            <input type="submit" value="{{ __('Login') }}" class="btn solid" id="login-submit-btn"/>
            <input type="submit" href="/" value="Back to Website" class="btn solid">

          </form>
          <form method="POST" action="{{ route('register') }}" class="sign-up-form">
          @csrf
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input placeholder="Name" id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus/>
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
              @enderror
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input placeholder="Email" id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" />
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
              @enderror
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input placeholder="Password" id="password" type="password" class="@error('password') is-invalid @enderror" name="password" autocomplete="new-password" />
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
              @enderror
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input placeholder="Confirm Password" id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <input type="submit" class="btn" value="{{ __('Register') }}" />
            <input type="submit" href="/" value="Back to Website" class="btn solid"/><a href="/"></a>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
        Click the button below
        to register yourself
        and buy plants
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Click the button below to login yourself 
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="js/app.js"></script>
  </body>
</html>
