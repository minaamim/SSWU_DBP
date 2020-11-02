<?php
  $link = mysqli_connect('localhost:3307', 'root', 'mina8244', 'world');
  $query = "select * from country order by population desc limit 10";
  $result = mysqli_query($link, $query);

  $row = mysqli_fetch_array($result);

  $country_info ='';
  while ($row = mysqli_fetch_array($result)){
    $country_info.='<tr>';
    $country_info.='<td>'.$row['Name'].'</td>';
    $country_info.='<td>'.$row['Population'].'</td>';
    $country_info.='<td>'.$row['Region'].'</td>';
    $country_info.='</tr>';
  }
?>

<!DOCTYPE html>
<html>
<head>
  <h1>ABOUT THE WORLD</h1>
</head>
<body>
  <form method = "post" action = "country.php">
    <h5>Enter the country you wanna find</h5>
    <input type = "text" id = "country" name = "country" placeholder="country" >
    <input type = "Submit">
  </form>

  <form method = "post" action = "language.php">
    <h5>Enter the language you want to know which country it is used in</h5>
    <input type = "text" id = "language" name = "language" placeholder="language">
    <input type = "submit">
  </form>



  <h5>The 10 most populaous country </h5>
  <table border = "1">
    <tr>
      <th>name</th>
      <th>population</th>
      <th>Region</th>
    </tr>
    <?=$country_info ?>
  </table>

</body>
</html>
