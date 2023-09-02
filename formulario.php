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

<?php


        // ------------------------------/
        // --------------------BUSCAR
        // ------------------------------/

        //DATOS DE ENTRADA
        $id_jaime_b = "";
        $nombre_jaime_b = "";
        $apellido_jaime_b = "";
        $telefono_jaime_b = "";
        $fecha_jaime_b = "";
        $correo_jaime_b = "";
        $imagen_jaime_b = "";
        
        

        if(isset($_POST['buscar']))
        {

            $variableBuscar= $_POST['niticcbus'];
            $consultabuscar = $conexion ->query("SELECT * FROM registro WHERE id = '$variableBuscar' ");

            while( $resultadoconsulta_b = $consultabuscar ->fetch_array()  )
            {
                $id_jaime_b = $resultadoconsulta_b[0];
                $nombre_jaime_b = $resultadoconsulta_b[1];
                $apellido_jaime_b = $resultadoconsulta_b[2];
                $telefono_jaime_b = $resultadoconsulta_b[3];
                $fecha_jaime_b = $resultadoconsulta_b[4];
                $correo_jaime_b = $resultadoconsulta_b[5];
                $imagen_jaime_b = $resultadoconsulta_b[6];
            }
        }

?>


</head>
<body>

    <div class="container">
        
        <h1>Crud con PHP y MySQL</h1>

        <form class="container" method="post" enctype="multipart/form-data">
            
            
                        <div class="col-md-6">
                        
                            <label for="">Buscar</label>
                            <input name="niticcbus" class="form-control" type="text" placeholder="Buscar" >
                            <button name="buscar" type="submit" class="btn btn-primary">Buscar</button>
                        </div>

                        <button name="listar" type="submit" class="btn btn-primary">listar todos los clientes</button>

        </form>

        <?php
            if(isset($_POST['listar']))
            {
                echo " <center>
                        <table border = '3'>
                            <tr>
                                <th> Id </th>
                                <th> Nombre </th>
                                <th> Apellido </th>
                                <th> Telfeono</th>
                                <th>  fecha </th>
                                <th> Correo </th>
                                <th> Imagen </th>
                            </tr> 
                    ";

                    $buscar = $conexion ->query( " select * from registro " );

                    while($resultado = $buscar ->fetch_array())
                    {
                        $id = $resultado[0];
                        $nombre = $resultado[1];
                        $apellido = $resultado[2];
                        $telefono = number_format($resultado[3]) ;
                        date_default_timezone_set('America/Bogota');
                        $fecha =  date("d-m-Y",strtotime($resultado[4]));
                        $correo =$resultado[5];
                        $imagen = $resultado[6];
                        echo " 
                            <tr>
                                <td> $id </td>
                                <th> $nombre </th>
                                <th> $apellido </th>
                                <th> $telefono</th>
                                <th> $fecha </th>
                                <th> $correo </th>
                                <td> 
                                    <img src = '$imagen' width = '30%' >
                                </td>
                                
                            </tr> 
                    ";

                    }

                    echo " </table> </center> ";
                
                
                
            }


        ?>
        
        
        
        
        
        <form class="row g-3" action="consultas.php" method="post" enctype="multipart/form-data">
            

            <div class="col-md-6">
                <label for="" class="form-label">Identificacion</label>
                <input name="id" placeholder="Ingrese su cc" type="text" class="form-control" value=" <?php echo $id_jaime_b ?> " >
            </div>

            <div class="col-md-6">
                <label for="" class="form-label">Nombres</label>
                <input name="nombre" placeholder="Ingrese nombre completo" type="text" class="form-control" value = "<?php echo $nombre_jaime_b ?>" >
            </div>

            <div class="col-md-6">
                <label for="" class="form-label">Apellidos</label>
                <input name="apellido" placeholder="Ingrese nombre completo" type="text" class="form-control" value = "<?php echo $apellido_jaime_b ?>"  >
            </div>

            
            <div class="col-md-6">
                <label for="" class="form-label">Telefono de contacto</label>
                <input name="telefono" placeholder="Ingrese su numero de telefono" type="text" class="form-control"  value = "<?php echo $telefono_jaime_b ?>"  >
            </div>    
            

            <div class="col-md-6">
                <label for="" class="form-label">Fecha de nacimiento</label>
                <input name="fecha" type="date" class="form-control" value = "<?php echo $fecha_jaime_b ?>"  >
            </div>    

            <div class="col-md-6">
                <label for="" class="form-label">Correo electrónico</label>
                <input name="correo" placeholder="Ingrese su correo electronico" type="email" class="form-control" value = "<?php echo $correo_jaime_b ?>" >
            </div>  
            
            <div class="col-md-6">
                <label for="">Imagen</label>
                <input type="file" name="imagen" class="form-control">
                <img src="<?php echo $imagen_jaime_b ?>" alt="No hay foto" width="180">
            </div> 

            <div class="col-md-6 mt-4">

                <button name="guardar" type="submit" class="btn btn-primary">Guardar</button>

                <button name="eliminar" type="submit" class="btn btn-danger">Eliminar</button>

                <button name="actualizar" type="submit" class="btn btn-info">Actualizar</button>

                

            </div>
            


        </form>



    
    </div>


    <script src="app.js" ></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>