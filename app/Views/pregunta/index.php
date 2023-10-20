<!DOCTYPE html>
<html>
<head>
    <title>Lista de Preguntas de la Encuesta</title>
</head>
<body>
<h1>Preguntas de la Encuesta</h1>

<p><a href="<?php echo base_url('encuesta'); ?>">Volver a la lista de encuestas</a></p>

<h2>Encuesta: <?php echo $encuesta['titulo']; ?></h2>

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
            <td><?php echo $pregunta['tipo']; ?></td>
            <td>
                <a href="<?php echo base_url('pregunta/edit/' . $pregunta['id']); ?>">Editar</a>
                <a href="<?php echo base_url('pregunta/delete/' . $pregunta['id']); ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
