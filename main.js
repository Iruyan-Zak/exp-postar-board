var keys = ['star', 'name', 'price', 'energy', 'protein', 'lipid', 'salt'];
var booleans = {'f': 'false', 't': 'true'};

var menuJSONs = {}
$(function(){
    $.getJSON("sample/sample.json", function(data){
        var table = $('.menu-table:first');

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

        $('.dropdown')
            .addClass('clickable')
            .click(function() {
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
