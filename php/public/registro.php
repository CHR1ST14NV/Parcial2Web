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
$input = array_map(function ($value) {
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
    <style>
        .success-banner {
            margin-bottom: 1.75rem;
            padding: 1.25rem;
            border-radius: 12px;
            background: linear-gradient(135deg, rgba(76, 132, 241, 0.15), rgba(47, 110, 216, 0.05));
            border: 1px solid rgba(47, 110, 216, 0.25);
            text-align: center;
        }

        .details-card {
            border: 1px solid #d1d9e6;
            border-radius: 14px;
            padding: 1.5rem 2rem;
            background: #ffffff;
            box-shadow: 0 12px 28px rgba(31, 42, 68, 0.12);
        }

        .details-card h2 {
            margin-top: 0;
            margin-bottom: 1.25rem;
            font-size: 1.25rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .details-grid {
            display: grid;
            gap: 1.1rem 1.5rem;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        }

        .details-grid dt {
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.06em;
            opacity: 0.75;
            text-transform: uppercase;
        }

        .details-grid dd {
            margin: 0.25rem 0 0;
            font-size: 1rem;
            color: #2f3a55;
        }

        .actions {
            margin-top: 2rem;
            text-align: center;
        }

        .actions a {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            border-radius: 10px;
            background: #fff;
            color: #2f6ed8;
            border: 1px solid #2f6ed8;
            text-decoration: none;
            font-weight: 600;
            letter-spacing: 0.05em;
            transition: background 0.2s ease, color 0.2s ease, transform 0.2s ease;
        }

        .actions a:hover {
            background: #2f6ed8;
            color: #fff;
            transform: translateY(-1px);
        }
    </style>
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
                Tu cuenta ha sido registrada exitosamente.
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
                        <dt>Contraseña (protegida)</dt>
                        <dd><?php echo $maskedPassword; ?></dd>
                    </div>
                </dl>
            </div>
            <div class="actions">
                <a href="index.php">Registrar nuevo usuario</a>
            </div>
        </div>
    </div>
</body>
</html>
