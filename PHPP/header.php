<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>


header .navbar {
  display:flex;
  gap:80px;
  position: relative;
  left:900px;
  bottom: 20px;
  
  
}
header .name{
  font-weight: 1000;
  color: #023e5aff;
  font-size:24px;
  position: relative;
  top:10px;
  left:40px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans serif ;
}

.navbar a {
  color: #023e5aff;
  text-decoration: none;            
  font-weight: 600;
  transition:  0.3s ease, transform 0.2s ease;
}




  </style>
</head>
<body>
  <header>
    <div class="name">🏩HOSPITALS </div>
  <nav class="navbar">
    <!-- <a href="recherch.php" class="nav-link">Search Medicines</a> -->
    <a href="liste.php" class="nav-link">Liste of Medicines</a>
    <a href="add.php" class="nav-link">Create Medicine</a>
  </nav>
</header>

</body>
</html>