<?php


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
//copy($ruta,$imagen_jaime);


        // ------------------------------/
        // --------------------GUARDAR
        // ------------------------------/

        if(isset($_POST['guardar']))//isset es como el onclick de php, si un elemento está siendo llamado
        {
            //include('conexion.php');

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
                    copy($ruta,$imagen_jaime);
                    mysqli_query( $conexion , " INSERT INTO registro ( id, nombre, apellido, telefono, fecha, correo, imagen)
                    VALUES( '$id_jaime', '$nombre_jaime' , '$apellido_jaime', '$telefono_jaime', '$fecha_jaime', '$correo_jaime', '$imagen_jaime') " );

                    echo "Datos guardados correctamente";  
                }
            }

        }


    // ------------------------------/
    // --------------------ACTUALIZAR
    // ------------------------------/

    if(isset($_POST['actualizar']))
    {
        mysqli_query( $conexion , " UPDATE registro SET nombre = '$nombre_jaime' , apellido = '$apellido_jaime'  ,telefono = '$telefono_jaime' , fecha = '$fecha_jaime' , correo = '$correo_jaime' , imagen = '$imagen_jaime' WHERE id = '$id_jaime' "   );

        echo "Datos actualizados correctamente"; 
    }

    // ------------------------------/
    // --------------------ELIMINAR
    // ------------------------------/

    
    if(isset($_POST['eliminar']))
    {
        mysqli_query( $conexion , " DELETE FROM registro WHERE id = '$id_jaime' "   );

        echo "<script>alert('Datos eliminados correctamente'); window.location.href='formulario.php'</script>"; 
    }


?>