<?php
$link = pg_connect("host=localhost dbname=team1db user=team1 password=1qazxsw2");
if (!$link) {
    print('接続失敗');
    exit;
}

if(isset($_GET["name"])){
    echo $_GET["name"];
}
if(isset($_GET["energy"])){
    echo $_GET["energy"];
}
if(isset($_GET["protein"])){
    echo $_GET["protein"];
}
if(isset($_GET["lipid"])){
    echo $_GET["lipid"];
}
if(isset($_GET["salt"])){
    echo $_GET["salt"];
}
if(isset($_GET["sold_on"])){
    echo $_GET["sold_on"];
}

$arrays = pg_fetch_all($result);
echo json_encode($arrays);
pg_close($link);
?>

