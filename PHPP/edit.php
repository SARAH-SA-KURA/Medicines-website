<?php 
include 'config.php';
include 'header.php';

$id=$_GET['id'];
$sql="SELECT * FROM medicines WHERE id=?";
$stmt=$pdo->prepare($sql);
$stmt->execute([$id]);
$ligne=$stmt->fetch();

if($_SERVER["REQUEST_METHOD"] === "POST") {
  $sql="UPDATE medicines SET name=:name, type=:type, price=:price WHERE id=:id";
  $stmt=$pdo->prepare($sql);
  $name=$_POST['name'];
  $type=$_POST['type'];
  $price=$_POST['price'];
  $id=$_GET['id'];
  $stmt->execute([
    ':name'=>$name,
    ':type'=>$type,
    ':price'=>$price,
    ':id'=>$id
  ]);
  header("Location: liste.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
      body {
          font-family: Arial, sans-serif;
          background-color: #0e85ee17; 
          width:40%;
        }
      h1 { 
        color: #f6fbfdff; 
      }    
    form {
      background: white;
      width: 900px;
      padding: 30px;
      border-radius:34% 64% 77% 26% / 73% 54% 45% 19%;
      box-shadow: 0px 8px 20px rgba(0,0,0,0.1);
      margin-top:60px;
      margin-left:300px;
    }
    input[type="text"],
    input[type="email"] {
      width: 400px;
      padding: 8px;
      margin: 6px 0;
      margin-left:200px;
      outline:none;
      border-radius: 12px;
      padding: 0.5rem;
      border: 2px solid  #0e85ee26;
    
    }
    label{
      margin-left:200px;
      color: #265c8cff
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
      margin-left:250px;
      width:250px;
    }
    </style>
</head>
<body>

    <form action="" method="post">
      <label for="id">Id :</label><br>
      <input type="text" name="id" value="<?= $ligne['id']?>"><br><br>

      <label for="name">New Medicine Name : </label><br>
      <input type="text" name="name" value="<?= $ligne['name']?>" ><br><br>

      <label for="type">New Medicine Type : </label><br>
      <input type="text" name="type" value="<?= $ligne['type']?>"><br><br>

      <label for="price">New Medicine Price : </label><br>
      <input type="text" name="price" value="<?= $ligne['price']?>"><br><br>

      <input type="submit" value="Update">
    </form>

</body>
</html>