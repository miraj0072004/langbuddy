</div>
    </div>
<footer>
   <div class="container">
       <div class="row footer">
           <div class="col-xs-offset-3 col-xs-6" >
                <p >Contact information: <a href="mailto:miraj0072004@gmail.com">miraj0072004@gmail.com</a>.</p>
           </div>
           
       </div>
   </div>      
</footer>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script> 
<script src="js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.com/libraries/1000hz-bootstrap-validator"></script>
<script src="../jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>

<script>
$(function()
 {
      
  $('#words').DataTable();
  $('#mediaTable').DataTable(
      {
        "columns":
        [
            null,
            null,
            null,
            null,
            { "width": "35%"},  
            { "width": "45%"},
            { className: "centerAlign"} 
        ]
      }
  );
    
  $('#links').DataTable();
  $('#toDoJobs').DataTable(); 
//  $('#wordInputForm').validator();
  $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));        
  });


//    $("#words tr").click(function(evt)
//    {
//        $("#word").val($(this).find("td:first").val());
//        //alert("test");
//    }
//    );
 $( "#mediaTotal" ).spinner({min:0,change: function( event, ui ) {$( "#mediaCompleted" ).spinner( "option", "max", $(this).spinner('value'));}});
 $( "#mediaCompleted" ).spinner({min:0});  
    
var date = new Date();
date.setDate(date.getDate()-1);

$('#dateIntendedGroup').datetimepicker({
  minDate:new Date(),
  format: 'YYYY-MM-DD'    
});    
    
});
</script>  
</body>
</html>