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
                console.log(pattern);
                dom_str = dom_str.replace(pattern, dict[key] || '-');
            }

            var dom = $(dom_str);

            var menurow = dom.eq(0)
                .attr({
                    'soldout': booleans[dict.sold_out],
                    'menu_id': dict.menu_id
                });

            console.log(dom);
            table.append(dom);
        }

        $('.dropdown')
            .addClass('clickable')
            .click(function() {
                console.log(this);
                $(this).parent().next().toggle();
            });

        $('i.fa-times').addClass('clickable').click(function(){
            console.log(this);
            var txt = $(this).closest('tr.menu-row').attr("soldout");
            if(txt == "false"){
                $(this).closest('tr.menu-row').attr({soldout:txt.replace(/false/g, "true")});
            }else if(txt == "true"){
                $(this).closest('tr.menu-row').attr({soldout:txt.replace(/true/g, "false")});
            }
        });
    });
});

