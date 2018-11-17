<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <script type="text/javascript"
        src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="css/productos.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <title>CRUD Productos</title>
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
            $('select').formSelect();
        });
    </script>

    <header>   

        <div class="nav">
            <button class="w3-bar-item w3-button" onclick="openCity('crear')">Crear Productos</button>
            <button class="w3-bar-item w3-button" onclick="openCity('ver')">Ver Productos</button>
            <button class="w3-bar-item w3-button" onclick="openCity('modi')">Modificar Productos</button>
        </div>
        <a href="admin.php" style="border-radius: 25px;" class="btn"><i class="material-icons">arrow_back</i></a>
        <div id="crear" class="city wow slideInLeft">
            <h2>Crea el Producto</h2>

            <div class="row">
                <form class="col s12" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                <div class="row">

                    <div class="input-field col s3">
                    <i class="material-icons prefix">label</i>
                    <input id="icon_prefix" type="text" class="validate" name="sku" required>
                    <label for="icon_prefix">SKU</label>
                    </div>

                    <div class="input-field col s6">
                    <i class="material-icons prefix">dvr</i>
                    <input id="icon_prefix" type="text" class="validate" name="producto" required>
                    <label for="icon_prefix">Nombre del Producto</label>
                    </div>
                    
                    <div class="input-field col s3">
                    <i class="material-icons prefix">attach_money</i>
                    <input id="icon_prefix" type="number" class="validate" name="precio" required>
                    <label for="icon_prefix">Precio</label>
                    </div>
                    <div class="input-field col s12">
                        <select name="categoria">
                        <option value="" disabled selected>Seleccione una Categoria</option>
                        <?php foreach($catego as $cate):?>

                            <?php echo "<option value=" . $cate['id'] . ">" . $cate['categoria'] . "</option> ";?>

                        <?php endforeach;?>
                        </select>
                        <label>Categorias</label>
                    </div>

                    <div class="input-field col s9">
                    <i class="material-icons prefix">description</i>
                    <textarea id="textarea1" class="materialize-textarea" name="des" required></textarea>
                    <label for="textarea1">Descripción del Producto</label>
                    </div>

                    <div class="input-field col s3">
                    <i class="material-icons prefix">exposure_plus_1</i>
                    <input id="icon_prefix" type="number" class="validate" name="stock" required>
                    <label for="icon_prefix">Stock</label>
                    </div>

                    <div class="input-field col s12">
                    <i class="material-icons prefix">burst_mode</i>
                    <input id="icon_prefix" type="file" class="validate" name="img" required>
                    </div>
                </div>
                <div class="error" style="color: red; font-size: 20px;">
                    <ol>
                    <?php if(!empty($errores)):?>
                        <?php echo $errores;?>
                    <?php endif;?>
                    </ol>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Guardar Producto
                    <i class="material-icons right">add</i>
                </button>

                </form>
            </div>

        </div>

        <div id="ver" class="city wow slideInLeft" style="display:none">
            <h2>Productos</h2>
            <div class="row">

                <?php foreach($info as $producto):?>
                <div class="col s12 m3">
                    <div class="card">
                    <div class="card-image">
                        <img src="img/<?php echo $producto['img']?>" height = "200">
                        <span class="card-title">Producto: <?php echo $producto['nombre']?></span>
                    </div>
                    <div class="card-content">
                        <p><?php echo $producto['descri']; ?></p>
                    </div>
                    <div class="card-action">
                        <h4>Precio</h4>
                        <h5><?php echo $producto['precio']?></h5>
                        <h4>Stock</h4>
                        <h5><?php echo $producto['stock']?></h5>
                    </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>

        <div id="modi" class="city wow slideInLeft" style="display:none">
            <h2>Modificar Productos</h2>

            <div class="row">

                <?php foreach($info as $categoria):?>
                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-image">
                                <img src="img/<?php echo $categoria['img']?>" height = "200">
                                <span class="card-title">Producto: <?php echo $categoria['nombre']?></span>
                            </div>
                        <div class="card-content">
                            <p><?php echo $categoria['descri']; ?></p>
                        </div>
                            <div class="card-action">
                                <h4>Precio</h4>
                                <h5><?php echo $categoria['precio']?></h5>
                                <h4>Stock</h4>
                                <h5><?php echo $categoria['stock']?></h5>
                                <a href="modifiprodu.php?id=<?php echo $categoria["id"];?>" class="btn modal-trigger" style="border-radius: 20px;" title="Editar"> <i class="material-icons">create</i> </a>
                                
                                <form action="elimiprodu.php" style="display: inline-block;" method="POST" onsubmit="return confirm('Seguro que desea Eliminar el Producto: <?php echo $categoria['nombre'];?>');">
                                    <input type="hidden" name="id" value = "<?php echo $categoria["id_producto"];?>">
                                    <button type="submit" class="btn modal-trigger" style="background: red; border-radius: 20px;" title="Editar"> <i class="material-icons">delete</i> </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            
          
            </div>


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