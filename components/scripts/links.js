var $;

$=require('jquery');



//$("p").prepend("Some prepended text ");
$(function(){
    $("#links tr").click(function(evt)
    {
        $("#linkName").val($(this).find("td:eq(1)").html());
        $("#link").val($(this).find("td:eq(2) a").html());
        $("#linksForm #submit").html("Update");
        $("#linksForm #clear").removeAttr("disabled");
        $('<input>').attr({type: 'hidden',id: 'linkId',name: 'linkId',value: $(this).find("td:eq(0)").html()}).appendTo('#linksForm');
        $('<input>').attr({type: 'hidden',id: 'modifyType',name: 'modifyType',value: 'update'}).appendTo('#linksForm');
        //alert("test");
    }
    );
    
    $("#linksForm #clear").click(function(evt)
    {
        $("#linkName").val("");
        $("#link").val("");
        $("#linksForm #clear").attr("disabled",'true');
        $("#linksForm #submit").html("Save");
        $("#linksForm #modifyType").remove();
        $("#linksForm #linkId").remove();
    });
    
    
}
);