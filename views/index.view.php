<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index2.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <title>Login</title>
</head>
<body>

    <!-- This is the principal container -->
    <div class="container">
        
    <!-- this is containing the inputs to get the information -->
        <div class="info wow slideInLeft">
            <div class="row">
            
            <!-- this form will call the php file to interact -->
            <form class="col s12" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h2>Log In</h2>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mail</i>
                        <input id="icon_prefix" type="email" class="validate" name="email" required>
                        <label for="icon_prefix">Email</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input id="icon_telephone" type="password" class="validate" name="password" required>
                        <label for="icon_telephone">Password</label>
                    </div>
                </div>
                <div class="error">
                    <ol>
                    <?php if(!empty($errores)):?>
                        <?php echo $errores;?>
                    <?php endif;?>
                    </ol>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Log In
                    <i class="material-icons right">send</i>
                </button>
            </form>
            <a href="register.php" class="link">Not Registerd Yet? Click Here!</a>
        </div>
                
        </div>

    </div>
    
    <!-- Compiled and minified JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/wow.min.js"></script>
    
    <!-- Activating the animations -->
    <script>
        new WOW().init();
    </script>
</body>
</html>