<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Calculadora;

$result = null;
$error = null;
action:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valorA = isset($_POST['valorA']) ? trim($_POST['valorA']) : '';
    $valorB = isset($_POST['valorB']) ? trim($_POST['valorB']) : '';
    $operacion = isset($_POST['operacion']) ? trim($_POST['operacion']) : '';

    if ($valorA === '' || $valorB === '' || $operacion === '') {
        $error = 'Por favor ingresa ambos valores y selecciona una operación.';
    } else {
        try {
            $calculadora = new Calculadora();
            $a = filter_var($valorA, FILTER_VALIDATE_FLOAT);
            $b = filter_var($valorB, FILTER_VALIDATE_FLOAT);

            if ($a === false || $b === false) {
                throw new InvalidArgumentException('Los valores deben ser números válidos.');
            }

            switch ($operacion) {
                case 'sumar':
                    $result = $calculadora->sumar($a, $b);
                    break;
                case 'restar':
                    $result = $calculadora->restar($a, $b);
                    break;
                case 'multiplicar':
                    $result = $calculadora->multiplicar($a, $b);
                    break;
                case 'dividir':
                    $result = $calculadora->dividir($a, $b);
                    break;
                default:
                    throw new InvalidArgumentException('Operación no válida.');
            }
        } catch (Throwable $exception) {
            $error = $exception->getMessage();
        }
    }
}

function safeValue(string $key): string
{
    return isset($_POST[$key]) ? htmlspecialchars((string) $_POST[$key], ENT_QUOTES, 'UTF-8') : '';
}

function operationSymbol(string $operation): string
{
    return match ($operation) {
        'sumar' => '+',
        'restar' => '−',
        'multiplicar' => '×',
        'dividir' => '÷',
        default => '',
    };
}

$operacionActual = safeValue('operacion');
$expresionVisible = '';
if ($operacionActual !== '') {
    $expresionVisible = trim(safeValue('valorA') . ' ' . operationSymbol($operacionActual) . ' ' . safeValue('valorB'));
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="page-background">
        <div class="calculator-shell">
            <header class="calculator-header">
                <h1>Calculadora</h1>
                <p>Utiliza el panel para ingresar los valores y ver el resultado claro.</p>
            </header>

            <div class="display-panel">
                <div class="display-value"><?= $result !== null ? htmlspecialchars((string) $result, ENT_QUOTES, 'UTF-8') : '0' ?></div>
                <div class="display-subtext"><?= htmlspecialchars($expresionVisible !== '' ? $expresionVisible : 'Ingresa tus números y elige una operación', ENT_QUOTES, 'UTF-8') ?></div>
            </div>

            <?php if ($error !== null): ?>
                <div class="message error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
            <?php endif; ?>

            <?php if ($result !== null): ?>
                <div class="message success">Resultado: <strong><?= htmlspecialchars((string) $result, ENT_QUOTES, 'UTF-8') ?></strong></div>
            <?php endif; ?>

            <form id="calculator-form" method="post" action="">
                <div class="inputs-row">
                    <label class="input-group">
                        <span>Valor A</span>
                        <input type="text" id="valorA" name="valorA" value="<?= safeValue('valorA') ?>" inputmode="decimal" autocomplete="off" />
                    </label>
                    <label class="input-group">
                        <span>Valor B</span>
                        <input type="text" id="valorB" name="valorB" value="<?= safeValue('valorB') ?>" inputmode="decimal" autocomplete="off" />
                    </label>
                </div>

                <input type="hidden" id="operacion" name="operacion" value="<?= safeValue('operacion') ?>">

                <div class="button-grid">
                    <button type="button" class="btn" onclick="setOperation('sumar')">+</button>
                    <button type="button" class="btn" onclick="setOperation('restar')">−</button>
                    <button type="button" class="btn" onclick="setOperation('multiplicar')">×</button>
                    <button type="button" class="btn" onclick="setOperation('dividir')">÷</button>
                    <button type="button" class="btn secondary" onclick="fillInput('7')">7</button>
                    <button type="button" class="btn secondary" onclick="fillInput('8')">8</button>
                    <button type="button" class="btn secondary" onclick="fillInput('9')">9</button>
                    <button type="button" class="btn secondary" onclick="fillInput('4')">4</button>
                    <button type="button" class="btn secondary" onclick="fillInput('5')">5</button>
                    <button type="button" class="btn secondary" onclick="fillInput('6')">6</button>
                    <button type="button" class="btn secondary" onclick="fillInput('1')">1</button>
                    <button type="button" class="btn secondary" onclick="fillInput('2')">2</button>
                    <button type="button" class="btn secondary" onclick="fillInput('3')">3</button>
                    <button type="button" class="btn secondary" onclick="fillInput('0')">0</button>
                    <button type="button" class="btn secondary" onclick="fillInput('.')">.</button>
                    <button type="button" class="btn clear" onclick="clearAll()">AC</button>
                    <button type="submit" class="btn equal">Calcular</button>
                </div>
            </form>

            <footer class="calculator-footer">
                <p>Diseño moderno con colores suaves y controles claros.</p>
            </footer>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>
