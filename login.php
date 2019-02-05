<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
* {
  box-sizing: border-box;
}

/*Achtergrond*/
.bg-image {
  background-image: url("duckies.png");
  filter: blur(2px);
  -webkit-filter: blur(8px);
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/*Login blokje*/
.bg-text {
  background-color:rgba(255,255,255,0.6);
  color:  black;
  font-weight: bold;
  position: absolute;
  align-content: flex-start;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 3;
  width: 360px;
  padding: 82px 18px;
  border-radius: 30px;
}

/*Logo*/
.bg-logo{
  position: absolute;
  top: 5%;
  left: 5%;
  margin-top: -50px;
  margin-left: -50px;
}

/*Register-login button*/
.button1{
background-color: #b37dc9;
width: 150px;
height: 30px;
border-radius: 20px;
font-family: impact;
font-size: 1.2em;
border: 0px solid;
box-shadow: 0 4px #999;
}


.button1:hover {background-color: #a774bc}
.button1:active{
  box-shadow: 0 0px #666;
  transform: translateY(3px);
}
/*login text font*/
.login-text {
  top: 10px;
  font-family: impact;
  font-size: 1.9em;
  text-align: left;
}

/*Text box login*/
.text_box{
  background-color: #ffffff;
  width: 150px;
  height: 30px;
  border-radius: 20px;
  font-family: impact;
  font-size: 1.2em;
  border: 0px solid;
  padding: 5px;

}
      </style>
    </head>
    <body>
      <div class="bg-image"></div>
      <div class="bg-logo">
        <img class="logo" src="logo.png">
      </div>
      <div class="bg-text">
        <div class="login-text">Login</div>
        <form action="login.php">
            Username: <input type="text" name="Username" class="text_box" value="" maxlength="20" placeholder="Username...">
            <br>
            <br>
            Password: <input type="password" name="Password" class="text_box" value="" maxlength="20" placeholder="Password...">
            <br>
            <br>
            <a href="register.php">Forgot password?</a>
            <br>
            <br>
            <input type="submit" value="Submit" class="button1" onmouseover="" style="cursor: pointer;" onclick="window.location.href='homepage.html'" >
            <br>
            <br>
            <input onclick="window.location.href='register.php'" type="button" value="register" class="button1" onmouseover="" style="cursor: pointer;">
            
        </form>
          </div>
        </body>
</html>
<?php 

$db = mysqli_connect('localhost', 'root', '', 'website');
function Login()

{

    if(empty($_POST['username']))

 {

        $this->HandleError("UserName is empty!");

        return false;

    }

     
    if(empty($_POST['password']))

    {

        $this->HandleError("Password is empty!");

        return false;

    }

 

    $username = trim($_POST['username']);

    $password = trim($_POST['password']);
 

    if(!$this->CheckLoginInDB($username,$password))

    {

        return false;

    }

     

    session_start();


    $_SESSION[$this->GetLoginSessionVar()] = $username;

     

    return true;

}

?>