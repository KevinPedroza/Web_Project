<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client</title>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('#modal1').modal();
            $('#modal1').modal('open'); 
        });
    </script>


    <?php
    
        $dataPoints = array(
            array("x"=> 10, "y"=> 41),
            array("x"=> 20, "y"=> 35, "indexLabel"=> "Lowest"),
            array("x"=> 30, "y"=> 50),
            array("x"=> 40, "y"=> 45),
            array("x"=> 50, "y"=> 52),
            array("x"=> 60, "y"=> 68),
            array("x"=> 70, "y"=> 38),
            array("x"=> 80, "y"=> 71, "indexLabel"=> "Highest"),
            array("x"=> 90, "y"=> 52),
            array("x"=> 100, "y"=> 60),
            array("x"=> 110, "y"=> 36),
            array("x"=> 120, "y"=> 49),
            array("x"=> 130, "y"=> 41)
        );
            
    ?>

    <script>
        window.onload = function () {
        
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Compras de <?php echo $nombre["nombre"];?>"
            },
            data: [{
                type: "column", //change type to bar, line, area, pie, etc
                //indexLabel: "{y}", //Shows y value on all Data Points
                indexLabelFontColor: "#5A5757",
                indexLabelPlacement: "outside",   
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
        
        }
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
            <li><a href="cerrar.php">Cerrar Sesión</a></li>
        </ul>
        
        <div class="navbar-fixed">
            <nav class="menu">
                <div class="nav-wrapper">
                    <a href="#!" class="brand-logo"><i class="material-icons">shopping_cart</i>Hola, <?php echo $nombre["nombre"]; ?></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <!-- Traer la cantidad de compras del cliente de la base de datos -->
                    <li><a href="#"><i class="fas fa-shopping-cart"></i><span class="new badge">14</span></a></li>
                    <li><a href="#" data-target="dropdown1" class="dropdown-trigger"><i class="material-icons">more_vert</i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <main>
            <div class="titulo">
                <h3>Productos más Vendidos</h3>
            </div>
            <!-- Traer las imagenes mas vendidas de la base de datos -->
            <div class="most">
                <div class="carousel">
                    <h5><i class="material-icons dere">arrow_forward</i> Desliza <i class="material-icons izqui">arrow_back</i></h5>
                    <a class="carousel-item" href="#"><img src="img/ipad.jpg"></a>
                    <a class="carousel-item" href="#"><img src="img/iphonex.jpg"></a>
                    <a class="carousel-item" href="#"><img src="img/mac.jpg"></a>
                    <a class="carousel-item" href="#"><img src="img/refri.jpg"></a>
                    <a class="carousel-item" href="#"><img src="img/tv.jpeg"></a>
                </div>
            </div>
        </main>

        <section>
            <div class="titulo_cate">
                <h4>Categorias</h4>
            </div>
            
            <div class="categorias">

                <div class="row">

                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-image">
                            <img src="img/movie.jpg" height="290">
                            <span class="card-title white-text">Movie Category</span>
                            <a class="btn-floating btn-large halfway-fab waves-effect waves-light red"><i class="material-icons">more_vert</i></a>
                            </div>
                            <div class="card-content">
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-image">
                            <img src="img/game.jpg" height="290">
                            <span class="card-title white-text">Game Category</span>
                            <a class="btn-floating btn-large halfway-fab waves-effect waves-light red"><i class="material-icons">more_vert</i></a>
                            </div>
                            <div class="card-content">
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-image">
                            <img src="img/exercise.jpg" height="290">
                            <span class="card-title black-text">Exercise Category</span>
                            <a class="btn-floating btn-large halfway-fab waves-effect waves-light red"><i class="material-icons">more_vert</i></a>
                            </div>
                            <div class="card-content">
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-image">
                            <img src="img/electronic.jpg" height="290">
                            <span class="card-title black-text">Electronic Devices</span>
                            <a class="btn-floating btn-large halfway-fab waves-effect waves-light red"><i class="material-icons">more_vert</i></a>
                            </div>
                            <div class="card-content">
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <ul class="pagination">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>
            <br>
            <br>
            
        </section>
    </div>

    <footer class="page-footer teal lighten-2">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Información de Contacto</h5>
                    <p class="grey-text text-lighten-4">Kevin Pedroza Larios <br> Tel: 89596143 <br> Email: kevinlarios@gmail.com</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Visita Nuestras Redes sociales</h5>
                    <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Facebook <i class="fab fa-facebook-square"></i></a> </li>
                    <li><a class="grey-text text-lighten-3" href="#!">Instagram <i class="fab fa-instagram"></i></a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Twitter <i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                © 2018 Copyright Kevin Shop
            </div>
        </div>
    </footer>

      <!-- Modal Structure -->
    <div id="modal1" class="modal show">
        <div class="modal-content">
        <h4>Datos de <?php echo $nombre["nombre"];?></h4>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
        <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>