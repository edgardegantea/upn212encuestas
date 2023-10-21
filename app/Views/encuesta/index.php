<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>



<h1>Encuestas</h1>

<!-- Agregar botón para crear una nueva pregunta -->
<a href="<?php echo base_url('encuesta/create'); ?>" class="btn btn-primary mb-3">Agregar nueva encuesta</a>



<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($encuestas as $encuesta): ?>
        <tr>
            <td><?php echo $encuesta['id']; ?></td>
            <td><?php echo $encuesta['titulo']; ?></td>
            <td>
                <a class="btn btn-info" href="<?php echo base_url('encuesta/asignar_encuesta/' . $encuesta['id']); ?>">Asignar</a>
                <a class="btn btn-primary" href="<?php echo base_url('encuesta/edit/' . $encuesta['id']); ?>">Editar</a>
                <a class="btn btn-danger" href="<?php echo base_url('encuesta/delete/' . $encuesta['id']); ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                <!-- Agregar enlace para ver preguntas de la encuesta -->
                <a class="btn btn-secondary" href="<?php echo base_url('encuesta/preguntas/' . $encuesta['id']); ?>">Ver Preguntas</a>
                <!-- <a class="btn btn-danger" href="<?php echo base_url('encuesta/aplicar/' . $encuesta['id']); ?>">Aplicar Encuesta</a> -->
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</div>



<?= $this->endSection() ?>

