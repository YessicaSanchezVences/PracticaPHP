            <?php
            // Array que determina si el usuario a llenado el formulario, y crea las variables. 
            if($_POST) {      
                $Nombre = $_POST['Nombre'];
                $Apellido = $_POST['Apellido'];
                $Email = $_POST['Email'];

                //Creamos la conexion a la base de datos.  
                $servername = "localhost";    
                $username = "yessica";
                $password = "";
                $dbname = "practicasql";
                
                //Creamos la conexion con la BD.
                $bd = new mysqli($servername, $username, $password, $dbname);

                // Verificamos la conexion a la BD con el condicional if.
                if ($bd ->connect_error){
                    die("Conexion fallida: " . $bd->connect_error);
                }

                // Consultamos a la base de datos con una query SQL.
                $sql = "INSERT INTO `usuario`(`´Nombre´`, `´Apellido´`, `´Email´`) VALUES ('$Nombre', '$Apellido', '$Email')";
                
                // Mensaje de que se ha creado correctamente y si no, que existe un error y se debe repetir el proceso.
                if ($bd->query($sql) === TRUE) {
                    echo "<p> Formulario enviado con exito:</p>";
                    echo "<p>Nombre: $Nombre</p>";
                    echo "<p>Apellido: $Apellido</p>";
                    echo "<p>Email: $Email</p>";
                } else {
                    echo "Error:" .$sql."<br>". $bd->error;
                }

                // Se cierra la conexion con la BD.
                $bd->close();
            }
            ?>
    
