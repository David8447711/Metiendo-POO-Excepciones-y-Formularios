<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculadora Científica</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php require 'menu.php'; ?>

    <div class="contenedor">
        <h2>Calculadora Científica</h2>
        <p>Selecciona la operación científica que deseas realizar:</p>

        <form method="POST" action="">
            <label for="operacion_cientifica">Operación:</label><br>
            <select name="operacion_cientifica" required style="padding: 8px; margin: 5px 0; font-size: 14px; width: 100%;">
                <option value="">-- Selecciona --</option>
                <option value="potencia" <?php echo (isset($_POST['operacion_cientifica']) && $_POST['operacion_cientifica'] == 'potencia') ? 'selected' : ''; ?>>Potencia (Base ^ Exponente)</option>
                <option value="raiz" <?php echo (isset($_POST['operacion_cientifica']) && $_POST['operacion_cientifica'] == 'raiz') ? 'selected' : ''; ?>>Raíz Cuadrada</option>
            </select><br>

            <label for="num1">Número / Base:</label><br>
            <input type="number" step="any" name="num1" required value="<?php echo isset($_POST['num1']) ? htmlspecialchars($_POST['num1']) : ''; ?>"><br>

            <label for="num2">Exponente (solo para potencia):</label><br>
            <input type="number" step="any" name="num2" value="<?php echo isset($_POST['num2']) ? htmlspecialchars($_POST['num2']) : ''; ?>"><br>

            <button type="submit" name="calcular_cientifica">Calcular Científica</button>
        </form>

        <?php
        if (isset($_POST['calcular_cientifica'])) {
            require_once 'calculadoracientifica.php';

            $n1 = floatval($_POST['num1']);
            $n2 = isset($_POST['num2']) ? floatval($_POST['num2']) : 0;
            $op = $_POST['operacion_cientifica'];

            $calcCientifica = new CalculadoraCientifica();
            echo "<h3>Resultado:</h3>";

            try {
                if ($op == 'potencia') {
                    $res = $calcCientifica->potencia($n1, $n2);
                    echo "El número $n1 elevado a $n2 es: <strong>$res</strong>";
                } elseif ($op == 'raiz') {
                    $res = $calcCientifica->raizCuadrada($n1);
                    echo "La raíz cuadrada de $n1 es: <strong>$res</strong>";
                } else {
                    echo "Operación no válida.";
                }
            } catch (Exception $e) {
                echo "<span style='color: #ff6b6b; font-weight: bold;'>" . $e->getMessage() . "</span>";
            }
        }
        ?>

        <br><br>
        <a href="index.php" class="enlace-volver">Volver al inicio</a>
    </div>

</body>
</html>