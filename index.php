<?php 
    require 'database.php';
    session_start();

    
    $perfil="";

    if (isset($_SESSION['user_id'])) {
        $records = $conn->prepare('SELECT id, email, password, username, perfil, direccion FROM users WHERE id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if (count($results) > 0) {
            $user = $results;
        }

        switch ($results['perfil']) {
            case "administrador":
                $perfil=1;
                break;
            case "usuario":
                $perfil=2;
                break;
    
        }
    }


?>


<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Urbanatika</title>
<link rel="shortcut icon" href="assets/logo/favicon.svg">




<head>

    <link href="css/styles.css" rel="stylesheet" />
   
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">




<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    
 <!-- Third party plugin CSS-->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />

    <!--styles carrousel-->

    
	<link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">


   





    <meta charset="utf-8" />
    <title>URBANATIKA</title>
</head>




<body id="page-top">



<div class="social-body">
			<ul>
				<li class="urbanatika" ><a href="https://www.facebook.com/IndustriaAgroUrbana" target="_blank"><img src="assets/Iconos/side-bar/icono-facebook.svg" style="width:25px;height:25px;"></img></a></li>
			
				<li class="urbanatika"><a href="https://twitter.com/urbanatika" target="_blank"><img src="assets/Iconos/side-bar/icono-twitter.svg" style="width:25px;height:25px;"></img></a></li>
				<li class="urbanatika"><a href="https://www.instagram.com/urbanatika/" target="_blank"><img src="assets/Iconos/side-bar/icono-instagram.svg" style="width:25px;height:25px;"></img></a></li>
				<li class="urbanatika"><a href="https://www.youtube.com/channel/UCW7ZRWeQiwtsvLxTVEDhhAQ" target="_blank"><img src="assets/Iconos/side-bar/icono-youtube.svg" style="width:25px;height:25px;"></img></a></li>
			</ul>
		</div>



    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        
<div class= "container">


            <a class="logo image-logo" href="#page-top" title="Urbanatika" rel="home">
                <img src="assets/logo/logo1.svg" alt="Urbanatika" style="width:40px;height:40px;">

            </a>





            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
               
            
            
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                  
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#proyectos">Proyectos</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portafolio">Servicio</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#equipos">Equipo</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#footer">Contacto</a></li>

                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href=""></a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href=""></a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href=""></a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href=""></a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href=""></a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href=""></a></li>

                   
        
                    <?php if(!empty($user) && ($perfil == 1)): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="userAdmin.php">AdminUsers</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="proyectoAdmin.php">AdminProy</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="">Bienvenido: <?= $user['username']; ?></a></li>
 
                    <li class="nav-item"><a class="nav-link js-scroll-trigger"  href="logout.php">
                    Cerrar sesión
                    </a></li>
                    <?php elseif(!empty($user)): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="proyecto.php">Proyecto</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="">Bienvenido <?= $user['username']; ?></a></li>    
                        <li class="nav-item"><a class="nav-link js-scroll-trigger"  href="logout.php">
                        Cerrar sesión
                        </a></li>
                    <?php else: ?>

                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">Iniciar sesión</a></li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger"   href="registro.php">Registrarse</a></li>
                    <?php endif; ?>


                </ul>
            </div>
     </div>
    </nav>

    <!-- Landing-->
    <header class="masthead">


        <div class="container h-100">



            <div class="row h-100 ">
                <div class="col-lg-10 align-self-end">
                    <h2 class="text-white mb-4" style="font-weight: 700; font-size: 2.5rem;">Tu tierra, tu ciudad, tu familia.</h2>

                </div>

                <div class="col-lg-12 align-self-baseline">
                    <a class="btn btn-primary btn-xl js-scroll-trigger mt-2" style="margin-right:1rem;" href="https://app.payku.cl/botonpago/index?idboton=10987&verif=d7df6f1b">Contribuye</a>
                    <a class="btn btn-primary btn-xl js-scroll-trigger mt-2" style="background-color: transparent;float:inline-end; border: 2px solid white;" href=" #portafolio">Conoce más</a>
                </div>

            </div>
        </div>


    </header>



<section class="page-section" id="proyectos" style="padding-top:3rem;">
        <div class="container">

<!-- este es el que funciona regio estupendo 
        <div class="box" style="background-image: url('assets/imgs/proyecto1.png'); margin:2rem 4rem;">
               <div class= "col-md-6"style=" padding-left: 2rem;
                    padding-right: 2rem;
                    padding-bottom: 2rem; padding-top:2rem;">
          

<p style="color:white; opacity:65%; display: inline-block; font-size:12px">Biotecnología</p>

<p style="color:white; opacity:65% ; float:right; text-align: right;font-size:12px" ><img src="assets/Iconos/fi-rr-time-oclock.svg" style="width:12px;height:12px;opacity:65% ;" >Tiempo restante</p>

<h1 style="color: white ; margin-top:1rem; ">Insect Revolution</h1>
<p style="color:white"><i>Humanos e insectos cocreando</i></p>
<p style="color:white ; margin-top:2rem; "> Es un nuevo modelo económico regenerativo donde un grupo de personas invierten en su propia comunidad. En el cual, mediante la gestión de su basura se generan beneficios económicos para ellos, la comunidad y la empresa. </p>

