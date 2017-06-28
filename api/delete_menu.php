<?php
$link = pg_connect("host=localhost dbname=team1db user=team1 password=1qazxsw2");
if (!$link) {
    print('接続失敗');
    exit;
}
if (!isset($_GET['id']){
    echo 'パラメータ不正';
}
pg_query($link,'delete from where menus_id=' . $_GET['id']);

pg_close($link);
?>

