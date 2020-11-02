<?php
$link = mysqli_connect('localhost:3307', 'root', 'mina8244', 'world');
$filtered_id = mysqli_real_escape_string($link, $_POST['language']);
$query = "select * from country LEFT JOIN countrylanguage ON country.Code = countrylanguage.CountryCode where countrylanguage.Language = '{$filtered_id}'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
$prevPage = "main.php";
if ($_POST['language']){
$country_info = '';
  while ($row = mysqli_fetch_array($result)){
    $country_info.='<tr>';
    $country_info.='<td>'.$row['Name'].'</td>';
    $country_info.='<td>'.$row['Language'].'</td>';
    $country_info.='<td>'.$row['IsOfficial'].'</td>';
    $country_info.='<td>'.$row['Continent'].'</td>';
    $country_info.='<td>'.$row['Region'].'</td>';
    $country_info.='<td>'.$row['Population'].'</td>';
    $country_info.='<td>'.$row['LocalName'].'</td>';
    $country_info.='</tr>';
  }}


?>
<!DOCTYPE html>
<html>
<head><h1><a href = 'main.php'>WORLD</a></h1></head>
<body>
  <table border = "1">
    <th>Name</th>
    <th>Language</th>
    <th>IsOfficial</th>
    <th>Continent</th>
    <th>Region</th>
    <th>Population</th>
    <th>LocalName</th>
    <?=$country_info ?>

  </table>
</body>
</html>
