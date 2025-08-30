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
  body{
        background-image:url(logo_make_11_06_2023_304.jpg); 
        /* backdrop-filter:blur(10px);
      -wekbit-backdrop-filter:blur(10px);
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
      top:30px;
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

    <form action="" method="post">
      <label for="id">Id :</label><br><br>
      <input type="text" name="id" value="<?= $ligne['id']?>"><br><br>

      <label for="name">New Medicine Name : </label><br><br>
      <input type="text" name="name" value="<?= $ligne['name']?>" ><br><br>

      <label for="type">New Medicine Type : </label><br><br>
      <input type="text" name="type" value="<?= $ligne['type']?>"><br><br>

      <label for="price">New Medicine Price : </label><br><br>
      <input type="text" name="price" value="<?= $ligne['price']?>"><br><br>

      <input type="submit" value="Update">
    </form>

</body>
</html>