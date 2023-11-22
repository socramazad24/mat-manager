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
                <li><a href="index.php">Inicio</a></li>   
                <li><a href="../tables/TablaPedidos.php">pedidos</a></li>
                <li><a href="../logout.php">cerrar sesion</a></li>
            </ul>
        </nav>
        
    </header>


    <table>
        <h2>tabla de pedidos</h2>
        <div class="register">
        <form action="../pedidos/RegistrarPedido.php" class="btn-register">
            <input type="submit" value="registrar material">
        </form>
    </div>
        <tr>
            <th>ID Pedido</th>
            <th>proovedor</th>
            <th>Material</th>
            <th>cantidad</th>
            <th>costo unitario</th>            
            <th>fecha</th> 
            <th>accion</th>  
        </tr>

        <?php 

            include "../con_db.php";
            $consulta = "SELECT * FROM Pedidos";
            $resultado = mysqli_query($conex, $consulta);  
            if ($resultado){
                while ($row = $resultado->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" . $row["idPedido"] . "</td>";
                    echo "<td>" . $row["nameProveedor"] . "</td>";
                    echo "<td>" . $row["materiales"] . "</td>";
                    echo "<td>" . $row["cantidad"] . "</td>";
                    echo "<td>" . $row["costoUnitario"] . "</td>";
                    echo "<td>" . $row["fecha_reg"] . "</td>";                    
                    echo "<td>
                            <a href='../CRUD/editPedido.php?idPedido=" . $row["idPedido"] . "'>editar</a> | 
                            <a href='../CRUD/deletePedido.php?idPedido=" . $row["idPedido"] . "'>Eliminar</a>
                            </td>";
                    echo "</tr>";
                    
                } 
            }else {
                echo "<tr><td colspan='5'>0 resultados</td></tr>";
            }
            mysqli_close($conex);

        ?>

    </table>  

            

    

    <footer>
        &copy; 2023 MAT-MANAGER
    </footer>

</body>
</html>