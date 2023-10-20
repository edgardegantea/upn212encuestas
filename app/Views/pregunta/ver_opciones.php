<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

    <h1>Opciones de Respuesta</h1>

    <h2>Pregunta:</h2>
    <p><?php echo $pregunta['pregunta']; ?></p>

<h2>Opciones de Respuesta:</h2>
<div class="card-body">
    <?php foreach ($opciones as $opcion): ?>
    <div class="card-text">
        <?php echo htmlspecialchars($opcion['opcion']); ?>
    </div>
    <?php endforeach; ?>
</div>

<a href="<?php echo base_url('pregunta/ver/' . $pregunta['id']); ?>">Volver a la pregunta</a>


<?= $this->endSection() ?>