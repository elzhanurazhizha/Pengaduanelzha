<?php 

namespace App\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;


class TanggapanController extends BaseController
{
    protected $tanggapans;
    protected $pengaduans;

    function __construct()
    {

        $this->tanggapans = new Tanggapan();
        $this->pengaduans = new Pengaduan();

    }
    public function save()
    {
        $date = date("Y-m-d");
        $data= array(
            'id_pengaduan'=> $this->request->getPost('id_pengaduan'),
            'tgl_tanggapan'=> $date,
            'tanggapan'=> $this->request->getPost('tanggapan'),
            'id_petugas'=> session()->get('id_petugas'),

        );
        $this->tanggapans->insert($data);
        $this->pengaduans->set('status','selesai');
        $this->pengaduans->where('id_pengaduan',$this->request->getPost('id_pengaduan'));
        $this->pengaduans->update();
        return redirect('pengaduan');
    }
}