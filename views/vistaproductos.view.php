<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
</head>
<body>  

    <?php include "header.php";?>

    <main style="text-align:center;">
    <h2>Productos</h2>
        <div class="row">
            <?php foreach($info as $producto):?>
                    <div class="col s12 m2">
                        <div class="card">
                        <div class="card-image">
                            <img src="img/<?php echo $producto['img']?>" height = "200">
                            <span class="card-title">Producto: <?php echo $producto['nombre'];?></span>
                            <a href="productosingle.php?idpro=<?php echo $producto["id_producto"];?>&idcate=<?php echo $idcate;?>" class="btn-floating halfway-fab waves-effect waves-light red" title = "Ver detalles"><i class="material-icons">add</i></a>
                        </div>
                        </div>
                    </div>
            <?php endforeach;?>
        </div>
    </main>

</body>
</html>