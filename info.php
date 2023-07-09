<?php
require_once "connect.php";
$countryName = $_COOKIE['js_var_value'];
// echo $countryName;

$queryPopulation = "SELECT `country`.`country_name`, `country_population`.`year`, `country_population`.`population`, `country_population`.`yearlychangepercentage`, `country_population`.`yearlychange`, `country_population`.`migration`, `country_population`.`medianage`, `country_population`.`fertilityrate`, `country_population`.`density`, `country_population`.`urbanpopulationpercentage`, `country_population`.`urbanpopulation`, `country_population`.`worldpopulationpercentage`, `country_population`.`totalworldpopulation`, `country_population`.`totaleuropepopulation`, `country_population`.`globalrank`, `country_population`.`country_id`
 FROM `country` 
 LEFT JOIN `country_population` ON `country`.`id` = `country_population`.`country_id` 
 WHERE `country`.`country_name` = '$countryName' AND  `country`.`id` = `country_population`.`country_id`;";

$resultPopulation = $conn->query($queryPopulation);

if (isset($_POST["populationsubmit"])) {
  $queryPopulation = "SELECT `country`.`country_name`, `country_population`.`year`, `country_population`.`population`, `country_population`.`yearlychangepercentage`, `country_population`.`yearlychange`, `country_population`.`migration`, `country_population`.`medianage`, `country_population`.`fertilityrate`, `country_population`.`density`, `country_population`.`urbanpopulationpercentage`, `country_population`.`urbanpopulation`, `country_population`.`worldpopulationpercentage`, `country_population`.`totalworldpopulation`, `country_population`.`totaleuropepopulation`, `country_population`.`globalrank`, `country_population`.`country_id`
 FROM `country` 
 LEFT JOIN `country_population` ON `country`.`id` = `country_population`.`country_id` 
 WHERE `country`.`country_name` = '$countryName' AND  `country`.`id` = `country_population`.`country_id`;";


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>


  <div class="info-panel-container">
    <div class="info-panel">
      <table>
        <thead>
          <th>Year</th>
          <th>Population</th>
          <th>Yearly change</th>
          <th>Migration</th>
          <th>Median age</th>
          <th>Fertility rate</th>
          <th>Density p/km</th>
          <th>Global rank</th>
          <th>Urban population %</th>
        </thead>
        <tbody>
          <tr>
            <?php
            $resultPopulation = $conn->query($queryPopulation);
            if ($resultPopulation->num_rows != 0) {
              while ($row = $resultPopulation->fetch_assoc()) {
                ?>
                <td>
                  <?php echo $row['year'] ?>
                </td>
                <td>
                  <?php
                  if (round($row['population'] / 1000000, 1) != 0) {
                    echo round($row['population'] / 1000000, 2) . "M";
                  } else {
                    echo round($row['population'] / 1000, 2) . "K";
                  }
                  ?>
                </td>
                <td>
                  <?php if ($row['yearlychange'] > 0) {
                    echo "+" . round($row['yearlychange'] / 1000, 2);
                  } else {
                    echo round($row['yearlychange'] / 1000, 2);
                  } ?>K
                </td>
                <td>
                  <?php echo round($row['migration'] / 1000, 2) ?>K
                </td>
                <td>
                  <?php echo $row['medianage'] ?>
                </td>
                <td>
                  <?php echo $row['fertilityrate'] ?>
                </td>

                <td>
                  <?php echo $row['density'] ?>
                </td>
                <td>
                  <?php echo $row['globalrank'] ?>
                </td>
                <td>
                  <?php echo $row['urbanpopulationpercentage'] ?>%
                </td>
              </tr>
            <?php }
            } ?>
        </tbody>

      </table>
    </div>