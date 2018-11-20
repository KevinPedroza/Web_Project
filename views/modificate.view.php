<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar Categoria</title>

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
        //this is gonna start the principal functions of materialize css
        $(document).ready(function(){
            $('#modal1').modal();
            $('#modal1').modal('open'); 
        });
    </script>

</head>
<body>

    <!-- Modal Structure -->
    <div id="modal1" class="modal" style="text-align: center;">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">

            <div class="modal-content" style="text-align: center;">
            <h4>Modificar Categoria : <?php echo $categoria["categoria"];?></h4>
            <input type="text" name="newcate" value="<?php echo $categoria['categoria'];?>">
            <input type="hidden" name="oldid" value = "<?php echo $categoria['id'];?>">
            <input type="text" name="newdes" value="<?php echo $categoria['descripcion'];?>">
            <button type="submit" class="btn modal-trigger" title="Editar">Modificar Categoria<i class="material-icons">edit</i> </button>
            </div>
        
        </form>

    </div>

</body>
</html>