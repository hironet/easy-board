<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
$s = new PDO("mysql:host=dev-db;dbname=easy-board;charset=utf8", "root", "root");
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
