<?php
session_start();
include 'config.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE  email=? AND password=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email, $password]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];
        header("Location: liste.php");
        exit();
    } else {
        echo "<p style='color:red;'>Email or password incorrect.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      background: #ffffffff;
      font-family: Arial, sans-serif;
      overflow:hidden;
    }
    .containe {
      
      display:grid;
      align-items: center;
      justify-items: center; 
      width:700px;
      height: 600px;
      margin-right:780px;
      margin-top:30px;
      overflow:hidden; 
      z-index: 1;   
    } 

    .containe:before{
      content:"";
      position:absolute;
      width:2000px;
      height:1555px;
      background: linear-gradient(90deg, rgba(31, 152, 186, 0.94) 5%, rgba(171, 194, 202, 1) 100%);
      border-radius:22% 36% 15% 100% / 37% 15% 24% 47% ;
      /* border-radius:35% 66% 76% 16% / 54% 24% 73% 45% ; */
      top:-10%;
      left:48%;
      transform:translateY(-45%);
      
    }
    

    
    form {
      padding: 40px;
    }

      .info{
      position:absolute;
      margin-left:1550px;
      margin-bottom:450px;
      width:650px;
    }
    button{
      padding: 12px;
      background-color: #1a6083ff;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 10px;
      width: 200px;
      font-size: 1rem;
      font-weight: bold;
      margin-left:200px;
    }
    h2{
      color:white;
      margin-left:250px; 
      
    }
    p{
      color:white;
      text-align:center;
      font-size:15px;
    }
    .meed{
      position: absolute;
      width:500px;
      margin-left:1000px;
      margin-top:350px;
      
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 400px;
      padding: 12px;
      margin: 15px 0;
      outline: none;
      border:none;
      border-bottom: 1px solid #ccc;
      font-size: 1rem;
    }

    input[type="submit"] {
      padding: 12px;
      background-color: #74b7d8;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 10px;
      width: 100%;
      font-size: 1rem;
      font-weight: bold;
    }
    h1 {
      color: #5aa1c2;
      text-align: center;
    }
 
    input[type="submit"]:hover {
      background-color: #5aa1c2;
    }

  </style>
</head>
<body > 
  <div class="containe">
        <div class="info"> 
      <h2>New here ?</h2>
      <p>
        Create an account today to unlock all features! By signing up, you’ll be able to
    personalize your profile, save your preferences, and enjoy a seamless experience
    every time you visit.
  </p>
      <a href="addUser.php"><button>  Sing up</button></a>
    </div>
    <img class="meed" src="undraw_medical-care_7m9g.svg" alt="">
    <form action="" method="post">
      <h1>Welcome Patient</h1>
      <label>Email :</label><br>
      <input type="email" name="email" required><br>
      <label>Password :</label><br>
      <input type="password" name="password" required><br>
      <input type="submit" value="Sign In">
    </form>
  </div>
</body>
</html>