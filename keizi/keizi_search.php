<?php
require_once("data/db_info.php");

$s = new PDO("mysql:host=$SERV;dbname=$DBNM;charset=utf8", $USER, $PASS);

print <<<eot1
  <!DOCTYPE html>
  <html>
  <head>
  <meta charset="UTF-8">
  <title>SQLカフェ 検索のページ</title>
  </head>
  <body style="background-color: aqua">
  <hr>
  <div style="font-size: 18pt">（検索結果はこちらに）</div>
eot1;

$se_d = isset($_GET["se"]) ? htmlspecialchars($_GET["se"]) : null;

if ($se_d <> "") {
  $str = <<<eot2
    SELECT tbj1.bang, tbj1.nama, tbj1.mess, tbj0.sure
    FROM tbj1
    JOIN tbj0
    ON tbj1.guru = tbj0.guru
    WHERE tbj1.mess LIKE "%$se_d%"
eot2;
  $re = $s->query($str);
  while ($kekka = $re->fetch()) {
    print " $kekka[0] : $kekka[1] : $kekka[2] ( $kekka[3] )";
    print "<br><br>";
  }
}

print <<<eot3
  <hr>
  <div>メッセージに含まれる文字を入力してください！</div>
  <form method="GET" action="keizi_search.php">
  検索する文字列
  <input type="text" name="se">
  <div>
  <input type="submit" value="検索">
  </div>
  <br>
  <a href="keizi_top.php">スレッド一蘭に戻る</a>
  </body>
  </html>
eot3;
?>
