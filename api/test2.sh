
curl "http://172.16.16.7/team1/api/add_star.php?id="+$1
curl "http://172.16.16.7/team1/api/add_star.php?id="+$1
curl "http://172.16.16.7/team1/api/add_star.php?id="+$1
curl "http://172.16.16.7/team1/api/add_star.php?id="+$1

curl "http://172.16.16.7/team1/api/get_menu.php?date=2017-06-28"|jq

curl "http://172.16.16.7/team1/api/edit_menu.php?name=うさぎ&price=500&sold_on=2017-06-28&energy=10.0&protein=0.8&lipid=0.003&salt=0.31&id="+$1
curl "http://172.16.16.7/team1/api/sold_out.php?id="+$1

curl "http://172.16.16.7/team1/api/get_menu.php?date=2017-06-28"|jq


curl "http://172.16.16.7/team1/api/delete_menu.php?id="+$1
curl "http://172.16.16.7/team1/api/get_menu.php?date=2017-06-28"|jq