<a style="color:white;  margin-top:2rem;  text-align: right;"  href="link de proyecto"><p>Saber más</p></a>

<a style=" width:100%; margin-top:3rem;" class="btn btn-primary btn-xl js-scroll-trigger" href="https://app.payku.cl/botonpago/index?idboton=13732&verif=eb0c9ca8">Contribuye</a>


                   </div>
                   </div>


                   -->





            <h4 style="color:#5b9150" class="text-left mb-3">Proyectos<hr/></h4>

           
		    <div class="row wow bounceInUp" >
                <div id="owl-demo" class="owl-carousel">

                 
              
         <div class="item" > 
             
         <div class="box" style="background-image: url('assets/imgs/proyecto1.png');">
               <div class= "col-md-6"style=" padding-left: 2rem;
                    padding-right: 2rem;
                    padding-bottom: 2rem; padding-top:2rem;">
          

<p style="color:white; opacity:65%; display: inline-block; font-size:12px">Biotecnología</p>

<p style="color:white; opacity:65% ; float:right; text-align: right;font-size:12px" ><img src="assets/Iconos/fi-rr-time-oclock.svg" style="width:12px;height:12px;opacity:65% ;" >Tiempo restante</p>

<h1 style="color: white ; margin-top:1rem; ">Insect Revolution</h1>
<p style="color:white; font-size:1.2rem"><i>Humanos e insectos cocreando</i></p>
<p style="color:white ; margin-top:2rem; "> Es un nuevo modelo económico regenerativo donde un grupo de personas invierten en su propia comunidad. En el cual, mediante la gestión de su basura se generan beneficios económicos para ellos, la comunidad y la empresa. </p>

<a style="color:white;  margin-top:2rem;  text-align: right;"  href="link de proyecto"><p>Saber más</p></a>


<a style=" width:100%; margin-top:3rem;" class="btn btn-primary btn-xl js-scroll-trigger" href="https://app.payku.cl/botonpago/index?idboton=13732&verif=eb0c9ca8">Contribuye</a>


<div class="progress" style=" margin-top:2rem;">
    <div class="progress-bar"    role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%;">
    </div>
  </div>
<div style=" margin-top:.5rem;">
  <p style="color:white; opacity:65%; display: inline-block; font-size:12px">300.000.000 recaudado</p>

<p style="color:white; opacity:65% ; float:right; text-align: right;font-size:12px" >100% logrado</p>
</div>

                   </div>
                   </div>

                    </div>



                       

                     
                   <div class="item" > 
             
                   <div class="box" style="background-image: url('assets/imgs/proyecto2.png');">
               <div class= "col-md-6"style=" padding-left: 2rem;
                    padding-right: 2rem;
                    padding-bottom: 2rem; padding-top:2rem;">
          
       

          <p style="color:white; opacity:65%; display: inline-block; font-size:12px">Biotecnología</p>

<p style="color:white; opacity:65% ; float:right; text-align: right;font-size:12px" ><img src="assets/Iconos/fi-rr-time-oclock.svg" style="width:12px;height:12px;opacity:65% ;" >Tiempo restante</p>

<h1 style="color: white ; margin-top:1rem; ">Insect Revolution</h1>
<p style="color:white; font-size:1.2rem"><i>Humanos e insectos cocreando</i></p>
<p style="color:white ; margin-top:2rem; "> Es un nuevo modelo económico regenerativo donde un grupo de personas invierten en su propia comunidad. En el cual, mediante la gestión de su basura se generan beneficios económicos para ellos, la comunidad y la empresa. </p>

<a style="color:white;  margin-top:2rem;  text-align: right;"  href="link de proyecto"><p>Saber más</p></a>


<a style=" width:100%; margin-top:3rem;" class="btn btn-primary btn-xl js-scroll-trigger" href="https://app.payku.cl/botonpago/index?idboton=13732&verif=eb0c9ca8">Contribuye</a>


<div class="progress" style=" margin-top:2rem;">
    <div class="progress-bar"    role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%;">
    </div>
  </div>
<div style=" margin-top:.5rem;">
  <p style="color:white; opacity:65%; display: inline-block; font-size:12px">300.000.000 recaudado</p>

<p style="color:white; opacity:65% ; float:right; text-align: right;font-size:12px" >100% logrado</p>
</div>

                   </div>
                   </div>





              
                       </div>
                           
    
                   
                 

                       <div class="item" > 
             
         
                       <div class="box" style="background-image: url('assets/imgs/proyecto3.png');">
               <div class= "col-md-6"style=" padding-left: 2rem;
                    padding-right: 2rem;
                    padding-bottom: 2rem; padding-top:2rem;">
          
       

          <p style="color:white; opacity:65%; display: inline-block; font-size:12px">Biotecnología</p>

<p style="color:white; opacity:65% ; float:right; text-align: right;font-size:12px" ><img src="assets/Iconos/fi-rr-time-oclock.svg" style="width:12px;height:12px;opacity:65% ;" >Tiempo restante</p>

