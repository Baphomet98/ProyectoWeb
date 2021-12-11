<?php
  $servidor="localhost";
  $usuario="root";
  $password="cuaderno_98";
  $baseDeDatos="datos";
  $enlace=mysqli_connect($servidor,$usuario,$password,$baseDeDatos);
  if(!$enlace)
  {
    echo"Error en la conexion con el servidor";
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="estilos1.css">
   <script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<title>LOGIN</title>
  <video muted autoplay loop>
    <source src="age.mp4">
  </video>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.boton').click(function(){
        $('audio')[0].play();
      });
    });
  </script>
  <audio src=casa.mp3 preload></audio>
</head>
<body class="bodylog">
<div class="absolute">
<header>
 <button id="boton_personalizado" type="submit" onclick="ini()">Menu Principal</button>
<form name="insertar" class="needs-validation" id="log" method="POST" novalidate>
	<div class="form-row">
		<div class="col-md-4 mb-3">
			<label for="validationCustom01">Nombre</label><br>
    		<input name="nombre" type="text"data-toggle="popover" title="Nombre" class="form-control" id="validationCustom01" placeholder="Nombre"required>
    		<div class="valid-feedback">
    			Correcto
      	</div>
		</div>
    </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Correo Electronico</label>
      <input name="correo" data-toggle="popover" title="Correo Electronico" type="email" class="form-control" id="validationCustom02" align="center" placeholder="Correo Electronico" required>
       <div class="invalid-feedback">
        Revise con atencion el Correo Electronico Ingresado
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="">Contraseña</label>
      <input name="contra" type="password" data-toggle="popover" title="Contraseña" class="form-control" id="validationCustom03" placeholder="Contraseña" align="center" required>
      <div class="valid-feedback">
        Correcto
      </div>
    </div>
  </div>
   <div  class="g-recaptcha" data-sitekey="6LeXnn4dAAAAAILrabwIYEJTe71mbACAGNmRWfSw"></div>
  <button  onclick="ini()" type="submit" class="btn btn-primary" name="registro">Iniciar Sesion</button>
</button>
</form>
<button  id="boton_personalizado"class="boton" type="submit" href="#collapse1" data-bs-toggle="collapse" aria-controls="collapse1" aria-expanded="false" onclick="start()">¿Enviar correo?</button>
<form class="needs-validation" id="log" method="POST" novalidate>
 
      <div class="collapse" id="collapse1">
        <h1 style="color: green;">ABRIENDO SECCION CORREO</h1>
        <div class="progress" style="width:33%">
            <p class="counter">0%</p>
            <div class="bar"></div>
        </div>
    <div class="collapse" id="collapse1">
     <div class="col-md-4 mb-3">
      <label for="validationCustom02">Correo Electronico</label>
      <input name="correoN" data-toggle="popover" title="Correo Electronico" type="email" class="form-control" id="validationCustom02" align="center" placeholder="Correo Electronico" required>
       <div class="invalid-feedback">
        Revise con atencion el Correo Electronico Ingresado
      </div>
    </div>
     <button  type="submit"class="btn btn-primary" name="envia" data-bs-toggle="collapse" arial-controls="collapse2" aria-expanded="false">Enviar Correo</button>
     </div>
  </form>
  </div>
</div>
</header>
<script type="text/javascript">
  function ini(){
    var bar= document.getElementById('inicio');
    window.location.replace("index.html");
  }
</script>
 <script type="text/javascript">
    const bar = document.querySelector('.bar');
        let width = 1;
        const success = document.querySelector('.success')
        const counter = document.querySelector('.counter')

        function start() {
            setInterval(() => {
                if (width >= 100) {
                    success.innerHTML = 'Correo Enviado'
                    clearInterval()
                } else {
                    width++;
                    bar.style.width = width + '%';
                    counter.innerHTML = width + '%';
                }
            },5)
        }
</script>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script>
      $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
      });
</script>
</body>
</html>
<?php
if (isset($_POST['envia'])) {
  $to=$_POST['correoN'];
  $subject="Prueba de correo electronico";
  $message="Es para ver si funciona este metodo de enviar correos electronicos";
  
  mail($to,$subject,$message);
}
?>
<?php
  if(isset($_POST['registro']))
  {
    $nombre=$_POST["nombre"];
    $correo=$_POST["correo"];
    $contra=$_POST["contra"];
    $insertardatos="INSERT INTO usuarios VALUES('$nombre','$correo','$contra')";
    $ejecutar= mysqli_query($enlace,$insertardatos);
    if(!$ejecutar)
    {
      echo"Error en SQL";
    }
  }
?>
