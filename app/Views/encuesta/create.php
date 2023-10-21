<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>


<h1>Crear Nueva Encuesta</h1>


<form method="post" action="<?php echo site_url('encuesta'); ?>">
    <div class="form-group">
        <label for="titulo">Título:</label>
        <input class="form-control" type="text" name="titulo" required>    
    </div>
    
<div class="form-group">
    <label for="descripcion">Descripción:</label>
    <textarea class="form-control" name="descripcion" rows="4" cols="50" required></textarea>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="Guardar Encuesta">
    </div>
</form>


<?= $this->endSection(); ?>
