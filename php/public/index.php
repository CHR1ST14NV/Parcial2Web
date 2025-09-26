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
                            <input type="text" name="nombre" placeholder="Ingresa tu nombre" required value="<?php echo htmlspecialchars($defaults['nombre']); ?>">
                        </label>
                        <label>
                            Apellido
                            <input type="text" name="apellido" placeholder="Ingresa tu apellido" required value="<?php echo htmlspecialchars($defaults['apellido']); ?>">
                        </label>
                        <label>
                            DPI
                            <input type="text" name="dpi" placeholder="Ingresa tu DPI" pattern="[0-9]{4}[- ]?[0-9]{5}[- ]?[0-9]{4}" value="<?php echo htmlspecialchars($defaults['dpi']); ?>">
                        </label>
                        <label>
                            Fecha de Nacimiento
                            <input type="date" name="nacimiento" required value="<?php echo htmlspecialchars($defaults['nacimiento']); ?>">
                        </label>
                        <label>
                            Sexo
                            <select name="sexo" required>
                                <option value="M" <?php echo $defaults['sexo'] === 'M' ? 'selected' : ''; ?>>Masculino</option>
                                <option value="F" <?php echo $defaults['sexo'] === 'F' ? 'selected' : ''; ?>>Femenino</option>
                                <option value="O" <?php echo $defaults['sexo'] === 'O' ? 'selected' : ''; ?>>Otro</option>
                            </select>
                        </label>
                    </div>
                </fieldset>
                <div class="credentials">
                    <label>
                        Usuario
                        <input type="text" name="usuario" placeholder="Crea tu usuario" required value="<?php echo htmlspecialchars($defaults['usuario']); ?>">
                    </label>
                    <label>
                        Contrase&#241;a
                        <input type="password" name="contrasena" placeholder="Crea una contrase&#241;a segura" required>
                    </label>
                </div>
                <button type="submit">Guardar</button>
            </form>
        </div>
    </div>
    <div class="watermark">Hecho por Christian Velasquez 090-22-7443</div>
</body>
</html>



