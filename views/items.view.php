<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de la Compra</title>
</head>
<body>
    
    <!-- this is gonna call the header of the page -->
    <?php include "header.php";?>

    <!-- this is gonna take the page back -->
    <section>
        <a href="vercompras.php" style="border-radius: 25px; margin-top:10px;" class="btn"><i class="material-icons">arrow_back</i></a>
    </section>

    <!-- this is gonna contain the sales of the customer -->
    <div class="container">

        <main>
            <table>
                <thead>
                    <tr>
                        <th>Cantidad</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><?php echo $venta["total"];?></td>
                        <td><?php echo $descri["descri"];?></td>
                        <td><?php echo $producto["precio"];?></td>
                    </tr>
                </tbody>
            </table>
        </main>

    </div>

</body>
</html>