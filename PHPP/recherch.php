<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Medicines</title>
  <style>
    body {
      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
      background-color: #f5f7fbff;
      padding: 20px;
    }
    form {
      margin-bottom: 20px;
    }
    input[type="text"] {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    input[type="submit"] {
      padding: 8px 15px;
      background-color: #74b7d8;
      border: none;
      color: white;
      font-weight: bold;
      border-radius: 6px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #5aa1c2;
    }
    table {
      width: 100%;
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
    <label>Medicine Name :</label>
    <input type="text" name="name" placeholder="Enter medicine name">
    <input type="submit" value="Search">
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
