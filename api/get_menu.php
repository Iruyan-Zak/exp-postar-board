<?php
$link = pg_connect("host=localhost dbname=team1db user=team1 password=1qazxsw2");
if (!$link) {
        print('接続失敗');
        exit;
}
$result = pg_query('SELECT * FROM menus where sold_on = ' . $_GET["date"]);
if (!$result) {
        print('クエリ失敗');
        exit;
}
$arrays = pg_fetch_all($result);
echo json_encode($arrays);
pg_close($link);
?>

