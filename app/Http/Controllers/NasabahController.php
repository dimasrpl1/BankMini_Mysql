<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public function index(Request $request)
{
    $query = Nasabah::where('role', '!=', 'admin'); // Filter untuk menghilangkan admin

    // Tambahkan kondisi pencarian
    $query->where(function ($q) use ($request) {
        $q->where('nama', 'like', '%' . $request->search . '%')
          ->orWhere('nis', 'like', '%' . $request->search . '%');
    });

    // Ambil data dengan relasi dan pagination
    $nasabah = $query->with('kelas', 'jurusan')->paginate(10);

    return view('nasabah.index', compact('nasabah'));
}


    public function create()
    {
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('nasabah.create', compact('kelas', 'jurusan'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:100',
            'id_kelas' => 'nullable|integer',
            'id_jurusan' => 'nullable|integer',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_pembuatan' => 'required|date',
            'saldo' => 'required|numeric',
            'status' => 'required|in:aktif,non-aktif',
            'nis' => 'required|string|max:12',
        ]);

        // Mengenerate nilai acak untuk rekening
        $rekening = str_pad(rand(0, 999999999999), 12, '0', STR_PAD_LEFT);

        // Simpan data nasabah baru dengan password default
        Nasabah::create(array_merge($request->except(['rekening']), [
            'rekening' => $rekening,
            'password' => 'dimas' // Password default
        ]));

        return redirect()->route('nasabah.index')->with('message', 'Nasabah created successfully.');
    }

    public function destroy($id)
    {
        // Mencari nasabah berdasarkan ID
        $nasabah = Nasabah::findOrFail($id);

        // Menghapus nasabah
        $nasabah->delete();

        // Mengarahkan kembali ke halaman index dengan pesan sukses
        return redirect()->route('nasabah.index')->with('success', 'Nasabah berhasil dihapus.');
    }

    public function edit($id)
{
    $nasabah = Nasabah::findOrFail($id);
    $kelas = Kelas::all();
    $jurusan = Jurusan::all();

    return view('nasabah.edit', compact('nasabah', 'kelas', 'jurusan'));
}

public function update(Request $request, $id)
{
    // Cek data yang dikirimkan
    // Validasi data termasuk kelas dan jurusan
    $request->validate([
        'nama' => 'required|string|max:100',
        'id_kelas' => 'nullable|integer',
        'id_jurusan' => 'nullable|integer',
        'jenis_kelamin' => 'required|in:L,P',
        'tanggal_pembuatan' => 'required|date',
        'saldo' => 'required|numeric',
        'status' => 'required|in:aktif,non-aktif',
        'nis' => 'required|string|max:12',
    ]);

    // Cari nasabah berdasarkan ID
    $nasabah = Nasabah::findOrFail($id);

    // Update data nasabah
    $nasabah->update([
        'nama' => $request->nama,
        'id_kelas' => $request->id_kelas,
        'id_jurusan' => $request->id_jurusan,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tanggal_pembuatan' => $request->tanggal_pembuatan,
        'saldo' => $request->saldo,
        'status' => $request->status,
        'nis' => $request->nis,
    ]);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('nasabah.index')->with('message', 'Nasabah updated successfully.');
}




}

