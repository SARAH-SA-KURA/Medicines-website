<?php 
session_start();
if(!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit();
}

include 'config.php';
include 'header.php';

$sql = "SELECT * FROM medicines";
$stmt = $pdo->prepare($sql);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medicines List</title>
  <style>
      body{
        background-image:url(logo_make_11_06_2023_304.jpg); 
        /* backdrop-filter:blur(8px);
      -wekbit-backdrop-filter:blur(8px);
        width: 100%; */
        height: 677px;
        background-size: cover;
        backgrounf-repeat:no-repeat;
        background-position:center;
        font-family: sans-serif; 
      }
      h1 { 
        color: #f6fbfdff; 
      }
      .medicine { 
        background: #0a4461ff; 
        border:1px solid  #5aa1c2; 
        padding:15px; 
        margin:15px; 
        border-radius:8px; 
        box-shadow:5px 5px 10px rgba(116, 183, 216, 0.74); 
      
 
      }
      .medicine:hover{
        background: #5aa1c2ec; 
      }
      .medicine strong{
          color:white; 
      }
      .medicine{
        display:flex;
        justify-content:space-between;
        align-items:center;
      }
      button{
          padding:12px 15px;
          width: 100px;
          border:none;
          font-size:0.9rem;
          border-radius:12px;
          background-color: #3c7b98ff;
          color:white;
          cursor:pointer;
          box-shadow: 0 2px 5px #3c7b9892;
          transition: transform 0.3s ease;
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
        color:white;
      }

  </style>
</head>
<body>
  <h1>Welcome, <?= htmlspecialchars($_SESSION['user']['email']) ?></h1>
  <p> If you want to loge out .. <a href="logout.php">Click Here ✋🏻</a>

  <?php while ($medicine = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
  
    <div class="medicine">
        
        <p><strong>ID :</strong> <?= htmlspecialchars($medicine['id']) ?></p>
        <p><strong>Name :</strong> <?= htmlspecialchars($medicine['name']) ?></p>
        <p><strong>Type :</strong> <?= htmlspecialchars($medicine['type']) ?></p>
        <p><strong>Price :</strong> <?= htmlspecialchars($medicine['price']) ?> DH</p>

        <form action="delete.php" method="get" style="display:inline;">
          <input type="hidden" name="id" value="<?= $medicine['id'] ?>">
          <button type="submit" onclick="return confirm('Do you really want to delete this medicine?');">Delete</button>
        </form>
        <form action="edit.php" method="get" style="display:inline;">
          <input type="hidden" name="id" value="<?= $medicine['id'] ?>">
          <button type="submit">Edit</button>
        </form>
    </div>
      
  <?php endwhile; ?>

</body>
</html>

