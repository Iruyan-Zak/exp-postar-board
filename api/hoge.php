<?php
echo "Hello World!\n";
if($_SERVER["REQUEST_METHOD"] != "POST"){
	echo "これはGETだよ！!\n";
  print_r($_GET);
}else{
	echo "これはPOSTだよ！!\n";
  print_r($_POST);
}
?>
