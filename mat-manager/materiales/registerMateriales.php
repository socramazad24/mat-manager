<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <header>
        <h1>MAT-MANAGER</h1>        
    </header>
    <div class="container">
        <h2>Registro de Materiales</h2>
        <form method="post">

            <input type="text"  name="idMaterial" placeholder="id delmaterial" >

            <input type="text"  name="MaterialName" placeholder="nombre del material" >

            <input type="text"  name="Description" placeholder="descripcion del material" >

            <input type="number"  name="costoUnitario" placeholder="costo Unitario" >            
            
            <input type="number"  name="cantidadMaterial" placeholder="cantidad de material" >

            <select name="proovedor" id="proovedor" >
                    <option value="">elija proovedor</option>
                    <option value="cobre">cobre</option>
                    <option value="argo">argo</option>
                    <option value="megamex">megamex</option>
            </select>            
            
            <br><br>
            <input type="submit" name="register" value="registrar">
        </form>  
        <?php 
            include ("../con_db.php");

            if (isset($_POST['register'])){
                if (
                strlen($_POST['idMaterial']) >= 1 &&
                strlen($_POST['MaterialName']) >= 1 &&
                strlen($_POST['Description']) >= 1 &&
                strlen($_POST['costoUnitario']) >= 1 &&
                strlen($_POST['cantidadMaterial']) >= 1 &&
                strlen($_POST['proovedor']) >= 1 ) {
    
                    
                    $IdMaterial = trim($_POST['idMaterial']);
                    $MaterialName = trim($_POST['MaterialName']);
                    $Description = trim($_POST['Description']);
                    $costoUnitario = trim($_POST['costoUnitario']);
                    $cantidadMaterial = trim($_POST['cantidadMaterial']);
                    $proovedor = trim($_POST['proovedor']);                    
                    $datereg = date("y/m/d");
                    $consulta = "INSERT INTO materiales(idMaterial, MaterialName, Description, costoUnitario, cantidadMaterial, proovedor, date_reg) 
                            VALUES ('$IdMaterial','$MaterialName','$Description','$costoUnitario','$cantidadMaterial','$proovedor','$datereg')";
                    $resultado = mysqli_query($conex, $consulta);
                        if ($resultado){
                            ?>
                            <h3 class="ok">se ha registrado exitosamente</h3>
                            <?php 
                        } else {
                            ?>
                            <h3 class="bad">algo ha salido mal</h3>
                            <?php 
                        } 
                    
                }else {
                    ?>
                    <h3 class="bad">llene todos los campos</h3>
                    <?php 
                }
    
            }

        ?>
        
    </div>
            <a href="#" id="volverAtras">back</a>
            <script>
                document.getElementById('volverAtras').addEventListener('click', function(event) {
                event.preventDefault(); // Evita que el enlace haga la acción por defecto (evita el salto a otra página)
                window.history.back(); // Retrocede a la página anterior en el historial del navegador
            });
            </script>

<footer>
        &copy; 2023 MAT-MANAGER
    </footer>

</body>
</html>
</html>