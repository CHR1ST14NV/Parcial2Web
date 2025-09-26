<?php
$defaults = [
    'nombre' => '',
    'apellido' => '',
    'dpi' => '',
    'nacimiento' => '',
    'sexo' => 'M',
    'usuario' => '',
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DesaWeb | Registro</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="main-wrapper">
        <div class="browser-bar">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <div class="browser-url">www.DesaWeb.com</div>
        </div>
        <div class="form-card">
            <h1>Formulario de Registro</h1>
            <form action="registro.php" method="POST" novalidate>
                <fieldset>
                    <legend>Datos Generales</legend>
                    <div class="data-panel-hint">Panel para<br>Datos Generales</div>
                    <div class="form-grid">
                        <label>
                            Nombre
                            <input type="text" name="nombre" placeholder="text" required value="<?php echo htmlspecialchars($defaults['nombre']); ?>">
                        </label>
                        <label>
                            Apellido
                            <input type="text" name="apellido" placeholder="text" required value="<?php echo htmlspecialchars($defaults['apellido']); ?>">
                        </label>
                        <label>
                            DPI
                            <input type="text" name="dpi" placeholder="text" pattern="[0-9]{4}[- ]?[0-9]{5}[- ]?[0-9]{4}" value="<?php echo htmlspecialchars($defaults['dpi']); ?>">
                        </label>
                        <label>
                            Fecha de Nacimiento
                            <input type="date" name="nacimiento" required value="<?php echo htmlspecialchars($defaults['nacimiento']); ?>">
                        </label>
                        <label>
                            Sexo
                            <select name="sexo" required>
                                <option value="M" <?php echo $defaults['sexo'] === 'M' ? 'selected' : ''; ?>>M</option>
                                <option value="F" <?php echo $defaults['sexo'] === 'F' ? 'selected' : ''; ?>>F</option>
                                <option value="O" <?php echo $defaults['sexo'] === 'O' ? 'selected' : ''; ?>>Otro</option>
                            </select>
                        </label>
                    </div>
                </fieldset>
                <div class="credentials">
                    <label>
                        Usuario
                        <input type="text" name="usuario" placeholder="usuario" required value="<?php echo htmlspecialchars($defaults['usuario']); ?>">
                    </label>
                    <label>
                        Contraseña
                        <input type="password" name="contrasena" placeholder="Contraseña" required>
                    </label>
                </div>
                <button type="submit">Guardar</button>
            </form>
        </div>
    </div>
</body>
</html>
