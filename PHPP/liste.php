<?php 

session_start();
if(!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit();
}

include 'config.php';
include 'header.php';

// Search fonctionality
if (isset($_POST['name']) && !empty($_POST['name'])) {
  $name = trim($_POST["name"]);
  $sql = "SELECT * FROM medicines WHERE name LIKE ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["%".$name."%"]);
} else{
  $sql = "SELECT * FROM medicines";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medicines List</title>
  <style>
      body{
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        background-color: #0e85ee17;  
        width:40%;
      }
            .mix{
        display:flex;
      }
      .fo {
      margin-top: 60px;
       margin-left:100px; 
      display:flex;
      margin-right:100px;
    } 
    .p1{
      display: flex;
      justify-content:center;
      align-items:center;
      width:900px;
      background-color:white;
      border-radius: 20px 10px;
      border: 1px solid #ccc;
      position: relative;
      left:100px;
      cursor:text;
    }
    input[type="text"] {
      width:900px;
      /* padding: 8px; */
      border: none;
      border-radius: 20px 10px;
      /* margin-right:100px; */
      outline:none;

    }
    input[type="submit"] {
      width:700px;
      padding: 8px 15px;
      background-color: #74b7d8;
      border: none;
      color: white;
      font-weight: bold;
      border-radius: 6px;
      cursor: pointer;
      margin-right:80px;
      border-radius: 20px 10px;
      margin-left:500px;
      position: relative;
      left:80px;
    }
    input[type="submit"]:hover {
      background-color: #5aa1c2;
    }
        input[type="text"]:hover {
      border:none;
      outline:none;
    }
      h1 { 
        color: #3c7b98ff; 
      }
      table{
        background-color:white;
        width:240%;
        table-layout:fixed;
        border-collapse:collapse;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(116, 183, 216, 0.74);
      }
      th,td{
        border-bottom:1px solid rgba(116, 183, 216, 0.74);
        text-align:center;
        padding:6px 10px; 
      }

      button{
        margin:7px;
          padding:8px 8px;
          width: 90px;
          border:none;
          font-size:0.9rem;
          border-radius:12px;
          background-color: #3c7b98ff;
          color:white;
          cursor:pointer;
          box-shadow: 0 2px 5px #3c7b9892;
          transition: transform 0.3s ease;
          display:flex;
      }
      button:hover{
          background-color:#3c7b9892;
          box-shadow: 0 2px 5px #3c7b9892;
          transform: scale(1.1); 
      }
      a{
        text-decoration:none;
        color: #7eb0c7ff;
      }
      a:hover{
        color:#3c7b98ff;
      }
      strong{
        color:white;
      }
      p{
        display:flex;
        justify-content:flex-start;
        /* margin-left:800px; */
        /* font-size:1rem; */
        color:#3c7b98ff;
      }


  </style>
</head>
<body>
  <div class="mix">
  <h1>Welcome, <?= htmlspecialchars($_SESSION['user']['email']) ?></h1>
   <!-- search form  -->
    <div class="fo">
    <form action="" method="post">
        <div class="p1">
          <label></label>
          <input type="text" name="name" placeholder="Search medicine....." required>
          <input type="submit" value="Search">
        </div>
    </form>
    </div>
    </div>
<!-- // table  -->
  <table >
  <tr>
    <th>ID: </th>
    <th>Name of medicine: </th>
    <th>Type of medicine: </th>
    <th>Price of medicine: </th>
    <th> Actions :</th>
  </tr>
<tbdody>
  <?php if ($stmt->rowCount()>0):?>
  <?php while ($medicine = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
  
    <tr>
        
        <td > <?= htmlspecialchars($medicine['id']) ?></td>
        <td><?= htmlspecialchars($medicine['name']) ?></td>
        <td> <?= htmlspecialchars($medicine['type']) ?></td>
        <td> <?= htmlspecialchars($medicine['price']) ?> DH</td>
        <td>
          <div class="fofo" style="display:flex;; justify-content:center;">
        <form action="delete.php" method="get" ">
          <input type="hidden" name="id" value="<?= $medicine['id'] ?>">
          <button type="submit" onclick="return confirm('Do you really want to delete this medicine?');">Delete</button>
        </form>
        <form action="edit.php" method="get"">
          <input type="hidden" name="id" value="<?= $medicine['id'] ?>">
          <button type="submit">Edit</button>
        </form>
        </div>
  </td>
  </tr>
      </tbody>
  <?php endwhile; ?>
  <?php  else :  ?>
  <p style="color:red;">⚠️ No medicines found for your search.</p>
  <?php endif; ?>
  </table>
  <p> If you want to loge out .. <a href="logout.php">Click Here ✋🏻</a></p>
</body>
</html>

