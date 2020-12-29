<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Easy Board</title>
</head>
<body>
<?php
$s = new PDO("mysql:host=dev-db;dbname=easy-board;charset=utf8", "root", "root");
$b1_d = $_POST["b1"];
$s->query("DELETE FROM tbk WHERE bang=$b1_d");
$re = $s->query("SELECT * FROM tbk ORDER BY bang");
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
