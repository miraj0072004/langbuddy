var $;

$=require('jquery');

$(function()
{
  $("#todoInputForm").submit(
    function(e)
      {
          e.preventDefault();
          
          $.ajax({              
           url: 'todoSubmit.php',
           type: 'POST',
           data: $(this).serialize(),
           dataType: 'text'           
          }          
          ).done(function(response){
               
                var data = $.parseJSON(response);
                var rowClass="odd";
                $("#toDoJobs tbody").empty();
                $.each(data,function (index,item)
                {
                    if (item[1]==1)
                    {
                      var markup=
                                "<tr role='row' class='"+rowClass+"'><td class='hidden'>"+index+"</td><td>"+item[0]+"</td><td>"+item[2]+"</td><td><button type='button' class='btn btn-success complete_button' id='complete_"+index+"'> Completed</button></td><td><a href='#' data-href='delete_item.php?deleteItemId="+index+"&itemType=todo' data-toggle='modal' data-target='#confirm-delete'><span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span></a></td></tr>";  
                    }
                    else
                    {
                      var markup=
                                "<tr role='row' class='"+rowClass+"'><td class='hidden'>"+index+"</td><td>"+item[0]+"</td><td>"+item[2]+"</td><td><button type='button' class='btn btn-primary complete_button' id='complete_"+index+"'>Mark Complete</button></td><td><a href='#' data-href='delete_item.php?deleteItemId="+index+"&itemType=todo' data-toggle='modal' data-target='#confirm-delete'><span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span></a></td></tr>";
                      
                    }
                    
                   $("#toDoJobs tbody").append(markup);
                    if (rowClass=="odd")
                        {
                          rowClass="even";
                        }
                    else
                        {
                          rowClass="odd";  
                        }
                });
                        
               
              
          }).fail({
              
              
          });
      });
    
    $("#toDoJobs").on('click','tr',function(evt)
    {
        $("#goalName").val($(this).find("td:eq(1)").html());
        $("#dateIntended").val($(this).find("td:eq(2)").html());
        
        $("#todoInputForm #submit").html("Update");
        $("#todoInputForm #clear").removeAttr("disabled");
        $("#todoInputForm #toDoId").remove();
        $("#todoInputForm #modifyType").remove();
        $('<input>').attr({type: 'hidden',id: 'toDoId',name: 'toDoId',value: $(this).find("td:eq(0)").html()}).appendTo('#todoInputForm');
        $('<input>').attr({type: 'hidden',id: 'modifyType',name: 'modifyType',value: 'update'}).appendTo('#todoInputForm');
        //alert("test");
    }
    );
    
    $("#todoInputForm #clear").click(function(evt)
    {
        $("#goalName").val("");
        $("#dateIntended").val("");
        
        $("#todoInputForm #clear").attr("disabled",'true');
        $("#todoInputForm #submit").html("Save");
        $("#todoInputForm #modifyType").remove();
        $("#todoInputForm #toDoId").remove();
    });
    
    $("#toDoJobs tbody").on('click','.complete_button',function(e){
      var goalId=$(this).parent().parent().find("td:eq(0)").html();
      var data=new Object();
      data.goalId=goalId;
          
      $.ajax({
           context: this,
           url: 'markToDo.php',
           type: 'GET',
           data: data,
           dataType: 'text' 
      }).done(function (response){
          if (response=="success")
              {
                $(this).text("Completed");  
                $(this).removeClass( "btn-primary" ).addClass( "btn-success" );
              }
      });  
    });

//var date = new Date();
//date.setDate(date.getDate()-1);
//
//$('#dateIntendedGroup').datetimepicker({
//  startDate:date
//});
    
});