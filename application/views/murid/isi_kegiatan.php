<link rel="stylesheet" href="<?= base_url(); ?>assets/css/datepicker.css">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<div class="m-content" data-content="Isi Kegiatan"></div>
<?php $this->session->unset_userdata('message'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Isi Kegiatan</h1>
        </div>
    </section>
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <form action="" method="POST">
                    <input type="hidden" name="nis" value="<?= $identitas ?>">
                    <div class="card-header">
                        <div class="input-group input-daterange col-md-8 mt-5">
                            <input type="text" id="start" class="form-control datepicker Tgl col-md-3" name="tgl" value="<?php if (isset($_POST['tgl'])) {
                                                                                                                                echo $_POST['tgl'];
                                                                                                                            } ?>">
                            <label class="form-control-placeholder" id="start-p" for="start">
                                <h4>Pilih Tanggal</h4>
                            </label>
                            <button type="submit" class="btn btn-primary">Pilih</button>
                        </div>
                        <div class="col-md-4 ml-4 mt-3">
                            <h4>Bulan Ini</h4>
                            <?php
                            $jumHari = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
                            for ($i = 1; $i <= $jumHari; $i++) : ?>
                                <?php
                                $date = $i . '-' . date('m-Y');
                                $hari = date('l', strtotime($date));
                                if (strlen($i) == 1) {
                                    $i = '0' . $i;
                                }
                                $this->db->where('tgl', $i . '-' . date('m-Y'));
                                $this->db->where('nis', $identitas); 
                                $row = $this->db->get('isi_kegiatan')->num_rows()?>
                                <button class="btn btn-<?php if ($hari == 'Sunday' || $hari == 'Minggu' || $hari == 'Saturday' || $hari == 'Sabtu') {
                                                            echo 'danger';
                                                        } else {
                                                            if ($row) {
                                                                echo 'success';
                                                            } else {
                                                                echo 'secondary';
                                                            }
                                                        } ?>" style="width: 60px;"><?= $i ?></button>
                            <?php endfor; ?><br>
                            <div class="col-md-12 mt-2">
                                <button class="btn-danger" style="height: 14px;"></button><small>&nbsp;Hari Libur</small>
                                <button class="btn-secondary ml-3" style="height: 14px;"></button><small>&nbsp;Belum Terisi</small>
                                <button class="btn-success ml-3" style="height: 14px;"></button><small>&nbsp;Sudah Terisi</small>
                            </div>
                        </div>
                    </div>
                </form>
                <?php if (empty($_POST['tgl'])) : ?>
                    <div class="card-body">
                        <p>Silahkan Masukan Tanggal Terlebih Dahulu</p>
                    </div>
                <?php else : ?>
                    <form action="" method="POST">
                        <input type="hidden" name="nis" value="<?= $identitas ?>">
                        <input type="hidden" name="tgl" value="<?= $_POST['tgl']; ?>">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr class="text-center">
                                        <th width="2%">No</th>
                                        <th>Nama Kegiatan</th>
                                        <th width="25%">Action</th>
                                    </tr>
                                    <?php
                                    $i = 1;
                                    if ($tindakan) :
                                        foreach ($tindakan as $row) : ?>
                                            <tr>
                                                <td class="text-center"><?= $i++ ?></td>
                                                <td>
                                                    <pre><?= $row->nama_kegiatan; ?></pre>
                                                </td>
                                                <td class="text-center">
                                                    <div class="form-group">
                                                        <select id="inputState" class="form-control" name="Pilihan[<?= $row->id ?>]">
                                                            <option value="Ya" <?php if ($row->tindakan == 'Ya') echo 'selected' ?>>Ya</option>
                                                            <option value="Tidak" <?php if ($row->tindakan == 'Tidak') echo 'selected' ?>>Tidak</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php
                                        endforeach;
                                    else :
                                        foreach ($kegiatan as $row) : ?>
                                            <tr>
                                                <td class="text-center"><?= $i++ ?></td>
                                                <td>
                                                    <pre><?= $row['nama_kegiatan'] ?></pre>
                                                </td>
                                                <td class="text-center">
                                                    <div class="form-group">
                                                        <select id="inputState" class="form-control" name="Pilihan[<?= $row['id'] ?>]" required>
                                                            <option value="">Pilih</option>
                                                            <option value="Ya">Ya</option>
                                                            <option value="Tidak">Tidak</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php endforeach;
                                    endif; ?>
                                </table>
                            </div>
                            <button class="btn btn-primary mt-1 mb-4 float-right" name="button" value="<?php if ($tindakan) {
                                                                                                            echo 'update';
                                                                                                        } else {
                                                                                                            echo 'simpan';
                                                                                                        } ?>">Simpan Kegiatan</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
            </form>
        </div>
    </div>
</div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script script>
    $.fn.datepicker.dates['id'] = {
        days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
        daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
        daysMin: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
        months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
        monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
        today: "Hari ini",
        clear: "Clear",
        format: "mm/dd/yyyy",
        titleFormat: "MM yyyy",
        /* Leverages same syntax as 'format' */
        weekStart: 0
    };

    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        daysOfWeekDisabled: [0, 6],
        language: 'id',
        clearBtn: true,
        disableTouchKeyboard: true
    });
</script>