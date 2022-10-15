<?php

namespace App\Controllers;

use App\Models\WilayahModel;

class Wilayah extends BaseController
{
    public function __construct()
    {
        $this->title = "Wilayah";
        $this->module = "Wilayah";
        $this->iamwilayah = new WilayahModel();
    }
    public function index()
    {
        $data = [
            "title" => $this->title,
            "module" => $this->module,
            "act"   => "",
            "iamwilayah" => $this->iamwilayah->getData()->getResult(),
        ];
        return view($this->module, $data);
    }
    public function formAdd()
    {
        $data = [
            "title" => $this->title,
            "module" => $this->module,
            "act"   => "formAdd",
        ];
        return view($this->module, $data);
    }
    public function formEdit($id = "")
    {
        $data = [
            "title" => $this->title,
            "module" => $this->module,
            "act" =>    "formEdit",
            "result" => $this->iamwilayah->getData($id)->getFirstRow(),
        ];
        return view($this->module, $data);
    }

    public function insert()
    {
        $request = \Config\Services::request();
        $this->iamwilayah->transStart();
        $nama = $request->getVar('nama');
        $kode = $request->getVar('kode');
        $area = $request->getVar('area');

        $builder = $this->iamwilayah->where(["KODE_WILAYAH" => $kode, "NAMA_AREA" => $area])->get();
        if ($builder->getNumRows() > 0) {
            return $this->response->setJSON(json_encode(["status" => false, "pesan" => "Kode Sudah Ada"]));
        };

        $data = [
            "KODE_WILAYAH" => $kode,
            "NAMA_WILAYAH" => $nama,
            "NAMA_AREA"    => $area,

        ];
        $query = $this->iamwilayah->insert($data, false);
        if (!$query) {
            return $this->response->setJSON(json_encode(['status' => false, "message" => "Simpan data gagal!"]));
        }
        $this->iamwilayah->transComplete();
        // return $this->response->setJSON(json_encode(['status' => true, "result" => view($this->module)]));
        return redirect($this->module);
    }
    public function update()
    {

        $request = \Config\Services::request();
        $this->iamwilayah->transStart();
        $id = $request->getVar('pid');
        $kode = $request->getVar('kode');
        $area = $request->getVar('area');
        $builder = $this->iamwilayah->where(["KODE_WILAYAH" => $kode, "NAMA_AREA" => $area, "PID !=" => $id])->get();
        if ($builder->getNumRows() > 0) {
            return $this->response->setJSON(json_encode(["status" => false, "pesan" => "Kode Sudah Ada"]));
        };
        $data = [
            "KODE_WILAYAH" => $kode,
            "NAMA_WILAYAH" => $request->getVar('nama'),
            "NAMA_AREA"    => $request->getVar('area',)
        ];
        $query = $this->iamwilayah->update($id, $data);
        if (!$query) {
            return $this->response->setJSON(json_encode(["status" => false, "pesan" => "Gagal Update data"]));
        }

        $this->iamwilayah->transComplete();
        return redirect($this->module);
    }
    public function delete($id = "")
    {
        $request = \Config\Services::request();
        $this->iamwilayah->transStart();
        // $id = $request->getVar('pid');

        $query = $this->iamwilayah->where(["PID" => $id])->delete();
        if (!$query) {
            return $this->response->setJSON(json_encode(['status' => false, "message" => "Hapus data gagal!"]));
        }
        $this->iamwilayah->transComplete();
        return redirect($this->module);
    }
}