<h1 style="color: white ; margin-top:1rem; ">Insect Revolution</h1>
<p style="color:white; font-size:1.2rem"><i>Humanos e insectos cocreando</i></p>
<p style="color:white ; margin-top:2rem; "> Es un nuevo modelo económico regenerativo donde un grupo de personas invierten en su propia comunidad. En el cual, mediante la gestión de su basura se generan beneficios económicos para ellos, la comunidad y la empresa. </p>

<a style="color:white;  margin-top:2rem;  text-align: right;"  href="link de proyecto"><p>Saber más</p></a>


<a style=" width:100%; margin-top:3rem;" class="btn btn-primary btn-xl js-scroll-trigger" href="https://app.payku.cl/botonpago/index?idboton=13732&verif=eb0c9ca8">Contribuye</a>


<div class="progress" style=" margin-top:2rem;">
    <div class="progress-bar"    role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%;">
    </div>
  </div>
<div style=" margin-top:.5rem;">
  <p style="color:white; opacity:65%; display: inline-block; font-size:12px">300.000.000 recaudado</p>

<p style="color:white; opacity:65% ; float:right; text-align: right;font-size:12px" >100% logrado</p>
</div>
                   </div>
                   </div>





              
                       </div>
                           
                       <div class="item" > 
             
         
                       <div class="box" style="background-image: url('assets/imgs/proyecto4.png');">
               <div class= "col-md-6"style=" padding-left: 2rem;
                    padding-right: 2rem;
                    padding-bottom: 2rem; padding-top:2rem;">       

<p style="color:white; opacity:65%; display: inline-block; font-size:12px">Biotecnología</p>

<p style="color:white; opacity:65% ; float:right; text-align: right;font-size:12px" ><img src="assets/Iconos/fi-rr-time-oclock.svg" style="width:12px;height:12px;opacity:65% ;" >Tiempo restante</p>

<h1 style="color: white ; margin-top:1rem; ">Insect Revolution</h1>
<p style="color:white; font-size:1.2rem"><i>Humanos e insectos cocreando</i></p>
<p style="color:white ; margin-top:2rem; "> Es un nuevo modelo económico regenerativo donde un grupo de personas invierten en su propia comunidad. En el cual, mediante la gestión de su basura se generan beneficios económicos para ellos, la comunidad y la empresa. </p>

<a style="color:white;  margin-top:2rem;  text-align: right;"  href="link de proyecto"><p>Saber más</p></a>


<a style=" width:100%; margin-top:3rem;" class="btn btn-primary btn-xl js-scroll-trigger" href="https://app.payku.cl/botonpago/index?idboton=13732&verif=eb0c9ca8">Contribuye</a>


<div class="progress" style=" margin-top:2rem;">
    <div class="progress-bar"    role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%;">
    </div>
  </div>
<div style=" margin-top:.5rem;">
  <p style="color:white; opacity:65%; display: inline-block; font-size:12px">300.000.000 recaudado</p>

<p style="color:white; opacity:65% ; float:right; text-align: right;font-size:12px" >100% logrado</p>
</div>

                   </div>
                   </div>





              
                       </div>
              
                       



                       <div class="item" > 
             
                       <div class="box" style="background-image: url('assets/imgs/proyecto5.png'); ">
               <div class= "col-md-6"style=" padding-left: 2rem;
                    padding-right: 2rem;
                    padding-bottom: 2rem; padding-top:2rem;">
                 

<p style="color:white; opacity:65%; display: inline-block; font-size:12px">Biotecnología</p>

<p style="color:white; opacity:65% ; float:right; text-align: right;font-size:12px" ><img src="assets/Iconos/fi-rr-time-oclock.svg" style="width:12px;height:12px;opacity:65% ;" >Tiempo restante</p>

<h1 style="color: white ; margin-top:1rem; ">Insect Revolution</h1>
<p style="color:white; font-size:1.2rem"><i>Humanos e insectos cocreando</i></p>
<p style="color:white ; margin-top:2rem; "> Es un nuevo modelo económico regenerativo donde un grupo de personas invierten en su propia comunidad. En el cual, mediante la gestión de su basura se generan beneficios económicos para ellos, la comunidad y la empresa. </p>

<a style="color:white;  margin-top:2rem;  text-align: right;"  href="link de proyecto"><p>Saber más</p></a>


<a style=" width:100%; margin-top:3rem;" class="btn btn-primary btn-xl js-scroll-trigger" href="https://app.payku.cl/botonpago/index?idboton=13732&verif=eb0c9ca8">Contribuye</a>


<div class="progress" style=" margin-top:2rem;">
    <div class="progress-bar"    role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%;">
    </div>
  </div>
<div style=" margin-top:.5rem;">
  <p style="color:white; opacity:65%; display: inline-block; font-size:12px">300.000.000 recaudado</p>

<p style="color:white; opacity:65% ; float:right; text-align: right;font-size:12px" >100% logrado</p>
</div>

                   </div>
                   </div>





              
                       </div>
                           




                       
                       <div class="item" > 
             
         
                       <div class="box" style="background-image: url('assets/imgs/proyecto6.png'); ">
               <div class= "col-md-6"style=" padding-left: 2rem;
                    padding-right: 2rem;
                    padding-bottom: 2rem; padding-top:2rem;">       

