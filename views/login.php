

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="views/css/estilologin.css">
 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/solid.css" integrity="sha384-r/k8YTFqmlOaqRkZuSiE9trsrDXkh07mRaoGBMoDcmA58OHILZPsk29i2BsFng1B" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/fontawesome.css" integrity="sha384-4aon80D8rXCGx9ayDt85LbyUHeMWd3UiBaWliBlJ53yzm9hqN21A+o1pqoyK04h+" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form method="post">
      
            <div class="div_img">
                <img src="views/images/avatar.png" alt="">
            </div>
            <div class="div_titulo">
                <label for="" class="titulo">Inicio de Sesión</label>
            </div>
            <div class="form_input div_user">
                <input type="text" class="" name="username" placeholder="Correo" required>
            </div>
            <div class="form_input div_pass">
                <input type="password" name="password" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="bgcolor section"><i class="fas fa-sign-in-alt"></i>  Ingresar</button>
                        
          
           

        </form>
        <?php
            if(isset($errorLogin)){
                echo $errorLogin;
            }
        ?>
    </div>
</body>
</html>