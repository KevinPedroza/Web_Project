<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="css/categorias.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <script type="text/javascript"
        src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <title>CRUD Categorias</title>
</head>
<body>

    <script type="text/javascript">
            function openCity(cityName) {
                var i;
                var x = document.getElementsByClassName("city");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none"; 
                }
                document.getElementById(cityName).style.display = "block"; 
            }

            $(document).ready(function(){
                $('.modal').modal();
            });
    </script>

    <header>   

        <div class="nav">
            <button class="w3-bar-item w3-button" onclick="openCity('crear')">Crear Categorias</button>
            <button class="w3-bar-item w3-button" onclick="openCity('ver')">Ver Categorias</button>
            <button class="w3-bar-item w3-button" onclick="openCity('modi')">Modificar Categorias</button>
            <button class="w3-bar-item w3-button" onclick="openCity('eli')">Eliminar Categorias</button>
        </div>

        <div id="crear" class="city wow slideInLeft">
            <h2>Crea la Categoria</h2>

            <div class="row">
                <form class="col s12" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="row">
                    <div class="input-field col s12">
                    <i class="material-icons prefix">dvr</i>
                    <input id="icon_prefix" type="text" class="validate" name="cate" required>
                    <label for="icon_prefix">Nombre de Categoria</label>
                    </div>
                    <div class="input-field col s12">
                    <i class="material-icons prefix">description</i>
                    <textarea id="textarea1" class="materialize-textarea" name="des" required></textarea>
                    <label for="textarea1">Descripción de la Categoria</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Guardar Categoria
                    <i class="material-icons right">add</i>
                </button>

                </form>
            </div>

        </div>

        <div id="ver" class="city wow slideInLeft" style="display:none">
            <h2>Categorias</h2>
            <div class="row">

                <?php foreach($info as $categoria):?>
                    <div class="col s3 m3">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                            <h2 class="card-title">Categoria: <?php echo $categoria["categoria"];?></h2>
                            <p><?php echo $categoria["descripcion"];?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>

        <div id="modi" class="city wow slideInLeft" style="display:none">
            <h2>Modificar Categorias</h2>

            <div class="row">

                <?php foreach($info as $categoria):?>
                    <div class="col s3 m3">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                            <h2 class="card-title">Categoria: <?php echo $categoria["categoria"];?></h2>
                            <p><?php echo $categoria["descripcion"];?></p>
                            </div>
                            <div class="card-action">
                                <a href="#modal1" class="btn modal-trigger" title="Editar"> <i class="material-icons">create</i> </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
                
                  <!-- Modal Structure -->
                <div id="modal1" class="modal">
                    <div class="modal-content">
                    <h4>Modal Header</h4>
                    <p>A bunch of text</p>
                    </div>
                    <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                    </div>
                </div>
          
            </div>


        </div>

        <div id="eli" class="city" style="display:none">
            <h2>Tokyo</h2>
            <p>Tokyo is the capital of Japan.</p>
        </div>

    </header>


    <!-- Compiled and minified JavaScript -->
    <script src="js/wow.min.js"></script>
    
    <!-- Activating the animations -->
    <script>
        new WOW().init();
    </script>
</body>
</html>