<p style="color:white; opacity:65%; display: inline-block; font-size:12px">Biotecnología</p>

<p style="color:white; opacity:65% ; float:right; text-align: right;font-size:12px" ><img src="assets/Iconos/fi-rr-time-oclock.svg" style="width:12px;height:12px;opacity:65% ;" >Tiempo restante</p>

<h1 style="color: white ; margin-top:1rem; ">Insect Revolution</h1>
<p style="color:white; font-size:1.2rem"><i>Humanos e insectos cocreando</i></p>
<p style="color:white ; margin-top:2rem; "> Es un nuevo modelo económico regenerativo donde un grupo de personas invierten en su propia comunidad. En el cual, mediante la gestión de su basura se generan beneficios económicos para ellos, la comunidad y la empresa. </p>

<a style="color:white;  margin-top:2rem;  text-align: right;"  href="link de proyecto"><p>Saber más</p></a>


<a style=" width:100%; margin-top:3rem;" class="btn btn-primary btn-xl js-scroll-trigger" href="https://app.payku.cl/botonpago/index?idboton=13732&verif=eb0c9ca8">Contribuye</a>


<div class="progress" style=" margin-top:2rem;">
    <div class="progress-bar"    role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%;">
    </div>
  </div>
<div style=" margin-top:.5rem;">
  <p style="color:white; opacity:65%; display: inline-block; font-size:12px">300.000.000 recaudado</p>

<p style="color:white; opacity:65% ; float:right; text-align: right;font-size:12px" >100% logrado</p>
</div>

                   </div>
                   </div>





              
                       </div>
                           
                                      







                       
     





 </div>
</div>



</div>
    </section>


   <!--sobre urbanatika-->

    <section class="page-section bg-dark" id="misionvalor">
        <div class="container align-items-center">



            <div class="col-sm-12 col-md-12 col-lg-6  col-aligncenter ">
                <div class="p-2">
                    <p class="text-white">
                       <b>Misión </b>  - Somos una fundación sin fines de lucro que integra tecnología para recuperar y valorizar los residuos orgánicos que genera la ciudad, utilizarla para reforestar y crear espacios vinculantes de cultivo urbano aplicando la tecnologia.


                    </p>

                </div>

            </div>

            <div class="col-sm-12  col-md-12 col-lg-6  col-aligncenter ">
                <div class="p-2">
                    <p class="text-white">
                        <b>Visión </b> - Ser la institución líder en cultivo urbano y compostaje inteligente, a través de la automatización, el IoT y control de procesos, mejorando la reutilización de los residuos orgánicos en el mercado nacional y latinoamericano.

                    </p>

                </div>

            </div>

        </div>



    </section>
                    


    <!--iconos-->
    <section class="page-section" style="background-color: #f4f4f4" id="beneficios">
        <div class="container">
            <div class="row text-center">



                <div class="  col-xs-12  col-sm-12 col-md-4 col-lg-4 center-content">
                    <div class="mt-5">

                        <img class="img-fluid mb-2" src="assets/Iconos/paisaje-urbano.svg" alt="" width="130" height="130">

                        <h5 style="color: #5b9150">Compostaje inteligente y Agricultura urbana IoT</h5>

                        <p>
                            Internet del Compostaje y Huertos Urbanos Automatizados para cultivar y forestar en comunidad.
                        </p>
                    </div>

                </div>

                <div class=" col-xs-12 col-sm-12 col-md-4 col-lg-4 center-content">
                    <div class="mt-5">

                        <img class="img-fluid mb-2" src="assets/Iconos/laptop.svg" alt="" width="130" height="130">


                        <h5 style="color: #5b9150">Software en la nube e Internet de las cosas</h5>


                        <p>
                            Diseñamos y desarrollamos nuestros propios hardware electrónico para monitorear variables del agro y compost como humedad, temperatura, pH.
                        </p>
                    </div>

                </div>

                <div class="  col-xs-12 col-sm-12 col-md-4 col-lg-4 center-content">
                    <div class="mt-5">

                        <img class="img-fluid mb-2" src="assets/Iconos/eco-phone.svg" alt="" width="130" height="130">


                        <h5 style="color: #5b9150" >Monitoreo y Control</h5>

                        <p>
                            Monitoreamos tu compostaje y cultivos urbanos, entregamos alertas tempranas, información de tu proceso y educación ambiental según normativa vigente.
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- Call to action-->
    <article class="p-6 text-white" id="asesoria">


        <div class="container text-center ">

            <h2 class="mb-2">La Tecnología al servicio de tu empresa y el medio ambiente.</h2>
            <p> Automatización verde y ecotecnologia como estrategía I+D+i y RSE.</p>
        </div>
    </article>

    <!-- portafolio urbanatika -->


    <section class="page-section" style="background-color: #f4f4f4" id="portafolio">
        <div class="container">
            <div class="row align-items-center">



                <div class="col-lg-6 col-md-6 col-sm-12 ">
                 
                    <div class="box" >

                          <img class="img-fluid"  style="border-top-left-radius: 0.3rem !important; border-top-right-radius: 0.3rem !important;"src="assets/imgs/empresa-industria-2.png" alt="">
                          <div style=" padding-left: 2rem;
                          padding-right: 2rem;
                          padding-bottom: 2rem; ">
                             

                        <h4 class="h4 mt-2 mb-2 paddings">Empresa e industria<hr/></h4>
                        <p style="margin-bottom:3rem;" >
                        Servicios de I+D tecnologico ambiental enfocados en el agro y compostaje para las empresas e industrias generadoras de residuos orgánicos, como casinos, industria de alimentos, ferias libres. 
                        </p>
                        
                        
                      <!--  <a  style="color:black; text-align: right; " href="link de proyecto"><p>Conoce más <img src="assets/Iconos/fi-rr-angle-right.svg" style="width:12px;height:12px;" >  </p></a>
