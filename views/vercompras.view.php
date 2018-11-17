<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe de Compras - KevinShop</title>
</head>
<body>

    <?php include "header.php";?>

    <div class="container">

        <main>
            <table>
                <thead>
                    <tr>
                        <th>Fecha de Compra</th>
                        <th>Total de la Orden</th>
                        <th>Items</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($cliente as $ventas):?>
                        <tr>
                            <td><?php echo $ventas["fecha"];?></td>
                            <td>$ <?php echo $ventas["cantidad"];?></td>
                            <td><a href="items.php?idventa=<?php echo $ventas["id"];?>">Ver Más<i class="material-icons left">more_vert</i></a></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </main>
    
    </div>

</body>
</html>