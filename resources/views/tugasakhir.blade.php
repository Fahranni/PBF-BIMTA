<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  @include('header')

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
                <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama_mahasiswa' id="nama_mahasiswa">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama_dosen" class="col-sm-2 col-form-label">Nama Dosen</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama_dosen' id="nama_dosen">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="judul" class="col-sm-2 col-form-label">Judul TA</label>
                <div class="col-sm-10">
                    <input type="judul" class="form-control" name='judul' id="judul">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tgl_bimbingan" class="col-sm-2 col-form-label">Tanggal Bimbingan</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='tgl_bimbingan' id="tgl_bimbingan">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="catatan" class="col-sm-2 col-form-label">Catatan Bimbingan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='catatan' id="catatan">
                </div>
            </div>
    </div>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
          </form>
        </div>
        <!-- AKHIR FORM -->
        
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th class="col-md-1">No</th>
                            <th class="col-md-3">NPM</th>
                            <th class="col-md-1">Nama Mahasiswa</th>
                            <th class="col-md-4">Nama Dosen</th>
                            <th class="col-md-2">Judul</th>
                            <th class="col-md-2">Tanggal Bimbingan</th>
                            <th class="col-md-2">Catatan Bimbingan</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT a.nama, a.npm, a.angkatan, a.email, a.no_telp, b.judul FROM mahasiswa a LEFT JOIN tugas_akhir b ON a.npm = b.npm";
                        $result = $conn->query($sql);
                        ?>
                    <?php
             if ($result->num_rows > 0) {
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['npm']}</td>
                            <td>{$row['angkatan']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['no_telp']}</td>
                            <td>{$row['judul']}</td>
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
          <!-- AKHIR DATA -->
    </div>
    </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>