-->


</div>

                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 ">
                  
                    <div class="box">
    <img class="img-fluid" style="border-top-left-radius: 0.3rem !important; border-top-right-radius: 0.3rem !important;" src="assets/imgs/Municipio-1.png" alt="">
                      
    <div style=" padding-left: 2rem;
    padding-right: 2rem;
    padding-bottom: 2rem; ">
       
                        <h4 class="h4 mt-2 mb-2 paddings">Municipio<hr/></h4>
                        <p style="margin-bottom:2rem;"  >
                            Servicio de huertos urbanos automatizados para cultivar en la ciudad y aprender de la agricultura junto a vecinos y el internet del compostaje para hacer gestión de la basura orgánica mediante sensores de internet.
                        </p>
                        <!--  <a  style="color:black; text-align: right; " href="link de proyecto"><p>Conoce más <img src="assets/Iconos/fi-rr-angle-right.svg" style="width:12px;height:12px;" >  </p></a>
                  
                  -->
                  
                  
                    </div>
                </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 ">
                  
                    <div class="box">
                    <img class="img-fluid" style="border-top-left-radius: 0.3rem !important; border-top-right-radius: 0.3rem !important;" src="assets/imgs/casa-comunidad-1.png" alt="">

                    <div style=" padding-left: 2rem;
                    padding-right: 2rem;
                    padding-bottom: 2rem; ">
                       
                        <h4 class="h4 mt-2 mb-2 paddings">Casa y comunidades<hr/></h4>
                        <p style="margin-bottom:2rem;" >
                            Composteros con sensores IoT conectados a la plataforma urbanatika para recuperar y valorizar la basura orgánica en comunidad y transformar los espacios urbanos con el compost y humus generado.

                        </p>
                       <!--   <a  style="color:black; text-align: right;  " href="link de proyecto"><p>Conoce más <img src="assets/Iconos/fi-rr-angle-right.svg" style="width:12px;height:12px;" >  </p></a>
-->
               
               
                    </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 ">
                   
                    <div class="box">
 <img class="img-fluid" style="border-top-left-radius: 0.3rem !important; border-top-right-radius: 0.3rem !important;" src="assets/imgs/educacion-1.png" alt="">


<div style=" padding-left: 2rem;
 padding-right: 2rem;
 padding-bottom: 2rem; ">
    
                        <h4 class="h4 mt-2 mb-2 paddings">Educación<hr/></h4>
                        <p style="margin-bottom:2rem;" >
                            Brindamos una experiencia de aprendizaje en torno a la innovación agrícola pero para la ciudad. Los jóvenes de colegios conocen sobre Internet de las cosas y compostaje y sus beneficios por medio de la tecnología
                        </p>
                       <!--   <a  style="color:black; text-align: right; " href="link de proyecto"><p>Conoce más  <img src="assets/Iconos/fi-rr-angle-right.svg" style="width:12px;height:12px;" > </p>
                      </a>
-->




</div>
                    </div>
                </div>


            </div>
        </div>

    </section>


    <article class="p-6  text-white" id="nube">


        <div class="container col-lg-6 text-center">

            <h1 class="mb-3">Plataforma en la Nube (SaaS)</h1>
            <p> Nuestra plataforma en la nube te permite monitorear el estado de tu compostaje y cultivo desde cualquier lugar acompañando cada paso del ciclo del compostaje y cultivo inteligente.</p>
        </div>
    </article>


 


   



    <section class="page-section" id=equipos style="padding-bottom:2rem; padding-top:4rem;">

    <div class="container">
        
    <h4 style="color:#5b9150; " class="text-left">Equipo de Urbanatika<hr/></h4>

<div class="text-left">

    <button class="tablink" onclick="openPage('Directiva', this, ' #A6DB67')" id="defaultOpen" style=" 
    border-color: none !important;">Directiva</button>
<button class="tablink" onclick="openPage('Bio-Bio', this, ' #A6DB67')"style=" 
    border-color: none !important;" >Bio-Bio</button>
<button class="tablink" onclick="openPage('Historicos', this, ' #A6DB67')"style=" 
    border-color: none !important;">Históricos</button>
<button class="tablink" onclick="openPage('ILabs', this, ' #A6DB67')"style=" border-color: none !important;">ILabs</button>
<button class="tablink" onclick="openPage('Insect', this, ' #A6DB67')"style=" border-color: none !important;">Insect-Revolution</button>
 
 </div>


