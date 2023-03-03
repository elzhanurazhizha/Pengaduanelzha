<?= $this->extend('layouts/admin')?>
<?= $this->section('title')?>
Tanggapan 
<?= $this->endSection()?>
<?= $this->section('content')?>
<div class="container-fluid">

     <!-- Page Heading --> 
     <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

     </div> 

     <!-- Content Row --> 
     <div class="row">
        <div class="col-lg-12"> 
            <div class="card"> 
               <div class="card-header bg-info">
                  <h3>Tanggapan</h3>  
                  <a href="/pengaduan" class="btn btn-primary">Tambah Data</a> 
                  <!-- <a href=/fTanggapan" class="btn btn-primary">Tambah Data</a> -->
               </div> 
               <div class="card-body"> 
                  <form action="/pengaduan/filter" method="post" class="row">
                     <div class="col">
                        <select name="status" id="status" class="form-control"> 
                           <option value="">Semua</option> 
                           <option value="0">Belum Ditanggapi</option>
                           <option value="proses">Sedang Diproses</option>
                           <option value="Selesai">Selesai</option>
                        </select>
                     </div> 
                     <div class="col"> 
                        <button type="submit" class="btn btn-primary">Cari</button>
                     </div> 
                  </form> 
                  <div class="card-body"> 
                     <table class="table table-border"> 
                        <tr>
                           <th>No</th>
                           <th>NIK</th>
                           <th>Tanggal Pengaduan</th>
                           <th>Foto</th>
                           <th>Pengaduan</th>
                           <th>Status</th>
                           <th>Aksi</th>
                        </tr>
                     </table>
                  </div> 
               </div> 
            </div> 
        </div> 
     </div> 
     <?= $this->endSection()?>