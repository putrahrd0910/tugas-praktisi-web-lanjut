<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Post - putrahrd.com</title>
    <link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" 
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="font-weight-bold">Nama</label>
                        <input name="nama" type="text" class="form-control" 
                        placeholder="Masukkan Nama Mahasiswa"
                        value="{{ old('nama', $mahasiswa->nama) }}">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">NIM</label>
                        <input name="nim" type="text" class="form-control" 
                        placeholder="Masukkan NIM"
                        value="{{ old('nim', $mahasiswa->nim) }}">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Tanggal Lahir</label>
                        <input name="tgl_lahir" type="date" class="form-control"
                        value="{{ old('tgl_lahir', $mahasiswa->tgl_lahir) }}">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Alamat</label>
                        <input name="alamat" type="text" class="form-control" 
                        placeholder="Masukkan Alamat"
                        value="{{ old('alamat', $mahasiswa->alamat) }}">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Prodi</label>
                        <input name="prodi" type="text" class="form-control" 
                        placeholder="Masukkan Prodi" 
                        value="{{ old('prodi', $mahasiswa->prodi) }}">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">IPK</label>
                        <input name="ipk" type="text" class="form-control" 
                        placeholder="Masukkan IPK" 
                        value="{{ old('ipk', $mahasiswa->ipk) }}">
                    </div>

                    <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                </form> 
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
