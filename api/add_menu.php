<?php
$link = pg_connect("host=localhost dbname=team1db user=team1 password=1qazxsw2");
if (!$link) {
    print('接続失敗');
    exit;
}
$query = array();

if(!isset($_GET["name"])){
    echo '不正なパラメータ';
    exit;
}
$query[] = $_GET['name'];

if(isset($_GET["energy"])){
    $query[] = $_GET['energy'];
} else {
    $query[] = 'null';
}

if(isset($_GET["protein"])){
    $query[] = $_GET['protein'];
} else {
    $query[] = 'null';
}
if(isset($_GET["lipid"])){
    $query[] = $_GET['lipid'];
} else {
    $query[] = 'null';
}
if(isset($_GET["salt"])){
    $query[] = $_GET['salt'];
} else {
    $query[] = 'null';
}
if(isset($_GET["sold_on"])){
    $query[] = $_GET['sold_on'];
} else {
    $query[] = 'null';
}

if(!isset($_GET['id'])){
    $result = pg_query('insert into products (name,energy,protein,lipid,salt) values (' . join(',' , query) . ') returning name');
}else{
    echo '更新処理';
}
$arrays = pg_fetch_all($result);
echo json_encode($arrays);
pg_close($link);
?>

