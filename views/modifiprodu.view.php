<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar Producto</title>

    <!-- Compiled and minified CSS -->
    <script type="text/javascript"
        src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">


    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="css/categorias.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <script>
        $(document).ready(function(){
            $('#modal1').modal();
            $('#modal1').modal('open'); 
        });
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>

</head>
<body>

    <?php


    ?>
    <!-- Modal Structure -->
    <div id="modal1" class="modal" style="text-align: center;">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">

            <div class="row">
                <form class="col s12" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                <div class="row">
                    <h4>Modificar Producto : <?php echo $producto["nombre"];?></h4>
                    <input type="hidden" name="oldid" value ="<?php echo $producto['id'];?>">
                    <div class="input-field col s3">
                    <i class="material-icons prefix">label</i>
                    <input id="icon_prefix" type="text" class="validate" value ="<?php echo $producto['id_producto'];?>" name="sku" required>
                    <label for="icon_prefix">SKU</label>
                    </div>

                    <div class="input-field col s6">
                    <i class="material-icons prefix">dvr</i>
                    <input id="icon_prefix" type="text" class="validate" value ="<?php echo $producto['nombre'];?>" name="producto" required>
                    <label for="icon_prefix">Nombre del Producto</label>
                    </div>
                    
                    <div class="input-field col s3">
                    <i class="material-icons prefix">attach_money</i>
                    <input id="icon_prefix" type="number" class="validate" value ="<?php echo $producto['precio'];?>" name="precio" required>
                    <label for="icon_prefix">Precio</label>
                    </div>
                    <div class="input-field col s7">
                        <select name="categoria">
                        <option value="" disabled selected>Seleccione una Categoria</option>
                        <?php foreach($categorias as $cate):?>

                            <?php echo "<option value=" . $cate['id'] . ">" . $cate['categoria'] . "</option> ";?>

                        <?php endforeach;?>
                        </select>
                        <label>Categorias</label>
                    </div>
                    <input type="hidden" name="oldcate" value = "<?php echo $categoria['id'];?>">
                    <div class="input-field col s4">
                    <input id="cate" type="text" disabled value ="<?php echo $categoria['categoria'];?>" class="validate" name="precio" required>
                    <label for="cate">Categoria Seleccionada Anteriormente</label>
                    </div>

                    <div class="input-field col s9">
                    <i class="material-icons prefix">description</i>
                    <textarea id="textarea1" class="materialize-textarea" name="des" required><?php echo $producto['descri'];?></textarea>
                    <label for="textarea1">Descripción del Producto</label>
                    </div>

                    <div class="input-field col s3">
                    <i class="material-icons prefix">exposure_plus_1</i>
                    <input id="icon_prefix" type="number" class="validate" value ="<?php echo $producto['stock'];?>" name="stock" required>
                    <label for="icon_prefix">Stock</label>
                    </div>
                    <input type="hidden" name="oldimg" value="<?php echo $producto['img'];?>">
                    <div class="input-field col s12">
                    <i class="material-icons prefix">burst_mode</i>
                    <input id="icon_prefix" type="file" class="validate" name="img">
                    </div>
                </div>
                
                <button type="submit" class="btn modal-trigger" title="Editar">Modificar Producto / Regresar al Inicio<i class="material-icons">edit</i> </button>
            </form>
        </div>
    </div>

</body>
</html>