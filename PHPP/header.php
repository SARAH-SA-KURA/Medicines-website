<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
header {
  background-color:#74b7d8;      
  padding: 15px 30px;
  box-shadow: 0 3px 8px rgba(116, 183, 216, 0.74);
  border-radius: 12px; 
         
}

.navbar {
  display: flex;
  justify-content: flex-end;
  gap: 20px;
}

.navbar a {
  color: white;
  text-decoration: none;
  padding: 10px 16px;
  border-radius: 10px;             
  font-weight: 600;
  background-color:#74b7d8;
  box-shadow: 0 2px 5px #f1f1f1;
  transition:  0.3s ease, transform 0.2s ease;
}

.navbar a:hover {
  background-color:  #5aa1c2;       
  transform: scale(1.05);           
}


  </style>
</head>
<body>
  <header>
  <nav class="navbar">
    <a href="recherch.php" class="nav-link">Search Medicines</a>
    <a href="liste.php" class="nav-link">Liste of Medicines</a>
    <a href="add.php" class="nav-link">Create Medicine</a>
  </nav>
</header>

</body>
</html>