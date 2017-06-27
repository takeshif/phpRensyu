<?php
  $fp = fopen("text.txt","w");
if ($fp) {
  fwrite($fp,"書き込みテスト");
  fclose($fp);
  echo '書き込みました';
} else {
}
?>

