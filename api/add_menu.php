<?php
$link = pg_connect("host=localhost dbname=team1db user=team1 password=1qazxsw2");
if (!$link) {
    print('接続失敗');
    exit;
}
$product_query = array();
$menu_query = array();

if(!isset($_GET["sold_on"]){
    echo '販売日指定なし';
    exit;
}

if(!isset($_GET["name"]) ||!isset($_GET['price'])){
    echo '不正なパラメータ';
    exit;
}
$product_query[] = "'" . $_GET['name'] ."'" ;
$product_query[] = $_GET['price'];

if(isset($_GET["energy"])){
    $product_query[] = $_GET['energy'];
} else {
    $product_query[] = 'null';
}

if(isset($_GET["protein"])){
    $product_query[] = $_GET['protein'];
} else {
    $product_query[] = 'null';
}
if(isset($_GET["lipid"])){
    $product_query[] = $_GET['lipid'];
} else {
    $product_query[] = 'null';
}
if(isset($_GET["salt"])){
    $product_query[] = $_GET['salt'];
} else {
    $product_query[] = 'null';
}

if(!isset($_GET['id'])){
    $sql = 'insert into products (name,price,energy,protein,lipid,salt) values (' . join(',' , $product_query) . ') returning product_id';
    $menu_query[] = pg_query($link,$sql);
    if(isset($_GET["sold_on"])){
        $menu_query[] = $_GET['sold_on'];
    } else {
        $menu_query[] = 'null';
    }
}else{
    echo '更新処理';
}


pg_close($link);
?>

