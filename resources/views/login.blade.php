<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href{{asset('favicon.ico')}}">

    <title>Signin PRODESKEL BATANG HARI</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/signin.css')}}" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <center>
        <img src="{{asset('images/batanghari.png')}}" height="120px"> <br>
        <br>
        <h3>Sistem Informasi Profil Desa <br>Pemerintah Kab. Batang Hari </h3>
      </center>
      <center style="margin-top: 40px !important;">
        <p> Silahkan Login Dengan Akun Anda!</p>
      </center>
      <form class="form-signin" action="{{URL::to('submit-login')}}" method="post">
      {{csrf_field()}}
        <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
        <hr>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <hr>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      </form>

      

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>
