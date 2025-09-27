<?php include "header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Medicines</title>
  <style>
    body {
      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
      background-color: #0e85ee17;
      
      width:40%;
    }
    form {
      margin-top: 40px;
      display:flex;
      margin-right:500px;
    }
    .p1{
      display: flex;
      justify-content:center;
      align-items:center;
      width:1000px;
      background-color:white;
      border-radius: 20px 10px;
      border: 1px solid #ccc;
            position: relative;
      left:100px;
      cursor:text;
      
      
    }
    input[type="text"] {
      width:1000px;
      padding: 8px;
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
    table {
      width: 240%;
      margin-top: 40px;
      border-collapse: collapse;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(116, 183, 216, 0.74);
    }
    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #74b7d8;
      color: white;
    }
    tr:hover {
      background-color: #f1f1f1;
    }
  </style>
</head>
<body>

  <form action="" method="post">
    <div class="p1">
    <label></label>
    <input type="text" name="name" placeholder="Search medicine....." required>
    <input type="submit" value="Search">
    </div>
  </form>

<?php 
include "config.php";

$medicines = [];

if (isset($_POST['name']) && !empty($_POST['name'])) {
  $name = trim($_POST["name"]);
  $sql = "SELECT * FROM medicines WHERE name LIKE ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["%".$name."%"]);
  $medicines = $stmt->fetchAll(PDO::FETCH_ASSOC);  
}
?>

<?php if (!empty($medicines)) { ?>

<table>
    <tr>
      <th>Medicine Name</th>
      <th>Medicine Type</th>
      <th>Medicine Price (DH)</th>
    </tr>
    <?php foreach($medicines as $medicine) { ?>
      <tr>
        <td><?= htmlspecialchars($medicine['name']); ?></td>
        <td><?= htmlspecialchars($medicine['type']); ?></td>
        <td><?= htmlspecialchars($medicine['price']); ?> DH</td>
      </tr>
    <?php } ?>
  </table> 
<?php } elseif ($_SERVER["REQUEST_METHOD"] === "POST") { ?>
  <p style="color:red;">⚠️ No medicines found for your search.</p>
<?php } ?>

</body>
</html>
