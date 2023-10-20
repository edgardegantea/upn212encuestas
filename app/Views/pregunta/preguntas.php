<!DOCTYPE html>
<html>
<head>
    <title>Preguntas de la Encuesta</title>
</head>
<body>
<h1>Preguntas de la Encuesta</h1>

<p><a href="<?php echo base_url('encuesta'); ?>">Volver a la lista de encuestas</a></p>

<?php if ($encuesta): ?>
    <h2>Encuesta: <?php echo $encuesta['titulo']; ?></h2>
<?php endif; ?>

<!-- Agregar botón para crear una nueva pregunta -->
<a href="<?php echo base_url('pregunta/create/' . $encuestaId); ?>" class="btn btn-primary">Nueva Pregunta</a>

<table>
    <tr>
        <th>ID</th>
        <th>Pregunta</th>
        <th>Tipo</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($preguntas as $pregunta): ?>
        <tr>
            <td><?php echo $pregunta['id']; ?></td>
            <td><?php echo $pregunta['pregunta']; ?></td>
            <td><?php echo $pregunta['tipo_pregunta']; ?></td>
            <td>
                <!-- Agregar opciones de ver, editar y eliminar -->
                <a href="<?php echo base_url('pregunta/view/' . $pregunta['id']); ?>" class="btn btn-info">Ver</a>
                <a href="<?php echo base_url('pregunta/edit/' . $pregunta['id']); ?>" class="btn btn-warning">Editar</a>
                <a href="<?php echo base_url('pregunta/eliminar/' . $encuesta['id'] . '/' . $pregunta['id']); ?>">Eliminar</a>
                <a href="<?php echo base_url('pregunta/ver_opciones/' . $pregunta['id']); ?>">Ver Opciones</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
