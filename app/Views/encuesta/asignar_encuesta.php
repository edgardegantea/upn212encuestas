<!DOCTYPE html>
<html>
<head>
    <title>Asignar Encuesta por Rol</title>
</head>
<body>
    <h1>Asignar Encuesta por Rol</h1>

    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if (isset($success)): ?>
        <p class="success"><?php echo $success; ?></p>
    <?php endif; ?>

    <form method="post" action="<?php echo base_url('admin/asignar_encuesta_por_rol'); ?>">
        <label for="rol">Selecciona un Rol:</label>
        <select name="rol" id="rol">
            <option value="administrador">Administrador</option>
            <option value="usuario">Usuario</option>
            <!-- Agrega más opciones según los roles de tu aplicación -->
        </select>

        <button type="submit">Asignar Encuesta</button>
    </form>
</body>
</html>
