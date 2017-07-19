<?php
header('Location: http://172.16.16.7/team1/', true, 301);

$link = pg_connect("host=localhost dbname=team1db user=team1 password=1qazxsw2");
if (!$link) {
    print('接続失敗');
    exit;
}
if (!isset($_GET['id'])){
    echo 'パラメータ不正';
}
pg_query($link,'delete from menus where menu_id=' . $_GET['id']);

pg_close($link);
?>

