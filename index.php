<?php
  $dbhost = 'localhost:3306';
  $dbuser = 'root';
  $dbpass = 'root';
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass);
  
  if(! $connection) {
    die('Could not connect: ' . mysqli_error());
  }
  
  echo 'Connected successfully';
  mysqli_select_db($connection, 'test');
  $query = 'SELECT * FROM posts';
  $result = mysqli_query($connection, $query);
  
  mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Hello World</title>
</head>
<body>
  <h1>Hello World</h1>
  <?php if(mysqli_num_rows($result) > 0): ?>
    <ul>
      <?php while($row = mysqli_fetch_object($result)): ?>
        <li><?php echo $row->text; ?></li>
      <?php endwhile; ?>
    </ul>
  <?php else: ?>
    <p>No Posts</p>
  <?php endif; ?>
</body>
</html>
