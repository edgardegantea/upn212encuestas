<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>






<?php if ($encuesta): ?>
    <h2>Encuesta: <?php echo $encuesta['titulo']; ?></h2>
    <p><?php echo $encuesta['descripcion']; ?></p>
<?php endif; ?>

<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
    <a class="btn btn-light me-md-2" href="<?php echo base_url('encuesta'); ?>">Volver a la lista de encuestas</a></p>
    <a class="btn btn-primary ml-2" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Tooltip on bottom" href="<?php echo base_url('pregunta/create/' . $encuesta['id']); ?>" class="btn btn-primary">Agregar Nueva Pregunta</a>
</div>




<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Preguntas de la encuesta</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
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
                            <td>
                                <?= $pregunta['tipo_pregunta'] == 'seleccion_multiple' ? 'Selección múltiple' : 'Abierta'; ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('pregunta/ver/' . $pregunta['id']); ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <a href="<?php echo base_url('pregunta/edit/' . $pregunta['id']); ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="<?php echo base_url('pregunta/delete/' . $encuesta['id'] . '/' . $pregunta['id']); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                <?php if ($pregunta['tipo_pregunta'] === 'seleccion_multiple'): ?>
                                    <a href="<?php echo base_url('pregunta/agregar_opciones/' . $pregunta['id']); ?>" class="btn btn-light"><i class="fas fa-list"></i></a>
                                    <a href="<?php echo base_url('pregunta/ver_opciones/' . $pregunta['id']); ?>" class="btn btn-light"><i class="fas fa-list-check"></i></a>
                                <?php endif; ?>


                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>



            </div>

        </div>

    </div>
</div>



<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>




<?= $this->endSection() ?>
