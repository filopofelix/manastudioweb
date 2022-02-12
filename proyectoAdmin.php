<?php include('database.php');
 session_start();
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
}

switch ($results['perfil']) {
    case "administrador":
        $perfil=1;
        break;
    case "usuario":
        $perfil=2;
        break;

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
<title>Actualizar información proyectos | </title>

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
$consulta = "DELETE FROM `proyecto` WHERE `id`=:id";
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

$nombrep = $_POST['nombrep'];
$id_usu=$_SESSION['user_id'];
$descripcion=$_POST['descripcion'];
$subtitulo = $_POST['subtitulo'];
$fecha_ini=$_POST['fecha_ini'];
$fecha_fin=$_POST['fecha_fin'];
$monto=$_POST['monto'];
$link=$_POST['link'];
///////// Fin informacion enviada por el formulario /// 

////////////// Insertar a la tabla la informacion generada /////////
$sql="insert into proyecto(nombrep, id_usu, descripcion, subtitulo, fecha_ini, fecha_fin, monto, link) VALUES (:nombrep, :id_usu, :descripcion, :subtitulo, :fecha_ini, :fecha_fin, :monto, :link)";
    
$sql = $conn->prepare($sql);
    
$sql->bindParam(':nombrep',$nombrep,PDO::PARAM_STR, 25);
$sql->bindParam(':id_usu',$id_usu,PDO::PARAM_STR, 25);
$sql->bindParam(':descripcion',$descripcion,PDO::PARAM_STR,25);
$sql->bindParam(':subtitulo',$subtitulo,PDO::PARAM_STR,25);
$sql->bindParam(':fecha_ini',$fecha_ini,PDO::PARAM_STR,25);
$sql->bindParam(':fecha_fin',$fecha_fin,PDO::PARAM_STR,25);
$sql->bindParam(':monto',$monto,PDO::PARAM_STR,25);
$sql->bindParam(':link',$link,PDO::PARAM_STR,25);
    
$sql->execute();

$lastInsertId = $conn->lastInsertId();
if($lastInsertId>0){

echo "<div class='content alert alert-primary' > Gracias .. proyecto es : $nombrep  </div>";
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
$nombrep =trim($_POST['nombrep']);
$id_usu=trim($_POST['id_usu']);
$descripcion=trim($_POST['descripcion']);
$subtitulo=trim($_POST['subtitulo']);
$fecha_ini=trim($_POST['fecha_ini']);
$fecha_fin=trim($_POST['fecha_fin']);
$monto=trim($_POST['monto']);
$link=trim($_POST['link']);

///////// Fin informacion enviada por el formulario /// 

////////////// Actualizar la tabla /////////
$consulta = "UPDATE proyecto
SET `nombrep`= :nombrep, `id_usu` = :id_usu, `descripcion` = :descripcion, `subtitulo` = :subtitulo, `fecha_ini` = :fecha_ini, `fecha_fin` = :fecha_fin, `monto` = :monto, `link` = :link
WHERE `id_usu` = :id_usu";
$sql = $conn->prepare($consulta);
$sql->bindParam(':nombrep',$nombrep,PDO::PARAM_STR, 25);
$sql->bindParam(':id_usu',$id_usu,PDO::PARAM_STR, 25);
$sql->bindParam(':descripcion',$descripcion,PDO::PARAM_STR,25);
$sql->bindParam(':subtitulo',$subtitulo,PDO::PARAM_STR,25);
$sql->bindParam(':fecha_ini',$fecha_ini,PDO::PARAM_STR,25);
$sql->bindParam(':fecha_fin',$fecha_fin,PDO::PARAM_STR,25);
$sql->bindParam(':monto',$monto,PDO::PARAM_STR,25);
$sql->bindParam(':link',$link,PDO::PARAM_STR,25);
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
  <h3 class="mt-5">Administrar Proyectos</h3>
  <hr>
  <div class="row">
  
  <!-- Insertar Registros-->
  <?php 
if (isset($_POST['formInsertar'])){?>
    <div class="col-12 col-md-12"> 
<form action="" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombrep">Nombre Proyecto:</label>
      <input name="nombrep" type="text" class="form-control" placeholder="nombrep" id="nombrep">
    </div>
    <div class="form-group col-md-6">
      <label for="id_usu">Id_dueño</label>
      <input name="id_usu" value="<?php echo $_SESSION['user_id'];?>" type="number" class="form-control" id="id_usu" placeholder="id_usu">
    </div>
  
 
    <div class="form-group col-md-6">
      <label for="descripcion"> descripcion</label>
      <input name="descripcion" type="text" class="form-control" id="descripcion" placeholder="descripcion">
    </div>
    
    <div class="form-group col-md-6">
      <label for="subtitulo">subtitulo</label>
      <input name="subtitulo" type="text" class="form-control" id="subtitulo" placeholder="subtitulo">
    </div>
    <div class="form-group col-md-6">
      <label for="fecha_ini">fecha_ini</label>
      <input name="fecha_ini" type="date" class="form-control" id="fecha_ini" placeholder="fecha_ini">
    </div>
    <div class="form-group col-md-6">
      <label for="fecha_fin">fecha_fin</label>
      <input name="fecha_fin" type="date" class="form-control" id="fecha_fin" placeholder="fecha_fin">
    </div>
    <div class="form-group col-md-6">
      <label for="monto">monto</label>
      <input name="monto" type="number" class="form-control" id="monto" placeholder="monto">
    </div>
    <div class="form-group col-md-6">
      <label for="link">link</label>
      <input name="link" type="text" class="form-control" id="link" placeholder="link">
    </div>



</div>
<div class="form-group col-md-4" style="margin-top:1.8rem !important;">
  <button name="insertar" type="submit" class="btn btn-primary  btn-block">Guardar</button>
</div>
</form>
    </div> 
<?php }  ?>
<!-- Fin Insertar Registros-->


<?php 
if (isset($_POST['editar'])){
$id = $_POST['id'];
$sql= "SELECT * FROM proyecto WHERE id = :id"; 
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
      <label for="nombrep">nombrep</label>
      <input value="<?php echo $obj->nombrep;?>" name="nombrep" type="text" class="form-control" placeholder="nombrep">
    </div>
    <div class="form-group col-md-6">
      <label for="id_usu">id_usu</label>
      <input  value="<?php echo $obj->id_usu;?>" name="id_usu" type="number" class="form-control" id="id_usu" placeholder="id_usu">
    </div>
  </div>
<div class="form-row">  
    <div class="form-group col-md-6">
      <label for="descripcion">descripcion</label>
      <input value="<?php echo $obj->descripcion;?>" name="descripcion" type="text" class="form-control" id="descripcion" placeholder="descripcion">
    </div>
  <div class="form-group col-md-6">
  <label for="subtitulo">subtitulo</label>
      <input value="<?php echo $obj->subtitulo;?>" name="subtitulo" type="text" class="form-control" id="subtitulo" placeholder="subtitulo">
</div>

<div class="form-group col-md-6">
  <label for="fecha_ini">fecha_ini</label>
      <input value="<?php echo $obj->fecha_ini;?>" name="fecha_ini" type="date" class="form-control" id="fecha_ini" placeholder="fecha_ini">
</div>
<div class="form-group col-md-6">
  <label for="fecha_fin">fecha_fin</label>
      <input value="<?php echo $obj->fecha_fin;?>" name="fecha_fin" type="date" class="form-control" id="fecha_fin" placeholder="fecha_fin">
</div>
<div class="form-group col-md-6">
  <label for="monto">monto</label>
      <input value="<?php echo $obj->monto;?>" name="monto" type="number" class="form-control" id="monto" placeholder="monto">
</div>

<div class="form-group col-md-6">
  <label for="link">link</label>
      <input value="<?php echo $obj->link;?>" name="link" type="text" class="form-control" id="link" placeholder="link">
</div>
<div class="form-group" style="margin-top:1.8rem !important; margin-left:0.5rem;">
  <button name="actualizar" type="submit" class="btn btn-primary  btn-block">Actualizar Registro</button>
</div>
</form>
    </div>  
<?php }?>
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->


<div style="float:right; margin-bottom:1rem; margin-top:4rem;">

<form action="" method="post"><button class="btn btn-primary" name="formInsertar">Nuevo registro</button>  <a href="proyectoAdmin.php"><button type="button" class="btn btn-primary "style="background-color:#a6a6a6;  border:none">Cancelar</button></a></form></div>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="thead-dark">
    <th width="18%">nombrep</th>
    <th width="22%">id_usu</th>
    <th width="22%">descripcion</th>
    <th width="14%">subtitulo</th>
    <th width="13%">fecha_ini</th>
    <th width="13%">fecha_fin</th>
    <th width="13%">monto</th>
    <th width="13%">link</th>

    <th width="13%" colspan="2"></th>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM proyecto"; 
$query = $conn -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 

if($query -> rowCount() > 0)   { 
foreach($results as $result) { 
echo "<tr>
<td>".$result -> nombrep."</td>
<td>".$result -> id_usu."</td>
<td>".$result -> descripcion."</td>
<td>".$result -> subtitulo."</td>
<td>".$result -> fecha_ini."</td>
<td>".$result -> fecha_fin."</td>
<td>".$result -> monto."</td>
<td>".$result -> link."</td>
<td>
<form method='POST' action='".$_SERVER['PHP_SELF']."'>
<input type='hidden' name='id' value='".$result -> id."'>
<button class='btn btn-primary  btn-block' style='background-color:#a6a6a6; border:none' name='editar'>Editar</button>
</form>
</td>

<td>
<form  onsubmit=\"return confirm('Realmente desea eliminar el registro?');\" method='POST' action='".$_SERVER['PHP_SELF']."'>
<input type='hidden' name='id' value='".$result -> id."'>
<button class='btn btn-primary  btn-block' style='background-color:#FF3333; border:none' name='eliminar'>Eliminar</button>
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
