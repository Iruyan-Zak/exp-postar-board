var keys = ['star', 'name', 'price', 'energy', 'protein', 'lipid', 'salt'];
var booleans = {'f': 'false', 't': 'true'};

var menuJSONs = {}
$(function(){
    var storage = localStorage;

    date = storage['date'];

    if(date) {
        date = new Date(date);
    } else {
        date = new Date();
        storage['date'] = isoFormat(date);
    }

    $("#menu-date").text(isoFormat(date) + "のメニュー");

    $.getJSON("api/get_menu.php?date=" + isoFormat(date), function(data){
        var table = $('.menu-table:first');

        if(!data) return;

        for(var dict of data){

            menuJSONs[dict.menu_id] = dict;

            var dom_str = $('#template').clone(true).removeAttr('id').html();

            for(var key of keys){
                let pattern = `#${key}#`;
                dom_str = dom_str.replace(pattern, dict[key] || '-');
            }

            var dom = $(dom_str);

            var menurow = dom.eq(0)
                .attr({
                    'soldout': booleans[dict.sold_out],
                    'menu_id': dict.menu_id
                });

            table.append(dom);
        }

        $('.dropdown').addClass('clickable').click(function() {
            $(this).parent().next().toggle();
        });

        $('i.fa-times').addClass('clickable').click(function(){soldOut(this)});
        $('i.fa-star-o').addClass('clickable').click(function(){fav(this)});
    });
});

function soldOut(self){
    console.log(self);
    var tr = $(self).closest('tr.menu-row');
    var txt = tr.attr("soldout");

    if(txt === "false"){
        var new_txt = "true";
    } else {
        var new_txt = "false"
    }
    tr.attr('soldout', new_txt);

    console.log(tr);
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "api/sold_out.php?id=" + tr.attr('menu_id') + "&sold_out=" + new_txt);
    xhr.send(null);

    return false;
}

function fav(self){
    console.log(self);
    var star = $(self).parent().next();
    var score = parseInt(star.text()) + 1;
    star.text(score);

    var tr = $(self).closest('tr.menu-row');
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "api/add_star.php?id=" + tr.attr('menu_id'));
    xhr.send(null);

    return false;

}

function DataSend(self){
    var id = $(self).closest('tr').attr("menu_id");
    console.log(id);
    location.href="modify.html?" + escape(JSON.stringify(menuJSONs[id]));
}

function moveday(n){
    var storage = localStorage;
    var date = new Date(storage['date']);

    date.setDate(date.getDate() + n);
    storage['date'] = isoFormat(date);

    window.location.href = "/team1";
}

function getQueryString(){
    var args  = {};
    url = location.search.substring(1).split('&');

    for(i=0; url[i]; i++) {
        var k = url[i].split('=');
        args[k[0]] = k[1];
    }

    return args;
}

function isoFormat(date){
    return date.getFullYear()+"-"+( "0"+( date.getMonth()+1 ) ).slice(-2)+"-"+( "0"+date.getDate() ).slice(-2);
}

function gotoday(){
    localStorage.clear();
    window.location.href = '/team1';
}
