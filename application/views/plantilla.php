<html>
<head>
<meta charset="utf-8"/>

<title>Escuela de Fútbol Onuba</title>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('Assets/css/estilos9.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('Assets/css/buscador.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('Assets/css/bootstrap.min.css'); ?>">

    <!-- Custom styles for this template -->
   
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('Assets/css/business-casual.css'); ?>">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
     <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
     <link rel="stylesheet" type="text/css" href="<?= base_url('Assets/js/funciones.js'); ?>">
    
  </head>


    <body>
    
<?= $cabecera?>
<?= $cuerpo?>
<?= $pie?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <script src="<?= base_url('Assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('Assets/js/bootstrap.min.js'); ?>"></script>
    
    
     <!-- Jquery Functions -->
    <script>
$(document).ready(function(){
    $("#habilitar").click(function(){
    	 $(".form-control").removeAttr("disabled");
    	 $(".btn").removeAttr("disabled");
    	 $(".foto").removeAttr("disabled");
    	 $('#habilitar').attr("disabled", true);
    });
});

</script> 
    
<script>
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
		          	//alert(id);
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

<!--  <script src="<?= base_url('Assets/js/ocultar.js'); ?>"></script>-->

<!--  <script src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>


<script>
$.datepicker.regional['es'] = {
closeText: 'Cerrar',
prevText: '<Ant',
nextText: 'Sig>',
currentText: 'Hoy',
monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
weekHeader: 'Sm',
dateFormat: 'dd/mm/yy',
firstDay: 1,
isRTL: false,
showMonthAfterYear: false,
yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$("#fecha").datepicker();
});

</script>

<script type="text/javascript">
		$(document).ready(function() {
			$("#categoria").change(function() {
				$("#categoria option:selected").each(function() {
					categoria = $('#categoria').val();
					$.post("<?=base_url('index.php/controlador_mensajes/llena_equipos')?>", {
						categoria : categoria
					}, function(data) {
						$("#equipos").html(data);
					});
				});
			})
		});
</script>

<script type="text/javascript">
		$(document).ready(function() {
			$("#equipos").change(function() {
				$("#equipos option:selected").each(function() {
					equipos = $('#equipos').val();
					$.post("<?=base_url('index.php/controlador_mensajes/llena_jugadores')?>", {
						equipos : equipos
					}, function(data) {
						$("#jugadores").html(data);
					});
				});
			})
		});
</script>
	
	<script type="text/javascript">
	$(document).ready(function(){
	    //utilizamos el evento keyup para coger la información
	    //cada vez que se pulsa alguna tecla con el foco en el buscador
	    $(".descripcion_busca").keyup(function(){
	 		console.log($(this).html())
	        //en info tenemos lo que vamos escribiendo en el buscador
	        var info = $(this).val();
	        //hacemos la petición al método poblaciones del controlador buscador
	        //pasando la variable info
	        $.post("<?=base_url('index.php/controlador_eventos/descripcion')?>",{ info : info }, function(data){
	 
	            //si autocompletado nos devuelve algo
	            if(data != '')
	            {
	 
	                //en el div con clase contenedor mostramos la info
	                $(".muestra_descripciones").show();
	                $(".muestra_descripciones").html(data);
	 				
	            }else{
	 
	                $(".muestra_descripciones").html('');
	 
	            }
	        })
	 
	    })
	 

	 	$(".muestra_descripciones").find("a").live('click',function(e){
			e.preventDefault();
			$(".muestra_descripciones").hide();
		});
		
		//al hacer submit al formulario comprobamos que
		//los 3 campos no vengan vacíos
		$(".formulario").submit(function(){
			
			var poblacion = $(".poblacion").val();
			var sector = $(".sector").val();
			var descripcion = $(".descripcion").val();
			
			if(poblacion == '' && sector == '' && descripcion == '')
			{
				
				alert('Escoge algún filtro para tu búsqueda');
				return false;
				
			}
		})
	})


	</script>

  </body>
</html>
