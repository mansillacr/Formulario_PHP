<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body>
    <div class="group">
        <form action="" method="post">
            <h2><em>Formulario de Registro</em></h2>

            <label for="nombre">Nombre<span><em>(Requerido)</em></span></label>
            <input type="text" name="nombre" class="form-input" required />

            <label for="apellido">Apellidos<span><em>(Requerido)</em></span></label>
            <input type="text" name="apellidos" class="form-input" required />

            <label for="email">Email<span><em>(Reuqerido)</em></span></label>
            <input type="text" name="email" class="form-input" required />

            <input type="submit" name="enviar" value="Subcribirse">

            <?php
                if($_POST){
                    $nombre = $_POST['nombre'];
                    $apellidos = $_POST['apellidos'];
                    $email = $_POST['email'];
                
                //Datos de Conexión
                $BD = "cursosql";
                $servidor = "localhost";
                $usuario = "root";
                $clave = "";
                $puerto = 3307;

                $conexion = mysqli_connect($servidor, $usuario, $clave, $BD, 3307);

                if($conexion->connect_error){
                    die("Conexión fallida: " . $connect_error);
                }

                $sql = "INSERT INTO `usuario`(`nombre`, `apellidos`,`email`) VALUES ('$nombre', '$apellidos', '$email')";

                if($conexion->query($sql) == TRUE){
                    echo "Registrado con éxito";
                }else{
                    echo "Error: " .$sql . "<br>" . $conexion->error;
                }

                $conexion->close();
            }
            ?>
        </form>
    </div>
</body>

</html>