<div id="Directiva" class="tabcontent">
 <div class="row align-items-center col-aligncenter text-center" style="margin-top:5rem;" >


               
               
        <div class="col-lg-3 col-md-6 col-sm-12 col-aligncenter">
        
       
        <img  class="img-responsive img-rounded  mb-2" style="border-radius: 180px;"src="assets/imgs/Equipo/Nelson-Elorza-Rivera.jpg" alt="a"   width="180" height="180">
  
       <p class="mb-0   mt-2" style="color:black"><b>Nelson Elorza Rivera</b></p>
        <p class="mb-4"  style="color:black" ><i>Directivo</i></p>
         </div>


    <div class="col-lg-3 col-md-6 col-sm-12 col-aligncenter">
          
       
          <img  class="img-responsive img-rounded  mb-2"  style="border-radius: 180px;" src="assets/imgs/Equipo/Karla-Elorza-Rivera.png" alt="a"  width="180" height="180">
     
         <p class="mb-0   mt-2" style="color:black"><b>Karla Elorza Rivera</b></p>
          <p class="mb-4"  style="color:black" ><i>Directiva</i></p>
      </div>


      <div class="col-lg-3 col-md-6 col-sm-12 col-aligncenter ">
       
     
           <img class="img-responsive img-rounded  mb-2" src="assets/imgs/Equipo/Valentina-Elorza-Rivera.jpg" style=" border-radius: 180px;"  alt="a"   width="180" height="180">
    
       <p class="mb-0   mt-2" style="color:black"><b>Valentina Elorza Rivera</b></p>
     <p class="mb-4"  style="color:black" ><i>Directiva</i></p>
       </div>

      <div class="col-lg-3 col-md-6 col-sm-12 col-aligncenter ">
       
       <a href="https://www.linkedin.com/in/diegoelorza/">
           <img class="img-responsive img-rounded  mb-2" src="assets/imgs/Equipo/Diego-Elorza-Rivera.jpg" style=" border-radius: 180px;"  alt="a"   width="180" height="180">
       </a>
       <p class="mb-0  mt-2" style="color:black"><b>Diego Elorza Rivera</b></p>
       <p class="mb-4"  style="color:black" ><i>Directivo</i></p>
        </div>

         
         </div>
         </div>



<div id="Bio-Bio" class="tabcontent">
<div class=" row align-items-center col-aligncenter text-center" style="margin-top:5rem;">

              
               
<div class="col-lg-3 col-md-6 col-sm-12 col-aligncenter">
           <a href="https://www.linkedin.com/in/gustavo-fuentes-3843995a/">
        <img  class="img-responsive img-rounded  mb-2" style="border-radius: 180px;"src="assets/imgs/Equipo/Gustavo-Fuentes.jpg" alt="a"   width="180" height="180">
    </a>
       <p class="mb-0   mt-2" style="color:black"><b>Gustavo Fuentes</b></p>
        <p class="mb-4"  style="color:black" ><i>Urbanatika Bio-Bio</i></p>
    </div>

          <div class="col-lg-3 col-md-6 col-sm-12 col-aligncenter">
                      
                      <a href="https://www.linkedin.com/in/sebasti%C3%A1n-reyes-aros-37b180116/?originalSubdomain=cl">
                      <img  class="img-responsive img-rounded  mb-2" style="border-radius: 180px;" src="assets/imgs/Equipo/Sebastian-Reyes.jpg" alt="a"    width="180" height="180">
                  </a>
                     <p class="mb-0   mt-2" style="color:black"><b>Sebastián Reyes Aros</b></p>
                      <p class="mb-4"  style="color:black" ><i>Equipo Urbanatika Bio-Bio</i></p>
                  </div>


                  <div class="col-lg-3 col-md-6 col-sm-12 col-aligncenter">
                      
                      <a href="https://www.linkedin.com/in/esteban-torres-caama%C3%B1o-038aa8189/">
                      <img  class="img-responsive img-rounded  mb-2" style="border-radius: 180px;" src="assets/imgs/Equipo/Esteban-Torres.jpg" alt="a"    width="180" height="180">
                  </a>
                     <p class="mb-0   mt-2" style="color:black"><b>Esteban Torres Caamaño</b></p>
                      <p class="mb-4"  style="color:black" ><i>Equipo Urbanatika Bio-Bio</i></p>
                  </div>


                  <div class="col-lg-3 col-md-6 col-sm-12 col-aligncenter">
                      
                      <a href="https://www.linkedin.com/in/gonzalo-chac%C3%B3n-labb%C3%A8-a735218b">
                      <img  class="img-responsive img-rounded  mb-2" style="border-radius: 180px;" src="assets/imgs/Equipo/Gonzalo-Chacon-Labbe.jpeg" alt="a"    width="180" height="180">
                  </a>
                     <p class="mb-0   mt-2" style="color:black"><b>Gonzalo Chacón Labbé</b></p>
                      <p class="mb-4"  style="color:black" ><i>Equipo Urbanatika Bio-Bio</i></p>
                  </div>



                  </div>

                     </div>



