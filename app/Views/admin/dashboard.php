<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

<a href="<?= site_url('admin/usuarios'); ?>">Ver usuarios registrados</a>
<!-- <a href="<?= site_url('admin/encuesta'); ?>">Iniciar encuesta</a> -->

<?= $this->endSection(); ?>

