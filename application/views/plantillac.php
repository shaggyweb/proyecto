<html>
<head>
<meta charset="utf-8"/>

<title>Escuela de Fútbol Onuba</title>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('Assets/css/estilos6.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('Assets/css/bootstrap.min.css'); ?>">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('Assets/css/carousel.css'); ?>">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('Assets/css/business-casual.css'); ?>">
    
     <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    
  </head>


    <body>
<?= $cabecera?>
<?= $cuerpo?>
<?= $pie?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?= base_url('Assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('Assets/js/bootstrap.min.js'); ?>"></script>
    
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    

  </body>
</html>
