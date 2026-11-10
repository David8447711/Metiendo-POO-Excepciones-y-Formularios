<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Secuencia Numérica</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php require 'menu.php'; ?>

    <div class="contenedor">
        <h2>Secuencia Numérica Interactiva</h2>
        
        <form method="POST" action="">
            <label for="numero">Introduce un número límite:</label><br>
            <input type="number" name="numero" required min="1" value="<?php echo isset($_POST['numero']) ? $_POST['numero'] : ''; ?>"><br>
            <button type="submit" name="generar">Generar Secuencia</button>
        </form>

        <?php
        if (isset($_POST['generar'])) {
            $num = intval($_POST['numero']);
            echo "<h3>Secuencia Ascendente hasta $num:</h3>";
            for ($i = 1; $i <= $num; $i++) {
                echo "$i ";
            }

            echo "<h3>Secuencia Descendente desde $num:</h3>";
            for ($i = $num; $i >= 1; $i--) {
                echo "$i ";
            }
        }
        ?>

        <br><br>
        <a href="index.php" class="enlace-volver">Volver al inicio</a>
    </div>

</body>
</html>