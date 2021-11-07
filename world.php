<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = htmlspecialchars($_GET['country']);
$context = "Nope";
if(isset($_GET['context'])){
  $context = htmlspecialchars($_GET['context']);
}

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if ($context == 'cities'){
  $headers = ['Name', 'District', 'Population'];
  $database_names = ['name', 'district', 'population'];
  $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON cities.country_code = countries.code WHERE countries.name LIKE '%$country%'");
}
else{
  $headers = ['Name', 'Continent', 'Independence Year', 'Head of State'];
  $database_names = ['name', 'continent', 'independence_year', 'head_of_state'];
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
}


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<table>
  <tr>
    <?php foreach ($headers as $header): ?>
    <th><?= $header; ?></th>
    <?php endforeach; ?>
  </tr>
  <?php foreach ($results as $row): ?>
  <tr>
    <?php foreach ($database_names as $filler): ?>
    <td><?= $row[$filler]; ?></td>
    <?php endforeach; ?>
  </tr>
  <?php endforeach; ?>
</table>