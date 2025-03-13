<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Bimbingan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <?php
    include 'header.blade.php';
    include 'koneksi.blade.php';
    ?>
  <body class="bg-light vh-100">
   
    <main class="container py-4" pt-2 pb-5 position-relative>
    <div class="row justify-content-center mt-0">
    <div class="col-md-10 col-lg-10">
       <!-- START FORM -->
       <form action='' method='post'style="margin-top:100px;">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ta" class="col-sm-2 col-form-label">Judul TA</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='ta' id="ta">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="dosen" class="col-sm-2 col-form-label">Dosen Pembimbing</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='dosen' id="dosen">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Bimbingan</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='tanggal' id="tanggal">
                </div>
            </div>
        
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Kirim</button></div>
          </form>
        </div>
        <!-- AKHIR FORM -->
        
    
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>