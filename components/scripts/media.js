var $;

$=require('jquery');

$(function(){

    $("#mediaForm").on("submit",function(form) {
        
        
        if (($("#mediaTotal").val())&&($("#mediaCompleted").val()>$("#mediaTotal").val()))
            {
             alert("Completed number of items cannot be higher than the total number of items!");
             //$("#mediaCompleted").addClass("ui-state-error");    
             return false;
            }
        return true;
    
    });

    $("#mediaTable tr").click(function(evt)
    {
        $("#mediaName").val($(this).find("td:eq(4) a").html());
        $("#mediaLink").val($(this).find("td:eq(3)").html());
        $("#mediaTotal").val($(this).find("td:eq(2)").html());
        $("#mediaCompleted").val($(this).find("td:eq(1)").html());
        $("#mediaForm #submit").html("Update");
        $("#mediaForm #clear").removeAttr("disabled");
        $('<input>').attr({type: 'hidden',id: 'mediaId',name: 'mediaId',value: $(this).find("td:eq(0)").html()}).appendTo('#mediaForm');
        $('<input>').attr({type: 'hidden',id: 'modifyType',name: 'modifyType',value: 'update'}).appendTo('#mediaForm');
        //alert("test");
    }
    );
    
    $("#mediaForm #clear").click(function(evt)
    {
        $("#mediaName").val("");
        $("#mediaLink").val("");
        $("#mediaTotal").val("");
        $("#mediaCompleted").val("");
        $("#mediaForm #clear").attr("disabled",'true');
        $("#mediaForm #submit").html("Save");
        $("#mediaForm").remove("#modifyType");
    });
}
);
    
