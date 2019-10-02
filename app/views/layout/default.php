<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Degault</title>
</head>
<body>
  <h1>Hello world</h1>
  <?= $content ?>
  <?= $name ?>
  <?= $name3 ?>

<?php
// вывод всех проводимых запросов
$logs = R::getDatabaseAdapter()
->getDatabase()
->getLogger();

debug( $logs->grep( 'SELECT' ) );
?>

</body>
</html>