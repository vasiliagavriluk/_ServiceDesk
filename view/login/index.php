<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Авторизация | ServiceDesk</title>

    
    <!-- Theme style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!--    <script src="template/js/jquery.min.js"></script>-->
    <script src="js/notify.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
<style>
.form-signin 
{
  max-width: 400px;
  padding: 19px 29px 29px;
          padding-top: 40px;
  margin: 200px auto 0px auto;
  background-color: #fff;
  border: 1px solid #e5e5e5;
  -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
          border-radius: 5px;
  -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
     -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
          box-shadow: 0 1px 2px rgba(0,0,0,.05);
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin input[type="text"],
.form-signin input[type="password"] 
{
  font-size: 16px;
  height: auto;
  margin-bottom: 15px;
  padding: 7px 9px;
}
	  
.form-signin-heading
{
    margin-top: 10px;
}
	
.fon{
    background-color: #fff;
	
    -moz-background-size: 100%; /* Firefox 3.6+ */
    -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
    -o-background-size: 100%; /* Opera 9.6+ */
    background-size: 100%; /* Современные браузеры */
	}
.login-logo
{ 
    color: #fff; font-family: 'oD7s698j';
}

.has-feedback
{
    padding: 0px 0px 15px 0px;
}
</style>
	
</head>

<body class="form-signin fon">
<div class="login-box">
  <div class="login-logo">
      <b><img src="<?php echo(LOGO); ?>" width="320" height="102"></b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
      <p class="form-signin-heading"><div id="error">Авторизуйтесь, чтобы начать сеанс</div></p>

      <div class="form-group has-feedback">
        <input id="login" type="login" class="form-control" placeholder="Имя пользователя">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control" placeholder="Пароль">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	  
	  
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
            <input type="submit" id="submit"  class="btn btn-primary btn-block btn-flat" value="Вход">
        </div>
        <!-- /.col -->
      </div>

    <!-- /.social-auth-links -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script>
  $(function () 
    { 
        $("#submit").click(function(e)
        {
            e.preventDefault();
            
            if($('#login').val() === '' || $('#password').val() === '')
            {
                $.notify('Логин или пароль не заполнены','error');
                return false;
            }            

            $.post( "login/aut", 
                {  
                    'login' : $('#login').val(), 
                    'password' : $('#password').val() 
                }, function(data)
                {    
                    var json = $.parseJSON(data);                    
                    switch (json.Error) 
                    {
                        case 'true':
                          $.notify(json.Text,'error');
                          break;
                        case 'false':
                          location.replace(json.Text);
                          break;
                    }
                });
        });

    });
</script>







</body>
</html>
