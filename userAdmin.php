
<?php include('database.php'); session_start();
 if (!isset($_SESSION['user_id'])) {
  header('Location: /php-login/');
}

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


if (isset($_SESSION['user_id']) && $perfil ==2) {
  header('Location: /php-login/');
}?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Actualizar información usuarios | </title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>


      
<link rel="shortcut icon" href="assets/logo/favicon.svg">

      
    <link href="css/styles.css" rel="stylesheet" />
   
   <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">

   
<!-- Third party plugin CSS-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet"/>






<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".content").fadeOut(1500);
    },3000);

});
</script>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        
        <div class= "container">
        
        
                    <a class="logo image-logo" href="index.php" title="Urbanatika" rel="home">
                        <img src="assets/logo/logo1.svg" alt="Urbanatika" style="width:40px;height:40px;">
        
                    </a>
                    </div>
                    </nav>



<!-- Begin page content -->

<div class="page-section bg-primary " style="height:100hv;" id="Register">
<div class="container">

<?php
    
if(isset($_POST['eliminar'])){

////////////// Actualizar la tabla /////////
$consulta = "DELETE FROM `users` WHERE `id`=:id";
$sql = $conn-> prepare($consulta);
$sql -> bindParam(':id', $id, PDO::PARAM_INT);
$id=trim($_POST['id']);

$sql->execute();

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();
echo "<div class='content alert alert-primary' > 
Gracias: $count registro ha sido eliminado  </div>";
}
else{
    echo "<div class='content alert alert-danger'> No se pudo eliminar el registro  </div>";

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>

<?php
    
if(isset($_POST['insertar'])){
///////////// Informacion enviada por el formulario /////////////
$email=$_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$username=$_POST['username'];
$perfil = $_POST['perfil'];
$direccion=$_POST['direccion'];
///////// Fin informacion enviada por el formulario /// 

////////////// Insertar a la tabla la informacion generada /////////
$sql="insert into users(email,password,username,perfil,direccion) values(:email,:password,:username,:perfil,:direccion)";
    
$sql = $conn->prepare($sql);
    
$sql->bindParam(':email',$email,PDO::PARAM_STR, 25);
$sql->bindParam(':password',$password,PDO::PARAM_STR, 25);
$sql->bindParam(':username',$username,PDO::PARAM_STR,25);
$sql->bindParam(':perfil',$perfil,PDO::PARAM_STR,25);
$sql->bindParam(':direccion',$direccion,PDO::PARAM_STR,25);
    
$sql->execute();

$lastInsertId = $conn->lastInsertId();
if($lastInsertId>0){

echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $username  </div>";
}
else{
    echo "<div class='content alert alert-danger'> No se pueden agregar datos, comuníquese con el administrador  </div>";

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>

<?php
    
if(isset($_POST['actualizar'])){
///////////// Informacion enviada por el formulario /////////////
$id=trim($_POST['id']);
$email=trim($_POST['email']);
$password = trim($_POST['password']);
$username=trim($_POST['username']);
$perfil=trim($_POST['perfil']);
$direccion = trim($_POST['direccion']);
///////// Fin informacion enviada por el formulario /// 

////////////// Actualizar la tabla /////////
$consulta = "UPDATE users
SET `email`= :email, `password` = :password, `username` = :username, `perfil` = :perfil, `direccion` = :direccion
WHERE `id` = :id";
$sql = $conn->prepare($consulta);
$sql->bindParam(':email',$email,PDO::PARAM_STR, 25);
$sql->bindParam(':password',$password,PDO::PARAM_STR, 25);
$sql->bindParam(':username',$username,PDO::PARAM_STR,25);
$sql->bindParam(':perfil',$perfil,PDO::PARAM_STR,25);
$sql->bindParam(':direccion',$direccion,PDO::PARAM_STR,25);
$sql->bindParam(':id',$id,PDO::PARAM_INT);

$sql->execute();

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();
echo "<div class='content alert alert-primary' > 

  
Gracias: $count registro ha sido actualizado  </div>";
}
else{
    echo "<div class='content alert alert-danger'> No se pudo actulizar el registro  </div>";

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>
  <h3 class="mt-5"  >Administrar usuario</h3>
  <hr>
  <div class="row">
  
  <!-- Insertar Registros-->
  <?php 
if (isset($_POST['formInsertar'])){?>
    <div class="col-12 col-md-12"> 
<form action="" method="POST">


  <div class="form-row">

    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input name="email" type="text" class="form-control" placeholder="Email" id=" Inserte email">
    </div>

    <div class="form-group col-md-6">
      <label for="password">Contraseña</label>
      <input name="password" type="password" class="form-control" id="password" placeholder="Inserte contraseña">
    </div>
  </div>


<div class="form-row">  

    <div class="form-group col-md-6">
      <label for="username">Nombre de Usuario</label>
      <input name="username" type="text" class="form-control" id="username" placeholder="Inserte nombre de usuario">
    </div>


    <div class="form-row">  

    <div class="form-group col-md-4">
    <label for="perfil">Perfil</label>
    <select required name="perfil" class="form-control" id="perfil">
    <option value="">Usuario/adiministrador</option>
    <option value="administrador">Administrador</option>
    <option value="usuario">Usuario</option>
    </select>
    </div>

    <div class="form-group col-md-4">
      <label for="direccion">Direccion</label>
      <input name="direccion" type="text" class="form-control" id="direccion" placeholder="Inserte direccion">
    </div>


    <div class="form-group col-md-4" style="margin-top:1.8rem !important;">

<button name="insertar" type="submit" class="btn btn-primary  btn-block">Guardar</button>
</div>


</div>

</form>
    </div> 
<?php }  ?>
<!-- Fin Insertar Registros-->


<?php 
if (isset($_POST['editar'])){
$id = $_POST['id'];
$sql= "SELECT * FROM users WHERE id = :id"; 
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT); 
$stmt->execute();
$obj = $stmt->fetchObject();
 
?>

    <div class="col-12 col-md-12"> 

<form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <input value="<?php echo $obj->id;?>" name="id" type="hidden">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input value="<?php echo $obj->email;?>" name="email" type="text" class="form-control" placeholder=" Inserte Email">
    </div>
    <div class="form-group col-md-6">
      <label for="password">Contraseña</label>
      <input  value="<?php echo $obj->password;?>" name="password" type="text" class="form-control" id="password" placeholder="Inserte Contraseña">
    </div>
  </div>
<div class="form-row">  
    <div class="form-group col-md-6">
      <label for="username">Nombre de usuario</label>
      <input value="<?php echo $obj->username;?>" name="username" type="text" class="form-control" id="username" placeholder="Inserte Nombre de usuario">
    </div>

  <div class="form-group col-md-6">
    <label for="perfil">Perfil</label>
    <select required name="perfil" class="form-control" id="perfil">
    <option value="<?php echo $obj->perfil;?>"><?php echo $obj->perfil;?></option>        
    <option value="">Seleccione opcion</option>
    <option value="administrador">Administrador</option>
    <option value="usuario">Usuario</option>
    </select>
  </div>
  <div class="form-group col-md-6">
  <label for="direccion">Direccion</label>
      <input value="<?php echo $obj->direccion;?>" name="direccion" type="text" class="form-control" id="direccion" placeholder="Direccion">

</div>
<div class="form-group "  style="margin-top:1.8rem !important; margin-left:0.5rem;">
  <button name="actualizar" type="submit" class="btn btn-primary  btn-block">Actualizar Registro</button>
</div>
</form>
    </div>  






    
<?php }?>
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->


<div style="float:right; margin-bottom:1rem; margin-top:4rem;">

<form action="" method="post"><button class="btn btn-primary" name="formInsertar">Nuevo registro</button>  <a href="userAdmin.php"><button type="button" class="btn btn-primary" style="background-color:#a6a6a6;  border:none">Cancelar</button></a></form></div>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="thead-dark">
    <th width="18%">Email</th>
    <th width="22%">Contraseña</th>
    <th width="22%">Nombre</th>
    <th width="14%">Perfil</th>
    <th width="13%">Direccion</th>
    <th width="13%" colspan="2"></th>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM users"; 
$query = $conn -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 

if($query -> rowCount() > 0)   { 
foreach($results as $result) { 
echo "<tr>
<td>".$result -> email."</td>
<td>".$result -> password."</td>
<td>".$result -> username."</td>
<td>".$result -> perfil."</td>
<td>".$result -> direccion."</td>
<td>
<form method='POST' action='".$_SERVER['PHP_SELF']."'>
<input type='hidden' name='id' value='".$result -> id."'>
<button class='btn btn-primary  btn-block' style='background-color:#a6a6a6; border:none' name='editar'>Editar</button>
</form>
</td>

<td>
<form  onsubmit=\"return confirm('Realmente desea eliminar el registro?');\" method='POST' action='".$_SERVER['PHP_SELF']."'>
<input type='hidden'  name='id' value='".$result -> id."'>
<button class='btn btn-primary  btn-block' style='background-color:#FF3333; border:none'  name='eliminar'>Eliminar</button>
</form>
</td>
</tr>";

   }
 }
?>
</tbody>
</table>
</div>
   </div>  
  </div>
 

      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 
  
</div>
<!-- Fin container -->
<footer class="footer">

</footer>

<!-- Bootstrap core JavaScript
    ================================================== --> 
<script src="dist/js/bootstrap.min.js"></script> 
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
