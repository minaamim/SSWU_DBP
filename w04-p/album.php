<?php
  $link = mysqli_connect('localhost:3307', 'root', 'mina8244', 'project1');

  $query = "SELECT * FROM album";
  $result = mysqli_query($link, $query);
  $album_info = '';

  while ($row = mysqli_fetch_array($result)){
    $filtered = array(
      'id' => htmlspecialchars($row['id']),
      'title' => htmlspecialchars($row['title']),
      'date' => htmlspecialchars($row['date'])
    );
    $album_info .= '<tr>';
    $album_info .= '<td>'.$filtered['id'].'</td>';
    $album_info .= '<td>'.$filtered['title'].'</td>';
    $album_info .= '<td>'.$filtered['date'].'</td>';
    $album_info .= '<td><a href="album.php?id='.$filtered['id'].'">update</a></td>';
    $album_info .= '
    <td>
      <form action ="process_delete_album.php" method="post">
        <input type = "hidden" name = "id" value = "'.$filtered['id'].'">
        <input type = "submit" value = "delete">
      </form>
    </td>
    ';
    $album_info .= '</tr>';
  };

  $escaped = array(
    'title' => '',
    'date' => ''
  );

  $form_action = 'process_create_album.php';
  $label_submit = 'Create album';
  $form_id = '';

  if (isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
    settype($filtered_id, 'integer');
    $query = "SELECT * FROM album WHERE id = {$filtered_id}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $escaped['title'] = htmlspecialchars($row['title']);
    $escaped['date'] = htmlspecialchars($row['date']);

    $form_action = 'process_update_album.php';
    $label_submit = 'Update album';
    $form_id = '<input type = "hidden" name = "id" value ="'.$_GET['id'].'">';
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8">
  <title>TAEYONG</title>
</head>
<body>
  <h1><a href="index.php">이태용</a></h1>
  <p><a href="index.php">topic</a></p>

  <table border = "1">
    <tr>
      <th>id</th>
      <th>title</th>
      <th>date</th>
      <th>update</th>
      <th>delete</th>
    </tr>
      <?=$album_info ?>
  </table>
  <br>
  <form action = "<?=$form_action ?>" method="post">
    <?=$form_id?>
    <label for = "fname">title:</label><br>
    <input type="text" id="title" name="title" placeholder="title" value = "<?=$escaped['title']?>"><br>
    <label for ="lname">date:</label><br>
    <input type="text" id="date" name="date" placeholder="date" value = "<?=$escaped['date']?>"><br><br>
    <input type="submit" value = "<?=$label_submit?>">
  </form>
</body>
</html>
