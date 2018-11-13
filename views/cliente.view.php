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

            if(!localStorage.getItem("#modal1")){    
                $('#modal1').modal(); 
                $('#modal1').modal("open");
                localStorage.setItem("#modal1","true");
            }
        });
    </script>


    <?php
    
        //this realizing the conexion
        $conexion = conexion();

        //ID'S USER
        $id = $nombre["id"];

        //this is bringing the information from the user
        $sql = "SELECT COUNT(v.id_cliente) AS cantidad, SUM(p.precio) AS total FROM productos AS p INNER JOIN ventas AS v ON v.id_producto =p.id_producto WHERE v.id_cliente = '$id'";
        $info2 = $conexion->prepare($sql); 
        $info2->execute();
        $info = $info2->fetch();    

        //this is establishing the points on the chart
        $dataPoints = array(
            array("label"=> "Cantidad de Compras: " . $info["cantidad"], "y"=> $info["cantidad"]),
            array("label"=> "Monto Total de Compras: " . $info["total"], "y"=> $info["total"]),
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
                type: "pie",
                showInLegend: "true",
                legendText: "{label}",
                indexLabelFontSize: 16,
                indexLabel: "{label} - #percent%",
                yValueFormatString: "฿#,##0",
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
            <li><a onclick="localStorage.clear();" href="cerrar.php">Cerrar Sesión</a></li>
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
                <h3>Algunos Productos</h3>
            </div>
            <!-- Traer las imagenes mas vendidas de la base de datos -->
            <div class="most">
                <div class="carousel">
                    <h5><i class="material-icons dere">arrow_forward</i> Desliza <i class="material-icons izqui">arrow_back</i></h5>

                    <?php foreach($prod as $productos):?>
                        <a class="carousel-item" href="#"><img src="img/<?php echo $productos['img'];?>"></a>
                    <?php endforeach;?>
                </div>
            </div>
        </main>

        <section>
            <div class="titulo_cate">
                <h4>Categorias</h4>
            </div>
            
            <div class="categorias">

                <div class="row">

                    <?php foreach($cate as $categoria):?>
                        <div class="col s3 m3">
                            <div class="card blue-grey darken-1">
                                <a class="btn-floating btn-large halfway-fab waves-effect waves-light red"><i class="material-icons">more_vert</i></a>
                                <div class="card-content white-text">
                                <h2 class="card-title">Categoria: <?php echo $categoria["categoria"];?></h2>
                                <p><?php echo $categoria["descripcion"];?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>

                </div>

            </div>

            <ul class="pagination">
        
                <?php if($pagina == 1): ?>
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <?php else: ?>
                    <li><a href="?pagina=<?php echo $pagina - 1;?>"><i class="material-icons">chevron_left</i></a></li>
                <?php endif;?>

                <?php 
                
                    for($i = 1; $i <= $numeropaginas; $i++){
                        if($pagina == $i){    
                            echo "<li class='active'><a href='?pagina=$i'>$i</a></li>";
                        }else{
                            echo "<li class='waves-effect'><a href='?pagina=$i'>$i</a></li>";
                        }
                    }
                
                ?>

                <?php if($pagina == $numeropaginas):?>
                    <li class="disabled"><a href="#"><i class="material-icons">chevron_right</i></a></li>
                <?php else:?>
                    <li><a href="?pagina=<?php echo $pagina + 1;?>"><i class="material-icons">chevron_right</i></a></li>
                <?php endif;?>

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