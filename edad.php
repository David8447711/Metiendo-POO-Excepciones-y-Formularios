<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario Edad</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php require 'menu.php'; ?>

    <div class="contenedor">
        <h2>Verificador de Edad</h2>
        
        <form method="POST" action="">
            <label for="edad">Introduce tu edad:</label><br>
            <input type="number" name="edad" required value="<?php echo isset($_POST['edad']) ? $_POST['edad'] : ''; ?>"><br>
            <button type="submit" name="enviar">Comprobar</button>
        </form>

        <div style="margin-top: 20px; padding: 15px; background-color: #2a2a2a; border-radius: 5px;">
            <?php
            if (isset($_POST['enviar'])) {
                $edad = intval($_POST['edad']);
                echo "<h3>Resultado:</h3>";

                try {
                    // Validar si la edad es negativa
                    if ($edad < 0) {
                        throw new Exception("Error: No se pueden tener años negativos.");
                    }
                    
                    // Validar si la edad no es realista (más de 120 años)
                    if ($edad > 120) {
                        throw new Exception("Error: La edad introducida no es realista (máximo 120 años).");
                    }

                    // Si pasa las validaciones, comprobamos si es mayor o menor de edad
                    if ($edad >= 18) {
                        echo "Con $edad años, eres mayor de edad.";
                    } else {
                        echo "Con $edad años, eres menor de edad.";
                    }

                } catch (Exception $e) {
                    echo "<span style='color: #ff6b6b; font-weight: bold;'>" . $e->getMessage() . "</span>";
                }
            } else {
                echo "<em>Introduce una edad para comprobarla.</em>";
            }
            ?>
        </div>

        <br><br>
        <a href="index.php" class="enlace-volver">Volver al inicio</a>
    </div>

</body>
</html>