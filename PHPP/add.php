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

      body {
          font-family: Arial, sans-serif;
          background-color: #0e85ee17; 
          width:40%;
        }
      h1 { 
        color: #265c8cff; 
      }    
    form {
      background: white;
      width: 900px;
      padding: 30px;
      border-radius: 10% 50%;
      box-shadow: 0px 8px 20px rgba(0,0,0,0.1);
      text-align: center;
      margin-top:90px;
      margin-left:300px;
    }
    input[type="text"],
    input[type="email"] {
      width: 600px;
      padding: 8px;
      margin: 6px 0;
      outline:none;
      border-radius: 12px;
      padding: 0.5rem;
      border: 2px solid  #0e85ee26;
    
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
    input::placeholder{
      color: #265c8cff
    }
  </style>
</head>
<body>



    <form action="add.php" method="post">

    <h1>Add new Medicine :</h1>

      <label for="name"> </label><br><br>
      <input type="text" name="name" placeholder="Medicine Name*"><br><br>

      <label for="type"> </label><br><br>
      <input type="text" name="type" placeholder="Medicine Type*"><br><br>

      <label for="price">  </label><br><br>
      <input type="text" name="price" placeholder="Medicine Price*"><br><br>

      <input type="submit" value="Send">

    </form>

</body>
</html>