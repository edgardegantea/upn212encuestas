<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>


<h1>Editar Encuesta</h1>

<form method="post" action="<?php echo base_url('encuesta/' . $encuesta['id']); ?>">

    <div class="form-group">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" value="<?php echo $encuesta['titulo']; ?>" required>
    </div>


    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" rows="4" cols="50" required><?php echo $encuesta['descripcion']; ?></textarea>

    <input type="hidden" name="_method" value="PUT">
    <input type="submit" value="Guardar Cambios">
</form>


<?= $this->endSection() ?>
