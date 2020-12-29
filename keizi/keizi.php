<?php
require_once("data/db_info.php");

$s = new PDO("mysql:host=$SERV;dbname=$DBNM;charset=utf8", $USER, $PASS);

$gu_d = $_GET["gu"];

if (preg_match("/[^0-9]/", $gu_d)) {
  print <<<eot1
    不正な値が入力されています<br>
    <a href="keizi_top.php">ここをクリックしてスレッド一蘭に戻ってください</a>
eot1;
} elseif (preg_match("/[0-9]/", $gu_d)) {
  $na_d = isset($_GET["na"]) ? htmlspecialchars($_GET["na"]) : null;
  $me_d = isset($_GET["me"]) ? htmlspecialchars($_GET["me"]) : null;

  $ip = getenv("REMOTE_ADDR");

  $re = $s->query("SELECT sure FROM tbj0 WHERE guru = $gu_d");
  $kekka = $re->fetch();

  $sure_com = "「".$gu_d." ".$kekka[0]."」";

  print <<<eot2
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="UTF-8">
    <title>SQLカフェ $sure_com スレッド</title>
    </head>
    <body style="background-color: silver">
    <div style="color: purple; font-size: 35pt">
    $sure_com スレッド！
    </div>
    <br>
    <div style="font-size: 18pt">$sure_com のメッセージ</div>
eot2;

  if ($na_d <> "") {
    $s->query("INSERT INTO tbj1 VALUES (0, '$na_d', '$me_d', now(), $gu_d, '$ip')");
  }

  print "<hr>";

  $re = $s->query("SELECT * FROM tbj1 WHERE guru = $gu_d ORDER BY niti");

  $i = 1;
  while ($kekka = $re->fetch()) {
    print "$i($kekka[0]):$kekka[1]:$kekka[3] <br>";
    print nl2br($kekka[2]);
    print "<br><br>";
    $i++;
  }

  print <<<eot3
    <hr>
    <div style="font-size: 18pt">
    $sure_com にメッセージを書くときはここにどうぞ
    </div>
    <form method="GET" action="keizi.php">
    <div>名前 <input type="text" name="na"></div>
    メッセージ
    <div>
    <textarea name="me" rows="10" cols="70"></textarea>
    </div>
    <input type="hidden" name="gu" value=$gu_d>
    <input type="submit" value="送信">
    </form>
    <hr>
    <a href="keizi_top.php">スレッド一覧に戻る</a>
    </body>
    </html>
eot3;
} else {
  print "スレッドを選択してください。<br>";
  print "<a href='keizi_top.php'>ここをクリックしてスレッド一蘭に戻ってください</a>";
}
?>
