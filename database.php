<?php
require_once "connect.php";

$query = "CREATE TABLE IF NOT EXISTS `country`( 
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `country_name` VARCHAR(100) NOT NULL)ENGINE=INNODB;";

$query .= "CREATE TABLE IF NOT EXISTS `country_population`(
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `year` INT NOT NULL,
  `population` BIGINT NOT NULL,
  `yearlychangepercentage` DOUBLE(10,2) NOT NULL,
  `yearlychange` INT NOT NULL,
  `migration` INT,
  `medianage` DOUBLE(10, 1),
  `fertilityrate` DOUBLE(10, 2),
  `density` INT NOT NULL,
  `urbanpopulationpercentage` DOUBLE(10, 2) NOT NULL,
  `urbanpopulation` INT NOT NULL,
  `worldpopulationpercentage` DOUBLE(10, 2) NOT NULL,
  `totalworldpopulation` BIGINT NOT NULL,
  `totaleuropepopulation` BIGINT NOT NULL,
  `globalrank` INT NOT NULL,
  `country_id` INT UNSIGNED DEFAULT NULL,
  FOREIGN KEY(`country_id`) REFERENCES `country`(`id`)
  ON UPDATE CASCADE ON DELETE NO ACTION
) ENGINE=INNODB;";

// EXECUTE QUERIES
if (
  $conn->multi_query($query)
) {
  echo "<p>Tables created successfully!</p>";
} else {
  header("Location: error.php?m=" . $conn->error);
}
?>