<?php
echo "Hello World!\n";
if($_SERVER["REQUEST_METHOD"] != "POST"){
	echo "これはGETだよ！!\n";
  echo $_GET;
}else{
	echo "これはPOSTだよ！!\n";
  echo $_POST;
}
?>
