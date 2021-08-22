<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<div class="m-content" data-content="Isi Kegiatan"></div>
<?php $this->session->unset_userdata('message'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Beranda Murid</h1>
        </div>
    </section>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="col mt-3">
                        <h6>Nama : <?= $user; ?></h6>
                        <h6>NIS : <?= $identitas; ?></h6>
                        <h6>Kelas : <?= $kelas; ?></h6>
                        <h6>Bulan : <?= date('F') ?></h6>
                        <div class="w-100 d-sm-none"></div><br><br>
                    </div>
                </div>
            </div>
            <table class="table table-responsive table-hover table-bordered">
                <thead class="thead-dark">
                    <th>Nama Kegiatan</th>
                    <?php $this->Absen_model->getTanggal(); ?>
                </thead>
                <?php $this->Absen_model->getData($kegiatan, $identitas); ?>
            </table>
        </div>
    </div>

</div>
</div>