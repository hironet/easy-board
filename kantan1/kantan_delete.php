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
$s = new PDO("mysql:host=$SERV;dbname=$DBNM;charset=utf8", $USER, $PASS);
$b1_d = $_POST["b1"];
if (preg_match("/[^0-9]/", $b1_d)) {
  print "<div style='color:red'>数字以外は入力しないで！！</div>";
} else {
  $s->query("DELETE FROM tbk WHERE bang=$b1_d");
}
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
