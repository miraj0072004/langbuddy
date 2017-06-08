var $;

$=require('jquery');



//$("p").prepend("Some prepended text ");
$(function(){
    $("#words tr").click(function(evt)
    {
        $("#word").val($(this).find("td:eq(1)").html());
        $("#meaning").val($(this).find("td:eq(2)").html());
        $("#wordInputForm #submit").html("Update");
        $("#wordInputForm #clear").removeAttr("disabled");
        $('<input>').attr({type: 'hidden',id: 'wordId',name: 'wordId',value: $(this).find("td:eq(0)").html()}).appendTo('#wordInputForm');
        $('<input>').attr({type: 'hidden',id: 'modifyType',name: 'modifyType',value: 'update'}).appendTo('#wordInputForm');
        //alert("test");
    }
    );
    
    $("#wordInputForm #clear").click(function(evt)
    {
        $("#word").val("");
        $("#meaning").val("");
        $("#wordInputForm #clear").attr("disabled",'true');
        $("#wordInputForm #submit").html("Save");
        $("#wordInputForm #modifyType").remove();
        $("#wordInputForm #wordId").remove();
    });
    
    
}
);