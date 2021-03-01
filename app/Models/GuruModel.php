<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class GuruModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_guru')->get();
    }

    public function detailData($id_guru)
    {
       return DB::table('tbl_guru')->where('id_guru', $id_guru)->first();
    }

    public function addData($data)
    {
        return DB::table('tbl_guru')->insert($data);
    }

    public function editData($id_guru, $data)
    {
         return DB::table('tbl_guru')->where('id_guru', $id_guru)->update($data);
    }

    public function deleteData($id_guru)
    {
         return DB::table('tbl_guru')->where('id_guru', $id_guru)->delete();
    }
    
}
