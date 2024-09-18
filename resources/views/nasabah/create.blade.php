<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create New Nasabah - Bank Mini</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <h4>Create New Nasabah</h4>
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('nasabah.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama">Name</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="id_kelas">Kelas</label>
                            <select class="form-control @error('id_kelas') is-invalid @enderror" name="id_kelas">
                                <option value="">Select Kelas</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id_kelas }}" {{ old('id_kelas') == $k->id_kelas ? 'selected' : '' }}>
                                        {{ $k->kelas }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_kelas')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="id_jurusan">Jurusan</label>
                            <select class="form-control @error('id_jurusan') is-invalid @enderror" name="id_jurusan">
                                <option value="">Select Jurusan</option>
                                @foreach($jurusan as $j)
                                    <option value="{{ $j->id_jurusan }}" {{ old('id_jurusan') == $j->id_jurusan ? 'selected' : '' }}>
                                        {{ $j->jurusan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_jurusan')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" required>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_pembuatan">Tanggal Pembuatan</label>
                            <input type="date" class="form-control @error('tanggal_pembuatan') is-invalid @enderror" name="tanggal_pembuatan" value="{{ old('tanggal_pembuatan') }}" required>
                            @error('tanggal_pembuatan')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="saldo">Saldo</label>
                            <input type="number" class="form-control @error('saldo') is-invalid @enderror" name="saldo" value="{{ old('saldo') }}" required>
                            @error('saldo')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status" required>
                                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="non-aktif" {{ old('status') == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                        

                        <div class="mb-3">
                            <label for="nis">NIS</label>
                            <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis') }}" required>
                            @error('nis')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">Save</button>
                        <a href="{{ route('nasabah.index') }}" class="btn btn-md btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
