<?php
  $fp = fopen("info.txt","r");
?>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html"; charset=UTF-8">
  <title>テニスサークル交流サイト</title>
</head>
<body>
  <h1>テニスサークル交流サイト</h1>
  <p><a href="album.php">アルバム</a></p>
  <h2>お知らせ</h2>
  <?php
    if ($fp) {
      $title = fgets($fp);
    if ($title) {
      echo '<a href="info.php">' . $title . '</a>';
    } else {
      echo 'お知らせはありません';
    }
    fclose($fp);
    } else {
      echo 'お知らせはありません';
    }
  ?>
</body>
</html>