<div id="Historicos" class="tabcontent">
<div class=" row align-items-center col-aligncenter text-center" style="margin-top:5rem;">

             
                
                  <div class="col-lg-3 col-md-6 col-sm-12 col-aligncenter">
                      
                      <a href="https://www.linkedin.com/in/carolina-callpa-guzm%C3%A1n-530a4859/">
                      <img  class="img-responsive img-rounded  mb-2"  style="border-radius: 180px;" src="assets/imgs/Equipo/carolina-callpa.jpeg" alt="a"    width="180" height="180">
                  </a>
                     <p class="mb-0   mt-2" style="color:black"><b>Carolina Callpa Guzmán</b></p>
                      <p class="mb-4"  style="color:black" ><i>Equipo Histórico</i></p>
                  </div>
                  


                  <div class="col-lg-3 col-md-6 col-sm-12 col-aligncenter">
                    
                      <a href="https://www.linkedin.com/in/gonzalo-quiroga-quintanilla-7b215212b/">
                      <img  class="img-responsive img-rounded  mb-2" style="border-radius: 180px;" src="assets/imgs/Equipo/Gonzaloko.jpg" alt="a"    width="180" height="180">
                  </a>
                     <p class="mb-0   mt-2" style="color:black"><b>Gonzalo Quiroga Quintanilla</b></p>
                      <p class="mb-4"  style="color:black" ><i>Equipo histórico</i></p>
                  </div>


                  <div class="col-lg-3 col-md-6 col-sm-12 col-aligncenter">
                    
                    <a href="https://www.linkedin.com/in/sof%C3%ADa-rojas-pizarro-5348b4a4/">
                    <img  class="img-responsive img-rounded  mb-2" style="border-radius: 180px;" src="assets/imgs/Equipo/Sofia-Rojas.png" alt="a"    width="180" height="180">
                </a>
                   <p class="mb-0   mt-2" style="color:black"><b>Sofìa Rojas Pizarro</b></p>
                    <p class="mb-4"  style="color:black" ><i>Equipo histórico</i></p>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-12 col-aligncenter">
                    
                    <a href="https://www.linkedin.com/in/rodrigo-donoso-fernandez-009658a5/">
                    <img  class="img-responsive img-rounded  mb-2" style="border-radius: 180px;" src="assets/imgs/Equipo/Rodrigo-Donoso.jpeg" alt="a"   width="180" height="180">
                </a>
                   <p class="mb-0   mt-2" style="color:black"><b>Rodrigo Donoso</b></p>
                    <p class="mb-4"  style="color:black" ><i>Equipo histórico</i></p>
                </div>
  



</div>
</div>

<div id="ILabs" class="tabcontent">
<div class=" row align-items-center col-aligncenter text-center" style="margin-top:5rem;">
                   

<div class="col-lg-3 col-md-6 col-sm-12 col-aligncenter">
                      
                      <a href="Link de linkedin">
                      <img  class="img-responsive img-rounded  mb-2"  style="border-radius: 180px;" src="assets/imgs/Equipo/PabloR.jpg" alt="a"    width="180" height="180">
                  </a>
                     <p class="mb-0   mt-2" style="color:black"><b>Pablo R</b></p>
                      <p class="mb-4"  style="color:black" ><i>Equipo Industriales Labs</i></p>
                  </div>

                  

                  <div class="col-lg-3 col-md-6 col-sm-12 col-aligncenter">
                      
                      <a href="Link de linkedin">
                      <img  class="img-responsive img-rounded  mb-2"  style="border-radius: 180px;" src="assets/imgs/Equipo/cristina-cid.jpeg" alt="a"    width="180" height="180">
                  </a>
                     <p class="mb-0   mt-2" style="color:black"><b>Cristina Cid</b></p>
                      <p class="mb-4"  style="color:black" ><i>Equipo Industriales Labs</i></p>
                  </div>

                                    

<div class="col-lg-3 col-md-6 col-sm-12 col-aligncenter">
                      
                      <a href="Link de linkedin">
                      <img  class="img-responsive img-rounded  mb-2"  style="border-radius: 180px;" src="assets/imgs/Equipo/cristhian-rojas.jpeg" alt="a"    width="180" height="180">
                  </a>
                     <p class="mb-0   mt-2" style="color:black"><b>Christian Rojas</b></p>
                      <p class="mb-4"  style="color:black" ><i>Equipo Industriales Labs</i></p>
                  </div>

                                    

<div class="col-lg-3 col-md-6 col-sm-12 col-aligncenter">
                      
                      <a href="Link de linkedin">
                      <img  class="img-responsive img-rounded  mb-2"  style="border-radius: 180px;" src="assets/imgs/Equipo/nicolas-rojas.jpeg" alt="a"    width="180" height="180">
                  </a>
                     <p class="mb-0   mt-2" style="color:black"><b>Nicolás Rojas</b></p>
                      <p class="mb-4"  style="color:black" ><i>Equipo Industriales Labs</i></p>
                  </div>



                


</div>
</div>







