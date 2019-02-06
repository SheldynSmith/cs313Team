<!DOCTYPE html>
<header> Scripture Resources </header>

<body>
    <?php
  try
  {
    $dbUrl = getenv('DATABASE_URL');
    $dbOpts = parse_url($dbUrl);
    $book = $_GET["book"];
    $id = $_GET["id"];
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
  foreach ($db->query("SELECT id,book,chapter,verse FROM scripture WHERE book='$book'") as $row)
  {
    echo '<a href="scriptureDetails.php?id='.$row["id"].'"><strong>'. $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'].  '</strong></a>';
    echo '<br/>';
  }
?>
</body>

</html>