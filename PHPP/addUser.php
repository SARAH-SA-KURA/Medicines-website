<?php 
include 'config.php';

if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['password']) ){
  $email=$_POST['email'];
  $name=$_POST['name'];
  $password=$_POST['password'];


  $sql="INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
  $stmt=$pdo->prepare($sql);
  $stmt->execute([$name, $email, $password]);
        header("Location: login.php");
        exit();

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
      width:200px;
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
      margin-left:780px;
      margin-top:30px;
      overflow:hidden; 
      z-index: 1; 
    } 

    .containe:before{
      content:"";
      position:absolute;
      width:2000px;
      height:1555px;
      background: linear-gradient(90deg, rgba(153, 193, 204, 1) 2%, rgba(61, 175, 217, 1) 100%);
      border-radius:34% 64% 77% 26% / 73% 54% 45% 19%;
      top:-10%;
      right:48%;
      transform:translateY(-45%);
    }

    .info{
      position:absolute;
      margin-right:1500px;
      margin-bottom:450px;
      width:700px;
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
      margin-left:230px;
    }
    h2{
      color:white;
      text-align:center;
    }
    p{
      color:white;
      text-align:center;
      font-size:15px;
    }
    .meed{
      position: absolute;
      width:500px;
      margin-right:1000px;
      margin-top:350px;
      
    }

    form {
      padding: 40px;
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





@media (min-width: 768px) and (max-width: 1025px) {
      body {
      width:380px;
      background: #ffffffff;
      font-family: Arial, sans-serif;
      overflow:hidden; 
    }
  .containe {
    width: 90%;
    height: auto;
    padding: 20px;
    margin-left:380px;
  }

  form {
    padding: 10px;
    width: 100%;
  }

  input[type="text"],
  input[type="email"],
  input[type="password"] {
    width: 300px;          
    font-size: 5px;
    
  }
  label{
    font-size:13px;
  }

  input[type="submit"] {
    font-size: 1rem;
    padding: 10px;
  }

  h1 {
    font-size: 20px;  
  }

  .meed {
    width: 380px;       
    margin: 20px auto;
    margin-right:500px;
    margin-top:590px;
  }
}

@media (max-width: 480px) {

}

  </style>

</head>
<body >

  <div class="containe">
    <div class="info"> 
      <h2>One of us ?</h1>
      <p>If you already have an account with us, you can sign in to access all your personalized features, manage your profile, and continue where you left off. Logging in ensures a faster and smoother experience, so don’t forget to use your existing credentials to get started.</p>
      <a href="login.php"><button>  Sing in</button></a>
    </div>
    <img class="meed" src="undraw_medicine_hqqg.svg" alt="">
    <form action="" method="post">
      <h1>Welcome Patient </h1>
    <label for="">Patient Username : </label><br>
    <input type="text" name="name"><br>
    <label for="">Patient Email :</label><br>
    <input type="email" name="email"><br>
    <label for="">Patient Password :</label><br>
    <input type="password" name="password"><br><br>
    <input type="submit" value="Sing Up">
    
  </form>
  
</div>
</body>
</html>