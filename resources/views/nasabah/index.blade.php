<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nasabah List - Bank Mini</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

            <h4>Nasabah List</h4>

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <a href="{{ route('nasabah.create') }}" class="btn btn-md btn-success mb-3 float-end">New Nasabah</a>

                    <form action="{{ route('nasabah.index') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama atau NIS" value="{{ request()->search }}">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                    </form>

                    <table class="table table-bordered mt-1 text-center">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Tanggal Pembuatan</th>
                            <th scope="col">Saldo</th>
                            <th scope="col">Status</th>
                            <th scope="col">Rekening</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($nasabah as $n)
                            <tr>
                                <td>{{ $n->id }}</td>
                                <td>{{ $n->nama }}</td>
                                <td>{{ $n->kelas->kelas ?? 'N/A' }}</td>
                                <td>{{ $n->jurusan->jurusan ?? 'N/A' }}</td>
                                <td>{{ $n->jenis_kelamin }}</td>
                                <td>{{ $n->tanggal_pembuatan->format('d-m-Y') }}</td>
                                <td>{{ $n->saldo }}</td>
                                <td>{{ $n->status }}</td>
                                <td>{{ $n->rekening }}</td>
                                <td>{{ $n->nis }}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('nasabah.destroy', $n->id) }}" method="POST">
                                        <a href="{{ route('nasabah.edit', $n->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center text-muted" colspan="11">Data nasabah tidak tersedia</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        {{ $nasabah->links('pagination::bootstrap-5') }}
                    </nav>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
