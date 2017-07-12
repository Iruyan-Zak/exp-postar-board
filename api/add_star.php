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
$sql = 'update menus set star=star+1 where menu_id=' . $_GET['id'] . 'returning star';
$star = pg_fetch_row(pg_query($link,$sql))[0];

$sql = 'select products.max_star from products,menus where products.product_id=menus.product_id and menus.menu_id=' . $_GET['id'];
$max_star = pg_fetch_row(pg_query($link,$sql))[0];

echo $star;
echo $max_star;

if($star == $max_star){

    $sql = 'update products set max_star=' . $star . ' from menus where products.product_id=menus.product_id and menus.menu_id=' . $_GET['id'];
    pg_query($link,$sql);
}

pg_close($link);
?>
