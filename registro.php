<?php
    require 'database.php';

    $message = '';

    $records = $conn->prepare('SELECT * FROM users WHERE email= :email');
    $records->bindParam(':email',$_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    if($results['email'] == $_POST['email']){
        

    }else{
        if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['username'])) {
            $sql = "INSERT INTO users (email, password, username, perfil, direccion) VALUES (:email, :password, :username, 'usuario', :direccion)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email',$_POST['email']);
            $stmt->bindParam(':username',$_POST['username']);
            $stmt->bindParam(':direccion',$_POST['direccion']);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $stmt->bindParam(':password',$password);
    
    
        if ($stmt->execute()){
            $message = 'Succesfully created new user'; 
        }
        else{
            $message = 'Sorry there must have been an isssue creating your account';
        }
            
        }
    }
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Registro</title>

      
<link rel="shortcut icon" href="assets/logo/favicon.svg">

      
    <link href="css/styles.css" rel="stylesheet" />
   
   <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   
<!-- Third party plugin CSS-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet"/>

    </head>
    <body>


    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        
        <div class= "container">
        
        
                    <a class="logo image-logo" href="index.php" title="Urbanatika" rel="home">
                        <img src="assets/logo/logo1.svg" alt="Urbanatika" style="width:40px;height:40px;">
        
                    </a>
                    </div>
                    </nav>

        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>



        
        <div class="page-section bg-primary " style="height:auto;  background-image: url('assets/imgs/register.png'); background-position: center;
background-repeat: no-repeat; background-attachment: scroll; background-size: cover;" id="Register">


        

        <div class="col-xl-5 col-lg-6 col-md-6 col-sm-10 col-xs-12 align col-aligncenter" id="loginlogout"  >

        <div class="box" >

        <div style=" padding-left: 2rem;
    padding-right: 2rem;
    padding-bottom: 2rem;
    padding-top:2rem; ">


        <h2 >Registrate</h2>
        <span >o <a href="login.php"> inicia sesión</a></span>
        <form   style=" width:100%;"   action="registro.php"  method="POST">
          
        <label style="margin-top:1rem;" for="email"> <b> Correo Electrónico: </b> </label><br>
        <input  style="width:100%; padding: 0.5rem  ;"    type="text" name="email" placeholder="Ingresa tu email"><br>
        
        <label style="margin-top:1rem;"  for="password"> <b>Contraseña:</b> </label><br>
        <input  style=" width:100%; padding: 0.5rem;  "   type="password" name="password" placeholder="Ingresa tu contraseña"><br>
        
        <label  style="margin-top:1rem;" for="username"> <b>Nombre de usuario: </b> </label><br>
        <input   style=" width:100%; padding: 0.5rem; "   type="text" name="username" placeholder="Ingresa nombre"><br>

        <label  style="margin-top:1rem;" for="direccion"> <b>Direccion: </b> </label><br>
        <input   style=" width:100%; padding: 0.5rem ; "   type="text" name="direccion" placeholder="Ingresa direccion"><br>
        
        
        <input style="margin-top:2rem !important; width:100%;"  class="btn btn-primary btn-xl js-scroll-trigger mt-2"   type="submit" value="Registrarme">
        </form>
        </div>
        </div>
    
   </div>
        </div>

 <!-- Bootstrap core JS-->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>


    </body>
</html>

