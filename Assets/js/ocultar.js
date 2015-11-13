<script type = "text/javascript">
$(document).ready(function(){
	  $(".oculto").hide();             
	  $(".enlace_info").click(function()
		{
		  $(".oculto").hide();
			//alert("dddsds");
	          var id = $(this).attr("id");

	          //alert(id);
	            
	          if (!$("#capa"+ id).is(":visible"))
		      {
		          	alert(id);
	               	$("#capa"+ id).show();
	               	
	          	}
	          	else
		        {
	        		$("#capa" + id).hide("slow");                             
	        		//$(nodo).fadeToggle("fast");
	        		
	          }
	    });
	}); 
    </script>