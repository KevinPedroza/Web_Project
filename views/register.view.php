<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/register2.css">
        <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <title>Register User</title>
</head>
<body>
    <!-- This is the principal container -->
    <div class="container">
        <!-- this is containing the image -->
        <div class="thumb wow fadeInRightBig">
            <img src="img/user.png" alt="" title="Add New User">
        </div>
        <!-- this is containing the inputs to get the information -->
        <div class="info wow bounceIn">
            <h2>Sing Up</h2>
            <div class="row">
                <!-- this form will call the php file to interact -->
                <form class="col s12" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="row">
                        <div class="input-field col s4">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" type="text" name="nombre" class="validate" required>
                        <label for="icon_prefix">Name</label>
                        </div>
                        <div class="input-field col s4">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="lastname" type="text" name="apellido" class="validate" required>
                        <label for="lastname">Las Name</label>
                        </div>
                        <div class="input-field col s4">
                        <i class="material-icons prefix">phone</i>
                        <input id="icon_telephone" type="number" name="telefono" class="validate" required>
                        <label for="icon_telephone">Telephone</label>
                        </div>
                        <div class="input-field col s6">
                        <i class="material-icons prefix">mail</i>
                        <input id="correo" type="email" name="correo" class="validate" required>
                        <label for="correo">Email</label>
                        </div>
                        <div class="input-field col s6">
                        <i class="material-icons prefix">location_on</i>
                        <input id="dire" type="text" name="dire" class="validate" required>
                        <label for="dire">Address</label>
                        </div>
                        <div class="input-field col s6">
                        <i class="material-icons prefix">lock</i>
                        <input id="pass" type="password" name="contra" class="validate" required>
                        <label for="pass">Password</label>
                        </div>
                        <div class="input-field col s6">
                        <i class="material-icons prefix">lock</i>
                        <input id="cpass" type="password" name="contra2" class="validate" required>
                        <label for="cpass">Confirm Password</label>
                        </div>
                    </div>
                    <div class="error">
                        <ol>
                        <?php if(!empty($errores)):?>
                            <?php echo $errores;?>
                        <?php endif;?>
                        </ol>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Register new User
                        <i class="material-icons right">send</i>
                    </button>
                </form>
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