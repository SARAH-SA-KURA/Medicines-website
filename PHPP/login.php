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
      background: #f5f7fb;
      font-family: Arial, sans-serif;
    }
    .containe {
      display: grid;
      grid-template-columns: repeat(2,1fr);
      align-items: center;
      justify-items: center;
      
    }
    .doctor {
      width:970px;
      /* height: auto; */
      border-radius: 12px;
      height: 677px;
    }
    form {
      /* background: rgba(255,255,255,0.9);
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(90,161,194,0.3); */
      /* position: relative;
      top:50px; */
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 400px;
      padding: 12px;
      margin: 20px 0;
      outline: none;
      border-radius: 8px;
      border: 2px solid #ccc;
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
    input:hover {
      background-color: #f1f1f1;
    }
    input[type="submit"]:hover {
      background-color: #5aa1c2;
    }
    p{
      text-align: center;
    }
    p a{
      text-decoration:none;
      color:#74b7d8;
    }
    p a:hover{
      color:#5aa1c2;
    }
  </style>
</head>
<body>
  <div class="containe">
    <img class="doctor" src="doctor.jpg" alt="Doctor image">

    
    <form action="" method="post">
      <h1>Welcome Patient</h1>
      <label>Email :</label><br>
      <input type="email" name="email" required><br>
      <label>Password :</label><br>
      <input type="password" name="password" required><br>
      <input type="submit" value="Sign In">
      <p>Don't have an account ? <a href="addUser.php">  Create one</a></p>
    </form>
    
  </div>
</body>
</html>