<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$fields = [
    'nombre' => FILTER_SANITIZE_SPECIAL_CHARS,
    'apellido' => FILTER_SANITIZE_SPECIAL_CHARS,
    'dpi' => FILTER_SANITIZE_SPECIAL_CHARS,
    'nacimiento' => FILTER_SANITIZE_SPECIAL_CHARS,
    'sexo' => FILTER_SANITIZE_SPECIAL_CHARS,
    'usuario' => FILTER_SANITIZE_SPECIAL_CHARS,
];

$input = filter_input_array(INPUT_POST, $fields) ?: [];
$input = array_map(static function ($value) {
    return $value ?? '';
}, $input);

$contrasena = $_POST['contrasena'] ?? '';
$maskedPassword = str_repeat('*', max(strlen($contrasena), 8));

$esDpiValido = preg_match('/^[0-9]{13}$/', $input['dpi']) === 1;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="main-wrapper">
        <div class="form-card">
            <div class="form-card__header">
                <span class="form-card__badge">Registro completado</span>
                <h1>Bienvenido a la comunidad</h1>
            </div>
            <?php if ($esDpiValido): ?>
            <div class="success-banner">
                Bienvenido, <strong><?php echo $input['nombre'] . ' ' . $input['apellido']; ?></strong>.<br>
                Tu perfil se cre&#243; con estilo.
            </div>
            <div class="details-card">
                <h2>Datos Registrados</h2>
                <dl class="details-grid">
                    <div>
                        <dt>Nombre</dt>
                        <dd><?php echo $input['nombre']; ?></dd>
                    </div>
                    <div>
                        <dt>Apellido</dt>
                        <dd><?php echo $input['apellido']; ?></dd>
                    </div>
                    <div>
                        <dt>DPI</dt>
                        <dd><?php echo $input['dpi']; ?></dd>
                    </div>
                    <div>
                        <dt>Fecha de Nacimiento</dt>
                        <dd><?php echo $input['nacimiento']; ?></dd>
                    </div>
                    <div>
                        <dt>Sexo</dt>
                        <dd><?php echo $input['sexo']; ?></dd>
                    </div>
                    <div>
                        <dt>Usuario</dt>
                        <dd><?php echo $input['usuario']; ?></dd>
                    </div>
                    <div>
                        <dt>Contrase&#241;a (protegida)</dt>
                        <dd><?php echo $maskedPassword; ?></dd>
                    </div>
                </dl>
            </div>
            <?php else: ?>
            <div class="alert-banner">
                El DPI ingresado debe contener exactamente 13 digitos (formato Guatemala). <a href="index.php">Regresar al formulario</a>
            </div>
            <?php endif; ?>
            <div class="actions">
                <a href="index.php">Registrar nuevo usuario</a>
            </div>
        </div>
    </div>
    <div class="watermark">Hecho por Christian Velasquez 090-22-7443</div>
</body>
</html>
