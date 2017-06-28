<?php
$link = pg_connect("host=localhost dbname=team1db user=team1 password=1qazxsw2");
if (!$link) {
    print('接続失敗');
    exit;
}
if(!isset($_GET['id'])){
    echo 'idがありません';
    exit;
}
if(!isset($_GET['sold_out'])){
    echo '売り切れ情報が指定されていません';
    exit;
}
pg_query($link,'update menus set sold_out=' . $_GET['sold_out'] . ' where product_id=' . $_GET['id']);

pg_close($link);
?>

