<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>



<h1>Detalles de la Pregunta</h1>

<p><strong>ID de la Pregunta:</strong> <?php echo $pregunta['id']; ?></p>
<p><strong>Pregunta:</strong> <?php echo $pregunta['pregunta']; ?></p>
<p><strong>Tipo:</strong> <?php echo $pregunta['tipo_pregunta']; ?></p>

<?php if ($pregunta['tipo_pregunta'] === 'seleccion_multiple'): ?>
    <h2>Opciones de Respuesta:</h2>


    <a href="<?php echo base_url('pregunta/agregar_opciones/' . $pregunta['id']); ?>" class="btn btn-primary">Agregar Opciones</a>
<?php endif; ?>

<!-- Otros detalles de la pregunta, si es necesario -->

<a href="<?php echo base_url('encuesta'); ?>">Volver a la lista de preguntas</a>


<?= $this->endSection() ?>
