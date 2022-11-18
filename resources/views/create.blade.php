<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>CRUD</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
    <h2>Add Produk</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('produk.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Produk :</strong>
<input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk">
@error('nama_produk')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>ID Produk:</strong>
<input type="text" name="id_produk" class="form-control" placeholder="ID Produk">
@error('id_produk')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Jumlah :</strong>
<input type="text" name="jumlah" class="form-control" placeholder="Jumlah">
@error('jumlah')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Harga Beli :</strong>
<input type="text" name="harga_beli" class="form-control" placeholder="Harga Beli">
@error('harga_beli')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Harga Jual:</strong>
<input type="text" name="harga_jual" class="form-control" placeholder="Harga Jual">
@error('harga_jual')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</body>
</html>