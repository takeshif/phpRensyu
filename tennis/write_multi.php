<?php
$fp = fopen("test.txt","w");
if ($fp) {
  fwrite($fp,"書き込みテスト１");
  fwrite($fp,"書き込みテスト２");
  fclose($fp);
  echo '書き込みました';
} else {
}
?>


