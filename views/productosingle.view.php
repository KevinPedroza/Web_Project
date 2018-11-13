<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/productosingle.css">
    <title>Detalles - Producto</title>
</head>
<body>  

    <script>
        function myFunction() {
            document.getElementById("preciototal").value = document.getElementById("total").value * <?php echo $info["precio"];?>;
        }
    </script>

    <?php include "header.php";?>
    <a href="vistaproductos.php?idcate=<?php echo $idcate;?>" style="border-radius: 25px; width:5%; margin-top:10px;" title="Regresar" class="btn"><i class="material-icons">arrow_back</i></a>
    <main style ="text-align:center; width=100%;">
        <div class="container"> 
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <h2>Producto - <?php echo $info["nombre"];?></h2>

                <div class="img">
                    <img src="img/<?php echo $info["img"];?>" style="width:30%; border-radius:30px;" title="<?php echo $info["nombre"];?>">
                </div>

                <?php 
                    //this is gonna bring the category name
                    $sql = "SELECT categoria FROM categorias WHERE id = :cate;";
                    $info2 = $conexion->prepare($sql); 
                    $info2->execute(array(':cate' => $info["id_categoria"]));
                    $nombrecate = $info2->fetch();

                ?>

                <div class="descate">
                    <div class="descri">
                        <h4>Categoria</h4>
                        <p><?php echo $nombrecate["categoria"];?></p>
                    </div>

                    <div class="descri">
                        <h4>En Stock</h4>
                        <p><?php echo $info["stock"];?></p>
                    </div>

                    <div class="descri">
                        <h4>Descripción</h4>
                        <p><?php echo $info["descri"];?></p>
                    </div>
                </div>

                <div class="stock">
                    <div class="descri">
                        <h4>Cantidad</h4>
                        <input type="number" id = "total" oninput="myFunction()" name="cantidad" min="0" max="<?php echo $info["stock"];?>" placeholder="Cantidad">
                    </div>

                    <div class="descri">
                        <h4>Precio Producto</h4>
                        <p>$<?php echo $info["precio"];?></p>
                    </div>

                    <div class="descri">
                        <h4>Precio Total</h4>
                        <input type="number" placeholder = "Precio Total" name="preciototal" readOnly id="preciototal" >
                    </div>
                </div>
                <input type="hidden" name="idproducto" value = "<?php echo $info["id_producto"];?>">
                <input type="hidden" name="iduser" value = "<?php echo $nombre["id"];?>">
                <button type="submit" class = "btn" style="margin-bottom:15px;">Agregar Al carrito<i class = "material-icons">add_shopping_cart</i></button>
            </form>
        </div>
    </main>

</body>
</html>