<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Murid</h1>
        </div>
    </section>
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row col">
                        <div class="col-md-7 mb-3">
                            <h4>Daftar Murid</h4>
                        </div>
                        <div class="col-md-5">
                            <form action="" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Cari Murid.." name="keyword">
                                    <div class="input-group-append">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Cari">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="text-center">
                                <th width="5%">#</th>
                                <th>NIS</th>
                                <th width="30%">Nama Murid</th>
                                <th width="30%">Email</th>
                                <th width="20%">Kelas</th>
                                <th width="15%">Action</th>
                            </tr>
                            <?php for ($i = 1; $i <= 10; $i++) : ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td>
                                        <p>12345678</p>
                                    </td>
                                    <td>
                                        <p>Febrian Fauzi</p>
                                    </td>
                                    <td>
                                        <p>febrian@example.com</p>
                                    </td>
                                    <td>
                                        <p>10</p>
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