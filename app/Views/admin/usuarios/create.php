<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/estilo.css'); ?>">
</head>
<body>
    <div class="form-container">
        <h2>Crear Usuario</h2>
        <form action="<?= base_url('admin/usuarios'); ?>" method="post">
            <?= csrf_field(); ?>


            <div class="input-container">
                <label for="rol">Tipo de usuario:</label>
                <select id="rol" name="rol" required>
                    <option value="admin">Administrador</option>
                    <option value="asg">Administrativos y servicios generales</option>
                    <option value="docente">Docente</option>
                    <option value="alumno">Alumno</option>
                </select>
            </div>
            <div class="input-container">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="input-container">
                <label for="apaterno">Apellido Paterno:</label>
                <input type="text" id="apaterno" name="apaterno" required>
            </div>
            <div class="input-container">
                <label for="amaterno">Apellido Materno:</label>
                <input type="text" id="amaterno" name="amaterno">
            </div>
            <div class="input-container">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-container">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-container">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-container">
                <label for="sexo">Sexo:</label>
                <input type="radio" id="sexo" name="sexo" value="f" required> Femenino
                <input type="radio" id="sexo" name="sexo" value="m" required> Masculino
            </div>
            <div class="input-container">
                <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" required>
            </div>
            
            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>
