<!-- INCLUIR EL ACHIVO DE CONEXIÓN -->

<?php
    include('conexion.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        
        <h1>Crud con PHP y MySQL</h1>

        
        
        
        <form class="row g-3" action="formulario.php" method="post" enctype="multipart/form-data">
            
            
            <div class="container">
    
                <div class="col-md-6">
                
                    <label for="">Buscar</label>
                    <input name="niticcbus" class="form-control" type="text" placeholder="Buscar" >
                </div>
            </div>
            

            <div class="col-md-6">
                <label for="" class="form-label">Identificacion</label>
                <input name="id" placeholder="Ingrese su cc" type="text" class="form-control">
            </div>

            <div class="col-md-6">
                <label for="" class="form-label">Nombres</label>
                <input name="nombre" placeholder="Ingrese nombre completo" type="text" class="form-control">
            </div>

            <div class="col-md-6">
                <label for="" class="form-label">Apellidos</label>
                <input name="apellido" placeholder="Ingrese nombre completo" type="text" class="form-control">
            </div>

            
            <div class="col-md-6">
                <label for="" class="form-label">Telefono de contacto</label>
                <input name="telefono" placeholder="Ingrese su numero de telefono" type="text" class="form-control">
            </div>    
            

            <div class="col-md-6">
                <label for="" class="form-label">Fecha de nacimiento</label>
                <input name="fecha" type="date" class="form-control">
            </div>    

            <div class="col-md-6">
                <label for="" class="form-label">Correo electrónico</label>
                <input name="correo" placeholder="Ingrese su correo electronico" type="email" class="form-control">
            </div>  
            
            <div class="col-md-6">
                <label for="">Imagen</label>
                <input type="file" name="imagen" class="form-control">
            </div> 

            <div class="col-md-6 mt-4">

                <button name="guardar" type="submit" class="btn btn-primary">Guardar</button>

                <button name="eliminar" type="button" class="btn btn-danger">Eliminar</button>

                <button name="actualizar" type="submit" class="btn btn-secundary">Actualizar</button>

                <button name="listar" type="submit" class="btn btn-primary">listar todos los clientes</button>

            </div>
            


        </form>


        <?php
        // ------------------------------/
        // --------------------GUARDAR
        // ------------------------------/

            if(isset($_POST['guardar']))//isset es como el onclick de php, si un elemento está siendo llamado
            {
                include('conexion.php');

                //DATOS DE ENTRADA
                $id_jaime = $_POST['id'];
                $nombre_jaime = $_POST['nombre'];
                $apellido_jaime = $_POST['apellido'];
                $telefono_jaime = $_POST['telefono'];
                $fecha_jaime = $_POST['fecha'];
                $correo_jaime = $_POST['correo'];
                //manejo del archivo

                $imagen = $_FILES['imagen']['name'];
                $ruta = $_FILES['imagen']['tmp_name'];
                //enviar al sql
                $imagen_jaime = 'fotos/'.$imagen;
                copy($ruta,$imagen_jaime);
                
                //CONSULTAA LA BASE DE DATOS
                //             mysqli_query( $conexion , " INSERT INTO registro ( id, nombre, apellido, telefono, fecha, correo, imagen)
                //             VALUES( '$id_jaime', '$nombre_jaime' , '$apellido_jaime', '$telefono_jaime', '$fecha_jaime', '$correo_jaime', '$imagen_jaime') " );

                // echo "Datos guardados correctamente";  
                    
                
                //VERIFICAR QUE NO EXISTAN VALORES DUPLICADOS PARA EL CAMPO DE ID

                $sqlbuscar = " SELECT id FROM registro WHERE id = '$id_jaime'  ";

                if( $resultado = mysqli_query( $conexion , $sqlbuscar ) )
                {
                    $numeroregistros = mysqli_num_rows($resultado); //devuelve la cantidad de filas que hay en esa consulta
                    if($numeroregistros > 0)
                    {
                        echo "<script> alert('El id ya existe'); </script>";
                    }
                    else
                    {
                        mysqli_query( $conexion , " INSERT INTO registro ( id, nombre, apellido, telefono, fecha, correo, imagen)
                        VALUES( '$id_jaime', '$nombre_jaime' , '$apellido_jaime', '$telefono_jaime', '$fecha_jaime', '$correo_jaime', '$imagen_jaime') " );

                        echo "Datos guardados correctamente";  
                    }
                }

            }


        // ------------------------------/
        // --------------------GUARDAR
        // ------------------------------/


        ?>
    
    
    
    </div>


    <script src="app.js" ></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>