
<?php
    $message = '';
     session_start();
     require 'database.php';
     if (!isset($_SESSION['user_id'])) {
         header('Location: /php-login/');
     }elseif(isset($_SESSION['user_id'])){
        if (!empty($_POST['nombrep']) && !empty($_POST['descripcion']) && !empty($_POST['subtitulo']) && !empty($_POST['fecha_ini']) && !empty($_POST['fecha_fin']) && !empty($_POST['monto']) && !empty($_POST['link'])) {
            $sql = "INSERT INTO proyecto (nombrep, descripcion, subtitulo, fecha_ini, fecha_fin, monto, link) VALUES (:nombrep, :descripcion, :subtitulo, :fecha_ini, :fecha_fin, :monto, :link)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nombrep',$_POST['nombrep']);
            $stmt->bindParam(':descripcion',$_POST['descripcion']);
            $stmt->bindParam(':subtitulo',$_POST['subtitulo']);
            $stmt->bindParam(':fecha_ini',$_POST['fecha_ini']);
            $stmt->bindParam(':fecha_fin',$_POST['fecha_fin']);
            $stmt->bindParam(':monto',$_POST['monto']);
            $stmt->bindParam(':link',$_POST['link']);
    
    
        if ($stmt->execute()){
            $message = 'Proyect Succesfully created new user'; 
        }
        else{
            $message = 'Sorry there must have been an isssue creating your proyect';
        }
            
        }
     }
   

    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Agregar proyecto</title>

      
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



        
        <div class="page-section bg-primary " style="height:100hv;  background-image: url('assets/imgs/Background-proyecto.jpg'); background-position: center;
background-repeat: no-repeat; background-attachment: scroll; background-size: cover;" id="Register">


        

        <div class="col-xl-5 col-lg-6 col-md-6 col-sm-10 col-xs-12 align col-aligncenter" id="loginlogout"  >

        <div class="box" >

        <div style=" padding-left: 2rem;
    padding-right: 2rem;
    padding-bottom: 2rem;
    padding-top:2rem; ">


        <h2 >Registra tu proyecto</h2>
        <span >o <a href="index.php"> vuelve al inicio</a></span>

        <form   style=" width:100%;"   action="proyecto.php"  method="POST">
          
        <label style="margin-top:1rem;" for="nombrep"> <b> Nombre del Proyecto: </b> </label><br>
        <input  style="width:100%; padding: 0.5rem 1rem;"    type="text" name="nombrep" placeholder="Ingresa tu proyecto"><br>
        
        <label style="margin-top:1rem;"  for="descripcion"> <b>Ingrese descripción:</b> </label><br>
        <input  style=" width:100%; padding: 0.5rem 1rem;  "   type="text" name="descripcion" placeholder="Breve descripcion"><br>
        
        <label  style="margin-top:1rem;" for="subtitulo"> <b>Ingrese subtítulo: </b> </label><br>
        <input   style=" width:100%; padding: 0.5rem 1rem; "   type="text" name="subtitulo" placeholder="Ingresa subtitulo"><br>

        <label  style="margin-top:1rem;" for="fecha_ini"> <b>Fecha de inicio: </b> </label><br>
        <input   style=" width:100%; padding: 0.5rem 1rem; "   type="date" name="fecha_ini" placeholder="Ingresa fecha inicio "><br>

        <label  style="margin-top:1rem;" for="fecha_fin"> <b>Fecha de finalización: </b> </label><br>
        <input   style=" width:100%; padding: 0.5rem 1rem; "   type="date" name="fecha_fin" placeholder="Ingresa fecha de finalizaciòn "><br>

        <label  style="margin-top:1rem;" for="monto"> <b>Monto: </b> </label><br>
        <input   style=" width:100%; padding: 0.5rem 1rem; "   type="number" name="monto" placeholder="Ingresa monto "><br>

        <label  style="margin-top:1rem;" for="link"> <b>Link: </b> </label><br>
        <input   style=" width:100%; padding: 0.5rem 1rem; "   type="text" name="link" placeholder="Ingresa link "><br>
        
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


