<?php
  $link = mysqli_connect('localhost:3307', 'root', 'mina8244', 'project1');
  $query = "SELECT * FROM topic";
  $result = mysqli_query($link, $query);
  $list = '';
  while($row = mysqli_fetch_array($result)){
    $list =$list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

$article = array(
  'title' => '태용이의 TMI',
  'description' => 'NCT 이태용'
);

$update_link='';
$delete_link = '';

if( isset($_GET['id']) ){
  $query = "SELECT * FROM topic WHERE id={$_GET['id']}";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);
  $article = array(
    'title' => $row['title'],
    'description' => $row['description']
  );
  $update_link = '<a href = "update.php?id='.$_GET['id'].'">update</a>';
  $delete_link = '
    <form action="process_delete.php" method="POST">
      <input type = "hidden" name = "id" value = "'.$_GET['id'].'">
      <input type= "submit" value="delete">
      </form>
      ';
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TAEYONG</title>
  </head>
  <body>
    <h1><a href = "index.php"> 이태용 </a> </h1>
    <a href="album.php">album</a>
    <ol><?= $list ?></ol>
    <a href = "create.php">create</a>
    <?=$update_link ?>
    <?=$delete_link?>
    <h2> <?= $article['title'] ?> </h2>
    <?= $article['description'] ?>
  </body>
</html>
