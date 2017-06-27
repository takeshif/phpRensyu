<?php
  $images = array();
  $num = 5;

  if ($handle = opendir('./album')){
    while ($entry = readdir($handle)){
      if ($entry != "." && $entry != ".."){
        $images[] = $entry;
      }
    }
    closedir($handle);
  }
 ?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html";charset=UTF-8">
  <title>交流サイト：アルバム</title>
</head>
<body>
  <h1>交流サイト：アルバム</h1>
  <p>
    <a href="index.php"トップページに戻る</a>
    <a href="upload.php"写真をアップロードする</a>
  </p>
  <?php
    if (count($images) > 0){
      $images = array_chunk($images, $num);
      $page = 0;
      if (isset($_GET['page']) && is_numeric($_GET['page'])){
        $page = intval($_GET['page']) - 1;
        if (!isset($images[$page])){
          $page = 0;
        }
      }
      foreach ($images as $img){
        echo '<img src="./album/' . $img . '">';
      }
      echo '<p>';
      for ($i = 1; $i <= count($images); $i++) {
        echo '<a href="album.php?page="' . $i . '">' . $i . '</a>&nbsp;';
      }
      echo '</p>';
    } else {
      echo '<p>画像はまだありません</p>';
    }
?>
</body>
</html>
