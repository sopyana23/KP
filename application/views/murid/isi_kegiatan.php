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
                <div class="card-header">
                    <h4>Harian - Tanggal : 01/01/2021</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="text-center d-flex">
                                <th class="col-2" style="padding-top: 20px;">Nama Kegiatan</th>
                                <?php for ($i = 1; $i <= 10; $i++) : ?>
                                    <th class="col-2" style="padding-top: 20px;">Nama Kegiatan <?= $i; ?></th>
                                <?php endfor ?>
                            </tr>
                            <tr class="text-center d-flex">
                                <th class="col-2" style="padding-top: 20px;">Action</th>
                                <?php for ($i = 1; $i <= 10; $i++) : ?>
                                    <td class="col-2" style="padding-top: 20px;">
                                        <input type="checkbox">
                                    </td>
                                <?php endfor ?>
                            </tr>
                        </table>
                    </div>
                    <button class="btn btn-primary btn-sm mt-3 float-right">Simpan Kegiatan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Mingguan - Tanggal : 01/01/2021 - 07/01/2021</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="text-center">
                                <th>Nama Kegiatan</th>
                                <th>Senin</th>
                                <th>Selasa</th>
                                <th>Rabu</th>
                                <th>Kamis</th>
                                <th>Jumat</th>
                            </tr>
                            <?php for ($i = 1; $i <= 10; $i++) : ?>
                                <tr class="text-center">
                                    <td>Nama Kegiatan <?= $i; ?></td>
                                    <td><input type="checkbox"></td>
                                    <td><input type="checkbox"></td>
                                    <td><input type="checkbox"></td>
                                    <td><input type="checkbox"></td>
                                    <td><input type="checkbox"></td>
                                </tr>
                            <?php endfor ?>
                        </table>
                    </div>
                    <button class="btn btn-primary btn-sm mt-3 float-right">Simpan Kegiatan</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>