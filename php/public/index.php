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
    <title>Registro</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="main-wrapper">
        <div class="form-card">
            <div class="form-card__header">
                <span class="form-card__badge">Registro oficial</span>
                <h1>Formulario de Registro</h1>
            </div>
            <form action="registro.php" method="POST" novalidate>
                <fieldset>
                    <legend>Datos Generales</legend>
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
                            <input type="text" name="dpi" placeholder="Ingresa tu DPI guatemalteco" required pattern="[0-9]{13}" minlength="13" maxlength="13" inputmode="numeric" title="Ingresa 13 digitos sin espacios ni guiones" value="<?php echo htmlspecialchars($defaults['dpi']); ?>">
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
