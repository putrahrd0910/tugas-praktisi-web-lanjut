<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Eloquent | putrahrd</title>
    </head>
    
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Data Produk
                </div>
                
                <div class="card-body">
                    <!-- <a href="/produk/tambah" class="btn btn-primary">
                        Input Produk Baru
                    </a> -->
                    <br/>
                    <br/>

                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Qty</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($produk as $i => $p)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->id_kategori }}</td>
                                <td>{{ $p->qty }}</td>
                                <td>{{ $p->harga_beli }}</td>
                                <td>{{ $p->harga_jual }}</td>
                                <!-- <td> 
                                    <a href="/produk/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
                                    <a href="/produk/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
                                 </td> -->
                                </tr>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>