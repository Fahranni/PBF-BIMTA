<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  @include('header')
  <?php
    $data = file_get_contents("http://localhost/PBF/frontend/public/API/get_data.php?type=mahasiswa");
    $mahasiswa = json_decode($data, true);
    ?>
    
  <body class="bg-light vh-100">
   
    <main class="container py-4" pt-2 pb-5 position-relative>
    <div class="row justify-content-center mt-0">
    <div class="col-md-10 col-lg-10">
       <!-- START FORM -->
       <form action='' method='post' style="margin-top:100px;">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
                <label for="npm" class="col-sm-2 col-form-label">NPM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='npm' id="npm">
                </div>
        </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='angkatan' id="angkatan">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='email' id="email">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="no_telp" class="col-sm-2 col-form-label">No.Telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='no_telp' id="no_telp">
                </div>
            </div>
             </div>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
          </form>
        </div>
        <!-- AKHIR FORM -->
        
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                

                <div class="pb-3">
                  <a href='' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th class="col-md-1">No</th>
                            <th class="col-md-1">NPM</th>
                            <th class="col-md-3">Nama</th>
                            <th class="col-md-3">Angkatan</th>
                            <th class="col-md-2">Email</th>
                            <th class="col-md-2">No.Telepon</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
             if (!empty($mahasiswa) && is_array($mahasiswa)) {
                $no = 1;
                foreach ($mahasiswa as $row) {
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['npm']}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['angkatan']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['no_telp']}</td>
                            <td>
                                <a href='edit.php?id={$row['npm']}' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete.php?id={$row['npm']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                            </td>
                          </tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>Tidak ada data</td></tr>";
            }
            ?>
                    </tbody>
                </table>       
          </div>
    </div>
    </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>