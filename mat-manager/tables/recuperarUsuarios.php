<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabla de usuarios</title>
    <link rel="stylesheet" href="../styles/style.css">
    <style>
    table {
    border-collapse: collapse;
    width: 80%;
    margin: 0 auto;    
}
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;        
    }
    th {
        background-color: #000000;
        color: #ffffff;        
    }
    tr{
        background-color: #f2f2f2;        
    }

    .register{
        text-align: center;
        margin: 20px;
        max-width: 400px;
    }

    h2{
        color: #ffffff; 
    }
    
    </style>
</head>
<body>
    <header>
        <h1>MAT-MANAGER</h1>
        <nav>
            <div class="menu-icon">
                <i class="fa fa-bars"></i>
            </div>
            <ul class="menu">
                <li><a href="../admin/index.php">Inicio</a></li>
                <li><a href="recuperarUsuarios.php">usuarios</a></li>
                <li><a href="../logout.php">cerrar sesion</a></li>
            </ul>
        </nav>
    </header>


    <table>
        <h2>tabla de usuarios</h2>
        <div class="register">
        <form action="../users/register.php" class="btn-register">
            <input type="submit" value="registrar material">
        </form>
    </div>
        <tr>
            <th>ID</th>
            <th>nombre</th>
            <th>apellido</th>
            <th>usuario</th>
            <th >contraseña</th>
            <th>email</th>
            <th>telefono</th>
            <th>rol</th>
            <th>fecha</th>    
            <th>Accion</th>
        </tr>

        <?php 

            include "../con_db.php";
            $consulta = "SELECT * FROM users";
            $resultado = mysqli_query($conex, $consulta);  
            if ($resultado){
                while ($row = $resultado->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" . $row["idEmployee"] . "</td>";
                    echo "<td>" . $row["firstName"] . "</td>";
                    echo "<td>" . $row["lastName"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["password"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["role"] . "</td>";
                    echo "<td>" . $row["date_reg"] . "</td>";
                    echo "<td>
                            <a href='../CRUD/editUser.php?idEmployee=" . $row["idEmployee"] . "'>editar</a> | 
                            <a href='../CRUD/deleteUser.php?idEmployee=" . $row["idEmployee"] . "'>Eliminar</a>
                            </td>";
                    echo "</tr>";
                    echo "</tr>";
                } 
            }else {
                echo "no se encontraron registros";
                    
            }
            mysqli_close($conex);
        ?>

    </table>    

    <footer>
        &copy; 2023 MAT-MANAGER
    </footer>

</body>
</html>