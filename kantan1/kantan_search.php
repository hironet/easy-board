<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Easy Board</title>
</head>
<body>
<?php
require_once("data/db_info.php");
$s = new PDO("mysql:host=$SERV;dbname=$DBNM;charset=utf8mb4", $USER, $PASS);
$c1_d = $_POST["c1"];
$re = $s->query("SELECT * FROM tbk WHERE mess LIKE '%$c1_d%'");
while ($kekka = $re->fetch()) {
  print $kekka[0];
  print " : ";
  print $kekka[1];
  print " : ";
  print $kekka[2];
  print "<br>";
}
print "<br><a href='kantan.html'>トップメニューに戻ります</a>";
?>
</body>
</html>
