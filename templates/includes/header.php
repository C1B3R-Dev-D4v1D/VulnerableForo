<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Vulnerable PHP Web">
    <title>Bienvenido al Foro Vulnerable del IES Campanillas</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASE_URI; ?>templates/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo BASE_URI; ?>templates/css/custom.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.16.0/ckeditor.js" integrity="sha512-7My1gsUz5JUQgT8+P0sHKaPel/77X3zjGZsXbTS8Y7MhDEJ+f9xg9H+pPzONFL5djye0zWLlxFLApGsWQ1gdfA==" crossorigin="anonymous"></script>
      
    <?php 
      //Check if title is set, if not Assign it
      if (!isset($title)){
        $title = SITE_TITLE;
      }
      ?>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Foro Ligeramente Vulnerable</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.php">Home</a></li>
            <?php if(!isLoggedIn()) : ?>
                <li><a href="register.php">Crear Cuenta</a></li>
            <?php else : ?>
                <li><a href="create.php">Crear Topic</a></li>
		<?php if(isAdmin()) : ?>
		<li><a href="admin.php">Administracion</a></li>
		<?php endif; ?>
            <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

        <div class="row">
            <div class="col-md-8">
                <div class="main-col">
                    <div class="block">
                    <h1 class="pull-left"><?php echo $title; ?></h1>
                    <h4 class="pull-right">Un Motor de Foros Vulnerables</h4>
                        <div class="clearfix"></div>
                        <hr />
                        <?php displayMessage(); ?>