<div id="Insect" class="tabcontent">
 <div class="row align-items-center col-aligncenter text-center" style="margin-top:5rem;" >


               
               
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 col-aligncenter">
        
        <a href="https://www.linkedin.com/in/valentina-mu%C3%B1oz-zapata-40a20053/">
        <img  class="img-responsive img-rounded  mb-2" style="border-radius: 180px;"src="assets/imgs/Equipo/Valentina-Munoz.jpg" alt="a"   width="180" height="180">
    </a>
       <p class="mb-0   mt-2" style="color:black"><b>Valentina Muñoz Zapata</b></p>
        <p class="mb-4"  style="color:black" ><i>Chief Education Officer</i></p>
         </div>


    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 col-aligncenter">
          
          <a href="https://www.linkedin.com/in/jose-del-solar-bou-208465200/">
          <img  class="img-responsive img-rounded  mb-2"  style="border-radius: 180px;" src="assets/imgs/Equipo/Jose-del-solar.jpg" alt="a"  width="180" height="180">
      </a>
         <p class="mb-0   mt-2" style="color:black"><b>Jose Del Solar</b></p>
          <p class="mb-4"  style="color:black" ><i>CEO & Fundador</i></p>
      </div>


      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 col-aligncenter ">
       
       <a href="https://www.linkedin.com/in/rocio-espinosa-torres-29bb04202/">
           <img class="img-responsive img-rounded  mb-2" src="assets/imgs/Equipo/Rocio-Espinosa.jpg" style=" border-radius: 180px;"  alt="a"   width="180" height="180">
       </a>
       <p class="mb-0   mt-2" style="color:black"><b>Rocío Espinosa Torres</b></p>
     <p class="mb-4"  style="color:black" ><i>COO</i></p>
       </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 col-aligncenter ">
       
       <a href="https://www.linkedin.com/in/daniel-troncoso-espinosa-b87a8ba7/">
           <img class="img-responsive img-rounded  mb-2" src="assets/imgs/Equipo/Daniel-Troncoso.jpg" style=" border-radius: 180px;"  alt="a"   width="180" height="180">
       </a>
       <p class="mb-0  mt-2" style="color:black"><b>Daniel Troncoso Espinosa</b></p>
       <p class="mb-4"  style="color:black" ><i>Fundador</i></p>
        </div>

         
         </div>
         </div>








                    </div>
</section>







<section class="page-section">


<div class="container mb-4 text-center" >

<div class="row align-items-center col-aligncenter">



<div class= "col-lg-2 col-md-3 col-sm-6 col-aligncenter ">
<img src="assets/imgs/asociados/reciclame.png" alt="" href=""   width="90px">
</div>


<div class= "col-lg-2 col-md-3 col-sm-6 col-aligncenter "   style="">
<img src="assets/imgs/asociados/fia.png"  alt="" href=""   width="75px">
</div>

<div class= "col-lg-2 col-md-3 col-sm-12 col-aligncenter ">
<img src="assets/imgs/asociados/ibmplex.png" alt="" href=""   width="170px">
</div>

<div class= "col-lg-2 col-md-3 col-sm-12 col-aligncenter ">
<img src="assets/imgs/asociados/inacap.png" alt="" href=""   width="170px">
</div>

<div class= "col-lg-2 col-md-3 col-sm-12 col-aligncenter ">
<img src="assets/imgs/asociados/corfo1.png" alt="" href=""   width="140px">
</div>
    
       </div>  

       </div>        
</section>


    <!-- Footer-->
    <footer class="bg-dark py-5" id="footer">
        <div class="container">



            <div class="row align-items-center">


                <div class="col-sm-12  col-md-4  col-lg-3 col-aligncenter center-content">
                    <div class="mt-5">

                        <img class="img-fluid" src="assets/logo/logofooter.svg" alt="" width="180" >


                    </div>
                </div>




                <div class="col-sm-12  col-md-4  col-lg-3 col-aligncenter  align-items-center">
                    <div class="mt-5">
                        <a href="https://www.google.com/maps/place/Sta.+Rosa+de+Santiago+576,+Lampa,+Regi%C3%B3n+Metropolitana/@-33.2720725,-70.7503904,17z/data=!3m1!4b1!4m5!3m4!1s0x9662beec22f05bf9:0x9d6709298fa87f7c!8m2!3d-33.2720725!4d-70.7482017">
                            <p class="text-white-75">
                                <b>Dirección </b> <br>
                                Sta. Rosa de Santiago 576
                                Lampa, Región Metropolitana
                            </p>
                            </a>
                    </div>
                </div>

                <div class=" col-sm-12  col-md-4  col-lg-3 col-aligncenter align-items-center">
                    <div class="mt-5">

                        <p class="text-white-75">
                            <b> Contacto</b><br>contacto@urbanatika.com<br>
                            +569 49 78 6439
                        </p>

                    </div>
                </div>



            </div>
        </div>

    </footer>




    <section class="bg-dark"> 
<div class="container p-2">    
<p class="text-white" style="text-align:center;opacity:65%; font-size: 12px;  ">Página web programada y diseñada por Felipe Fuenzalida De La Fuente, Javiera Valenzuela Escobar, Tomás Hernández Martí, Pablo Ruz  <p> </div> </section>











    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    
 <!-- Javascript  carousel Library Files -->

 <script src="js/jquery-1.10.2.js"></script>
 <script src="js/owl.carousel.js"></script>
 <script src="js/script.js"></script>
 <script src="js/wow.min.js"></script>
 <script src="js/jquery.magnific-popup.js"></script> 


<!-- equipo script -->

<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
  
    
</body>
</html>