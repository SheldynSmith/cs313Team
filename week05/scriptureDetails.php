<!DOCTYPE html>
<header> Scripture Resources </header>
<body>
<?php
  try
  {
    $dbUrl = getenv('DATABASE_URL');
  
    $dbOpts = parse_url($dbUrl);
    $scripture = $_GET["id"];
    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');
  
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
  
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (PDOException $ex)
  {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
  $stmt = $db->prepare('SELECT * FROM scripture WHERE id=:id');
  $stmt->execute(array(':id' => $scripture));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  echo '<strong>'. $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'].  '</strong> - ' . $row['content'];
  ?>
</body>
</html>