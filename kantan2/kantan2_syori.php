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
$h_d = $_POST["h"];
switch ("$h_d") {
  case "sel":
    $re = $s->query("SELECT * FROM tbk ORDER BY bang");
    break;
  case "ins":
    $a1_d = htmlspecialchars($_POST["a1"]);
    $a2_d = htmlspecialchars($_POST["a2"]);
    $s->query("INSERT INTO tbk (nama, mess) VALUES ('$a1_d', '$a2_d')");
    $re = $s->query("SELECT * FROM tbk ORDER BY bang");
    break;
  case "del":
    $b1_d = $_POST["b1"];
    if (preg_match("/[^0-9]/", $b1_d)) {
      print "<div style='color:red'>数字以外は入力しないで！！</div>";
    } else {
      $s->query("DELETE FROM tbk WHERE bang=$b1_d");
    }
    $re = $s->query("SELECT * FROM tbk ORDER BY bang");
    break;
  case "ser":
    $c1_d = $_POST["c1"];
    $re = $s->query("SELECT * FROM tbk WHERE mess LIKE '%$c1_d%' ORDER BY bang");
    break;
}

while ($kekka = $re->fetch()) {
  print $kekka[0];
  print " : ";
  print $kekka[1];
  print " : ";
  print $kekka[2];
  print "<br>";
}

print "<br><a href='kantan2.html'>トップメニューに戻ります</a>"
?>
</body>
</html>
