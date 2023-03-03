<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
Tanggapan
<?= $this->endSection() ?> 
<?= $this->section('content') ?> 
<div class="container-fluid mt-4 mb-5"> 

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-5" aria-label="breadcrumb"> 
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb mt-3" style="background: #EEEEEE;">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li> 
            <li class="breadcrumb-item active" aria-current="page">Data Pengaduan</li> 
         </ol> 
    </div>
    
    <!-- Content Row --> 
    <div class="row mx-4"> 
      <div class="col-lg-12"> 
        <div class="card">
        <div class="card-header" style="background: #393E46;">
                    <h1 class="text-white mb-3">Data Petugas</h1>
                    <a href="" class="btn text-white mb-1" style="background: #00ADB5;">
                        Tambah Data</a>
                </div>
                <div class="card-body mx-3">
                    <form action="/tanggapanP/filter" method="post" class="row">
                        <div class="col">
                            <select name="status" id="status" class="form-control">
                                <option value="">Semua</option>
                                <option value="0">Belum Ditanggapi</option>
                                <option value="proses">Sedang Diproses</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    <table class="table table-border">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pengaduan</th>
                                <th>NIK</th>
                                <th>Laporan Pengaduan</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Aksi</th>
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
                            <td><?= $row['nik'] ?></td>
                            <td><?= $row['isi_laporan'] ?></td>
                            <td>
                                <?php if ($row['foto'] != "") { ?>
                                <img src="uploads/berkas/<?= $row['foto'] ?>" alt="" height="50" width="50">
                                <?php } else {
                                    ?>
                                Tidak ada gambar
                                <?php
                                    } ?>
                            </td>
                            <td><?= $row['status'] ?></td>
                            <td>

                                <?php
                                    if ($row['status'] != "Selesai") {
                                    ?>
                                <a href="#" data-toggle="modal" data-target="#fpengaduan" data-pengaduan="<?= $data ?>"
                                    class="btn btn-success">
                                    <i class="fas fa-reply">&nbsp;&nbsp;</i>Tanggapi</a>
                                <?php
                                    } else {
                                    ?>
                                <a href="#" data-toggle="modal" data-target="#fpengaduan" data-pengaduan="<?= $data ?>"
                                    class="btn btn-success">
                                    <i class="fas fa-reply"></i>Lihat Tanggapan</a>
                                <?php
                                    }
                                    ?>
                                <!--  -->
                                <!-- <a href="/pengaduan/delete/ / $row['id_pengaduan'] "
                                    onclick="return confirm('Yakin mau hapus data')" class="btn btn-danger"><i
                                        class="fas fa-trash"></i>hapus</a> -->
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="fpengaduan" tabindex="-1" aria-labelledby="#exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" data-dismiss="modal"></span>
                </button>
            </div>

            <form action="" id="addTanggappan" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tgl_pengaduan">Tanggal Pengaduan</label>
                        <input type="date" name="tgl_pengaduan" id="tgl_pengaduan" class="form-control" readonly>
                        <input type="hidden" name="id_pengaduan" id="id_pengaduan">
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="isi_laporan"> Isi Laporan</label>
                        <textarea class="form-control" name="isi_laporan" id="isi_laporan" rows="3" readonly></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <img src="uploads/berkas/" alt="" height="50" width="50">
                        <!-- <input type="file" name="foto" id="foto" class="form-control"> -->
                    </div>
                    <!-- <div class="form-group">
                        <label for="tanggapan">Isi Tanggapan</label>
                        <textarea class="form-control" name="tanggapan" id="tanggapan" rows="3"></textarea>
                    </div> -->
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary fw-bold"> Save Change </button>
                    <button type="button" class="btn btn-secondary fw-bold" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if (!empty(session()->getFlashdata("message"))) : ?>
<div class="alert alert-success">
    <?= session()->getFlashdata("message") ?>
</div>

<?php endif ?>
<?= $this->endSection() ?>
<?= $this->Section('script') ?>
<script>
$(document).ready(function() {
    $("#fpengaduan").on('show.bs.modal', function(e) {
        // alert('asa);
        var button = $(e.relatedTarget);
        var data = button.data('pengaduan');

        if (data != "add") {
            const barisdata = data.split(",");
            $('#tgl_pengaduan').val(barisdata[1]);
            $('#nik').val(barisdata[2]);
            $('#isi_laporan').val(barisdata[3]);
            if (barisdata[4] != null) {
                // alert('asa);
                // $('foto').attr("src","uploads/berkas/".barisdata[4]);
            }
            $('#status').val(barisdata[5]).change();
            // $("#editpengaduan").attr('action', barisdata[6]);
        } else {
            // $('#tgl_pengaduan').val('');
            // $('#nik').val('');
            // $('#isi_laporan').val('');
            // $('#foto').val('');
            // $('#status').val('');
            // $("#editpengaduan").attr('action', 'pengaduan');
        }
    });
});
</script>
<?= $this->endSection() ?> 