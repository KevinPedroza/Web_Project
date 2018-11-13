<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script type="text/javascript"
        src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/cliente.css">    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".dropdown-trigger").dropdown();
            $('.carousel').carousel();
        });
    </script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">

</head>
<body>
    <header>
            <!-- Dropdown Structure -->
            <ul id="dropdown1" class="dropdown-content">
                <li><a href="#!">Ver Compras</a></li>
                <li class="divider"></li>
                <li><a onclick="localStorage.clear();" href="cerrar.php">Cerrar Sesión</a></li>
            </ul>
            
            <div class="navbar-fixed">
                <nav class="menu">
                    <div class="nav-wrapper">
                        <a href="cliente.php" class="brand-logo"><i class="material-icons">shopping_cart</i>Hola, <?php echo $nombre["nombre"]; ?></a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <!-- Traer la cantidad de compras del cliente de la base de datos -->
                        <li><a href="#"><i class="fas fa-shopping-cart"></i><span class="new badge"><?php echo $cantidad["cantidad"];?></span></a></li>
                        <li><a href="#" data-target="dropdown1" class="dropdown-trigger"><i class="material-icons">more_vert</i></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
    </header>
</body>
</html>