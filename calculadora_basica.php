<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculadora Básica</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php require 'menu.php'; ?>

    <div class="contenedor">
        <h2>Calculadora Básica</h2>
        <p>Introduce dos números y selecciona la operación:</p>

        <form method="POST" action="">
            <label for="num1">Número 1:</label><br>
            <input type="number" step="any" name="num1" required value="<?php echo isset($_POST['num1']) ? $_POST['num1'] : ''; ?>"><br><br>

            <label for="num2">Número 2:</label><br>
            <input type="number" step="any" name="num2" required value="<?php echo isset($_POST['num2']) ? $_POST['num2'] : ''; ?>"><br><br>

            <label for="operacion">Operación:</label><br>
            <select name="operacion" required style="padding: 8px; margin: 5px 0; font-size: 14px; width: 100%;">
                <option value="">-- Selecciona una operación --</option>
                <option value="sumar" <?php echo (isset($_POST['operacion']) && $_POST['operacion'] == 'sumar') ? 'selected' : ''; ?>>Suma</option>
                <option value="restar" <?php echo (isset($_POST['operacion']) && $_POST['operacion'] == 'restar') ? 'selected' : ''; ?>>Resta</option>
                <option value="multiplicar" <?php echo (isset($_POST['operacion']) && $_POST['operacion'] == 'multiplicar') ? 'selected' : ''; ?>>Multiplicación</option>
                <option value="dividir" <?php echo (isset($_POST['operacion']) && $_POST['operacion'] == 'dividir') ? 'selected' : ''; ?>>División</option>
            </select><br><br>

            <button type="submit" name="calcular">Calcular</button>
        </form>

        <div style="margin-top: 20px; padding: 15px; background-color: #2a2a2a; border-radius: 5px;">
            <?php
            // Comprobamos directamente si se ha enviado una operación válida
            if (isset($_POST['operacion']) && $_POST['operacion'] != '') {
                require_once 'calculadora.php';

                $n1 = floatval($_POST['num1']);
                $n2 = floatval($_POST['num2']);
                $op = $_POST['operacion'];

                $calc = new Calculadora();
                echo "<h3>Resultado:</h3>";

                try {
                    if ($op == 'sumar') {
                        $res = $calc->sumar($n1, $n2);
                        echo "El resultado de sumar $n1 y $n2 es: <strong>$res</strong>";
                    } elseif ($op == 'restar') {
                        $res = $calc->restar($n1, $n2);
                        echo "El resultado de restar $n1 y $n2 es: <strong>$res</strong>";
                    } elseif ($op == 'multiplicar') {
                        $res = $calc->multiplicar($n1, $n2);
                        echo "El resultado de multiplicar $n1 y $n2 es: <strong>$res</strong>";
                    } elseif ($op == 'dividir') {
                        $res = $calc->dividir($n1, $n2);
                        echo "El resultado de dividir $n1 y $n2 es: <strong>$res</strong>";
                    }
                } catch (Exception $e) {
                    echo "<span style='color: #ff6b6b; font-weight: bold;'>" . $e->getMessage() . "</span>";
                }
            } else {
                echo "<em>Introduce los valores, selecciona una operación y pulsa Calcular.</em>";
            }
            ?>
        </div>

        <br><br>
        <a href="index.php" class="enlace-volver">Volver al inicio</a>
    </div>

</body>
</html>