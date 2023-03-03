<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
Data Pengaduan
<?= $this->endSection() ?>
<?= $this->Section('content') ?>
<div class="col">
    <di class="card">
        <div class="card-header">
            <?php
            if (session()->get('level') == 'masyarakat') {
            ?>
                <a href="#" data-toggle="modal" data-target="#modalPengaduan" class="btn btn-primary">Tambah Pengaduan</a>
            <?php
            }
            ?>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>No</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Isi laporan</th>
                    <th>Foto</th>
                    <th>Opsi</th>
                </tr>
                </thead>
                <?php
                $no = 0;
                foreach ($pengaduan as $row) {
                    $data = $row['id_pengaduan'] . "," . $row['tgl_pengaduan'] . "," . $row['nik'] . "," . $row['isi_laporan'] . "," . $row['foto'] . "," . $row['status'] . "," . base_url('pengaduan/edit/' . $row['id_pengaduan']);
                    # code... 
                    $no++;
                ?>
                    <tr class="text-center">
                        <td><?= $no ?></td>
                        <td><?= $row['tgl_pengaduan'] ?></td>
                        <td><?= $row['isi_laporan'] ?></td>
                        <td><?= $row['foto'] ?></td>
                        <td>
                            <?php
                            if (session('level') == 'masyarakat') {
                                if ($row['status'] == '0') {
                            ?>
                                    <a onclick="return confirm('Yakin hapus data???');" class="btn btn-danger" href="/pengaduan/delete/<?= $row['id_pengaduan'] ?>"><i class="fa fa-trash"></i></a>

                                <?php
                                } else {
                                    //ini tempat tombol lihat tanggapan
                                }
                            }
                            if (!empty(session('level')) && session('level') != 'masyarakat') {
                                if ($row['status'] == '0') {
                                ?>
                                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modalTanggapan" data-pengaduan="<?= $row['id_pengaduan'] ?>">Tanggapi</a>
                            <?php

                                } else {
                                }
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
</div>
<div class="modal fade" id="modalPengaduan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Tambah Pengaduan</h5>
            </div>
            <form action="/tambahpengaduan" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Isi Laporan</label>
                        <textarea class="form-control" name="isi_laporan" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"> Simpan</button>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalTanggapan" aria-hidden="true">
    <div class="modal=dialog">
        <div class="modal-content">
            <div class="modal-header"> </div>
            <form action="/tanggapi" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tanggapan</label>
                        <textarea name="tanggapan" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


</script>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<?= $this->endSection() ?>