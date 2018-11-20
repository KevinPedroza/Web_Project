<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- this is gonna call the page's css -->
    <link rel="stylesheet" href="css/productosingle.css">
    <title>Detalles - Producto</title>
</head>
<body>  

    <script>
    //this is gonna establish the price according to the quantity
        function myFunction() {
            document.getElementById("preciototal").value = document.getElementById("total").value * <?php echo $info["precio"];?>;
        }
    </script>

    <!-- this is gonna call the header page -->
    <?php include "header.php";?>

    <script>
    //this is gonna start the principal functions of materialize css
            $(document).ready(function(){
            $('.materialboxed').materialbox();
        });
    </script>

    <!-- this is gonna take the page back -->
    <a href="vistaproductos.php?idcate=<?php echo $idcate;?>" style="border-radius: 25px; width:5%; margin-top:10px;" title="Regresar" class="btn"><i class="material-icons">arrow_back</i></a>
    
    <!-- this is gonna contain the main on the page containing the information of the producto to be bought -->
    <main style ="text-align:center; width=100%;">
        <div class="container"> 
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <h2>Producto - <?php echo $info["nombre"];?></h2>

                <div class="img" style="text-align:center;">
                    <img src="img/<?php echo $info["img"];?>" class="materialboxed" style="width:50%; margin:auto; border-radius:30px;" title="<?php echo $info["nombre"];?>">
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
                    <script>    
                         $(document).ready(function (){
                            $("input").keydown(function() {
                                return false
                            });
                        });
                    </script>
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