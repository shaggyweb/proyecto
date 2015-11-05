
<!-- NAVBAR
================================================== -->
  <body>
  	<div class="cabecera">
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                	<?php foreach ($categoria as $categ) : ?>
                		<li class="dropdown">
                  			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$categ['nombre']?> <span class="caret"></span></a>
                  				<ul class="dropdown-menu">
                  	
				
									<?php foreach ($equipos as $eq) : ?>
									<li><?=$eq['nombre']?></li>
					
									<?php endforeach; ?>
           
                  		</ul>
                  
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>
   </div>


  
