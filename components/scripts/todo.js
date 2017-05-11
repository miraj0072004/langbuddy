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
                $("#toDoJobs tbody").empty();
                $.each(data,function (index,item)
                {
                    var markup=
                                "<tr><td class='hidden'>index</td><td>"+item[0]+"</td><td>"+item[2]+"</td><td><button type='button' class='btn btn-primary' id='complete'>Mark Complete</button></td><td><a href='#' data-href='delete_item.php?deleteItemId="+index+"&itemType=todo' data-toggle='modal' data-target='#confirm-delete'><span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span></a></td></tr>";
                    
                   $("#toDoJobs tbody").append(markup);  
                });
                        
               
              
          }).fail({
              
              
          });
      }); 
});