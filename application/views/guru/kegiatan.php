<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Kegiatan</h1>
        </div>
    </section>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Tambah Kegiatan</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label>Nama Kegiatan</label>
                            <textarea class="form-control" style="height: 100px;"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" style="height: 100px;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Daftar Kegiatan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="text-center">
                                <th width="30%">Nama Kegiatan</th>
                                <th widht="55%">Keterangan</th>
                                <th width="15%">Action</th>
                            </tr>
                            <?php for ($i = 1; $i <= 10; $i++) : ?>
                                <tr>
                                    <td>
                                        <p>Kegiatan sekolah</p>
                                    </td>
                                    <td>
                                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    </td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-info btn-sm" title="Edit"><i class="fas fa-pen"></i></a>
                                        <a href="" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endfor ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>