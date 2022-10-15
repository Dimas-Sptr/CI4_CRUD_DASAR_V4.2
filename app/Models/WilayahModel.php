<?php

namespace App\Models;

use CodeIgniter\Model;

class WilayahModel extends Model
{
    protected $table = 'iamwilayah';
    protected $primaryKey = 'PID';
    protected $allowedFields = ['PID', 'KODE_WILAYAH', 'TDK_AKTIF', 'NAMA_WILAYAH', 'NAMA_AREA', 'USER_ID'];


    function getData($id = "")
    {
        if ($id <> "") {
            $this->where(["PID" => $id]);
        }
        return $this->orderBy("KODE_WILAYAH", "ASC")->get();
    }
}
