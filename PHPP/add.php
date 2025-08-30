<?php 
include "config.php";
include "header.php";

if(isset($_POST['name']) && isset($_POST['type']) && isset($_POST['price'])) {
  $sql="INSERT INTO medicines (name, type, price) VALUES(:name, :type, :price)";
  $stmt=$pdo->prepare($sql);
  $name=$_POST['name'];
  $type=$_POST['type'];
  $price=$_POST['price'];
  $stmt->execute([
    ':name'=>$name,
    ':type'=>$type,
    ':price'=>$price
  ]);
  header("Location: liste.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add a medicines</title>
<style>
      body{
        background-image:url(logo_make_11_06_2023_304.jpg); 
        /* /* backdrop-filter:blur(10px);
      -wekbit-backdrop-filter:blur(10px); */
      width:100%; */
        height: 677px;
        background-size: cover;
        backgrounf-repeat:no-repeat;
        background-position:center;
        font-family: sans-serif; 
      }
      h1 { 
        color: #f6fbfdff; 
      }    
    form {
      background:rgba(180, 202, 234, 0.65);
      border: 1px solid  #265c8cff;
      border-radius:12px;
      padding: 60px;
      width: 600px;
      box-shadow: 0 4px 12px  #3e74c0ff;
      position: relative;
      left:400px;
      color:white;
    }
    input[type="text"],
    input[type="email"] {
      width: 600px;
      padding: 8px;
      margin: 6px 0;
      outline:none;
      border-radius: 12px;
      padding: 0.5rem;
      border: 2px solid  #f1f1f1;
    
    }

    
    input[type="text"]:hover{
        border: 2px solid  #265c8cff;
        box-shadow: 0 2px 8px #265c8cff;
    }

      input[type="submit"]{
      padding: 10px 20px;
      background-color: #116693ff;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 15px;
    }

  </style>
</head>
<body>

<h1>Add new Medicine :</h1>

    <form action="add.php" method="post">

      <label for="name">Medicine Name : </label><br><br>
      <input type="text" name="name" ><br><br>

      <label for="type">Medicine Type : </label><br><br>
      <input type="text" name="type"><br><br>

      <label for="price"> Medicine Price : </label><br><br>
      <input type="text" name="price"><br><br>

      <input type="submit" value="Send">

    </form>

</body>
</html>