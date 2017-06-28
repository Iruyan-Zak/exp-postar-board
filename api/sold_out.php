<?php
$link = pg_connect("host=localhost dbname=team1db user=team1 password=1qazxsw2");
if (!$link) {
    print('接続失敗');
    exit;
}
if(!isset($_GET['id']) ||!isset($_GET['sold_out'])){
    pg_query($link,'update menus set sold_out=' . $_GET['sold_out'] . ' where product_id=' . $_GET['id'] . 'returning product_id');
}else[
    echo 'パラメータ不正';
}

pg_close($link);
?>

