<?php
echo $_GET["date"];
$link = pg_connect("host=localhost dbname=team1db user=team1 password=1qazxsw2");
$result = pg_query($link , 'SELECT * FROM menu where sold_on = ' . $_GET["date"]);
echo json_encode($result);
pg_close($link);
?>
