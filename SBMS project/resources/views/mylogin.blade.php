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
    <title>Log In Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form">
            <h2 class="title">School Log In</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock" ></i>
              <input type="password" placeholder="Password" />
            </div>
            <input type="submit" value="Log In" class="btn solid" />
            <input type="submit" value="Back To Website" class="btn solid w-100%" />
          </form>
          <form action="#" class="sign-up-form">
            <h2 class="title">Admin Log In</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <input type="submit" class="btn" value="Log In" />
            <a href="/back"><input type="submit" value="Back To Website" class="btn solid w-100%" /> </a>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Are You an Admin?</h3>
            <p>
              Click the Button below, go to Admin Login
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Admin Login
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>School, Login Here</h3>
            <p>
              Click Here to go to school login
            </p>
            <button class="btn transparent" id="sign-in-btn">
              School Login
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="js/app.js"></script>
  </body>
</html>
