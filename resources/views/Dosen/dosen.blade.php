<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  @include('header')
  <?php
   
   $data = file_get_contents("http://localhost/PBF/PBF-frontend-main/public/API/get_data.php?type=dosen");
    $dosen = json_decode($data, true);
    ?>
    
  <body class="bg-light vh-100">
   
    <main class="container py-4"  pt-2 pb-5 position-relative>
    <div class="row justify-content-center mt-5">
    <div class="col-md-10 col-lg-10 mt-50">

        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                    <a href="{{ route('dosen.create') }}" class="btn btn-primary">+ Tambah Data</a>

                </div>
          
                <table class="table table-striped ">
                    <thead>
                        <tr>
                        <th class="col-md-1">No</th>
                            <th class="col-md-1">NIDN</th>
                            <th class="col-md-3">Nama</th>
                            <th class="col-md-2">Email</th>
                            <th class="col-md-2">No.Telepon</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
if (!empty($dosen) && is_array($dosen)) {
    $no = 1;
    foreach ($dosen as $row) {
        echo "<tr>
                <td>{$no}</td>
                <td>{$row['nidn']}</td>
                <td>{$row['nama']}</td>
                <td>{$row['email']}</td>
                <td>{$row['no_telp']}</td>
                <td>
                    <a href='edit.php?id={$row['nidn']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='delete.php?id={$row['nidn']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                </td>
              </tr>";
        $no++;
    }
} else {
    echo "<tr><td colspan='6' class='text-center text-danger'>Data tidak ditemukan!</td></tr>";
}
?>

                    </tbody>
                </table>       
          </div>
          <!-- AKHIR DATA -->
    </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>