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
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DesaWeb | Registro Exitoso</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="main-wrapper">
        <div class="browser-bar">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <div class="browser-url">www.DesaWeb.com/registro</div>
        </div>
        <div class="form-card">
            <h1>Registro Completado</h1>
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
            <div class="actions">
                <a href="index.php">Registrar nuevo usuario</a>
            </div>
        </div>
    </div>
    <div class="watermark">Hecho por Christian Velasquez 090-22-7443</div>
</body>
</html>


