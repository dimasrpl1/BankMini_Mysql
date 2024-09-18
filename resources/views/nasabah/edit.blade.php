<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Nasabah - Bank Mini</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h4>Edit Nasabah</h4>
            <form action="{{ route('nasabah.update', $nasabah->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $nasabah->nama) }}" >
                </div>

                <div class="mb-3">
                    <label for="id_kelas" class="form-label">Kelas</label>
                    <select class="form-select" id="id_kelas" name="id_kelas">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id_kelas }}" @selected(old('id_kelas', $nasabah->id_kelas) == $k->id_kelas)>
                                {{ $k->kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_jurusan" class="form-label">Jurusan</label>
                    <select class="form-select" id="id_jurusan" name="id_jurusan">
                        <option value="">-- Pilih Jurusan --</option>
                        @foreach($jurusan as $j)
                            <option value="{{ $j->id_jurusan }}" @selected(old('id_jurusan', $nasabah->id_jurusan) == $j->id_jurusan)>
                                {{ $j->jurusan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="L" {{ old('jenis_kelamin', $nasabah->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin', $nasabah->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal_pembuatan" class="form-label">Tanggal Pembuatan</label>
                    <input type="date" class="form-control" id="tanggal_pembuatan" name="tanggal_pembuatan" value="{{ old('tanggal_pembuatan', $nasabah->tanggal_pembuatan->format('Y-m-d')) }}">
                </div>

                <div class="mb-3">
                    <label for="saldo" class="form-label">Saldo</label>
                    <input type="number" class="form-control" id="saldo" name="saldo" value="{{ old('saldo', $nasabah->saldo) }}" step="0.01">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="aktif" {{ old('status', $nasabah->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="non-aktif" {{ old('status', $nasabah->status) == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="rekening" class="form-label">Rekening</label>
                    <input type="text" class="form-control" id="rekening" name="rekening" value="{{ old('rekening', $nasabah->rekening) }}">
                </div>

                <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="text" class="form-control" id="nis" name="nis" value="{{ old('nis', $nasabah->nis) }}">
                </div>

                <button type="submit" class="btn btn-primary">Update Nasabah</button>
                <a href="{{ route('nasabah.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
