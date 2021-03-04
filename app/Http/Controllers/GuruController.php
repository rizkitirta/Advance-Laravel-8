<?php

namespace App\Http\Controllers;

use App\Models\GuruModel;
use PDF;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->GuruModel = new GuruModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'guru' => $this->GuruModel->allData(),
        ];
        return view('v_guru', $data);

    }

    public function detail($id_guru)
    {
        if (!$this->GuruModel->detailData($id_guru)) {
            abort(404);
        }

        $data = [
            'guru' => $this->GuruModel->detailData($id_guru),
        ];
        return view('v_detailGuru', $data);

    }

    public function add()
    {
        return view('v_addGuru');
    }

    public function insert()
    {
        //validasi
        Request()->validate([
            'nip' => 'required|unique:tbl_guru|min:5|max:255',
            'nama_guru' => 'required',
            'mapel' => 'required',
            'foto_guru' => 'required|mimes:jpg,bmp,png|max:10000',
        ]);

        //upload gambar
        $file = Request()->foto_guru;
        $fileName = Request()->nip . '.' . $file->extension();
        $file->move(public_path('images'), $fileName);

        $data = [
            'nip' => Request()->nip,
            'nama_guru' => Request()->nama_guru,
            'mapel' => Request()->mapel,
            'foto_guru' => $fileName,
        ];

        $this->GuruModel->addData($data);
        return redirect()->route('view.guru')->with('pesan', 'Data Berhasil Ditambahkan');

    }

    public function edit($id_guru)
    {
        $data = [
            'guru' => $this->GuruModel->detailData($id_guru),
        ];

        return view('v_editguru', $data);
    }

    public function update($id_guru)
    {
        //validasi
        Request()->validate([
            'nip' => 'required|min:5|max:255',
            'nama_guru' => 'required',
            'mapel' => 'required',
            'foto_guru' => 'mimes:jpg,bmp,png|max:10000',
        ]);

        if (Request()->foto_guru != "") {
            //jika ganti foto
            //upload gambar
            $file = Request()->foto_guru;
            $fileName = Request()->nip . '.' . $file->extension();
            $file->move(public_path('images'), $fileName);

            $data = [
                'nip' => Request()->nip,
                'nama_guru' => Request()->nama_guru,
                'mapel' => Request()->mapel,
                'foto_guru' => $fileName,
            ];

            $this->GuruModel->editData($id_guru, $data);

        } else {
            //Jika Tidak Mengganti Foto
            $data = [
                'nip' => Request()->nip,
                'nama_guru' => Request()->nama_guru,
                'mapel' => Request()->mapel,
            ];

            $this->GuruModel->editData($id_guru, $data);

        }

        return redirect()->route('view.guru')->with('pesan', 'Data Berhasil Diupdate');
    }

    public function delete($id_guru)
    {
        //Delete Foto
        $guru = $this->GuruModel->detailData($id_guru);
        if ($guru->foto_guru != "") {
            unlink(public_path('images') . '/' . $guru->foto_guru);
        }

        $this->GuruModel->deleteData($id_guru);
        return redirect()->route('view.guru')->with('pesan', 'Data Berhasil DiHapus');

    }

    public function cetakPdf()
    {
        $pdf = PDF::loadview('v_guru')->setPaper('A4', 'potrait');
        return $pdf->stream();

    }

}
