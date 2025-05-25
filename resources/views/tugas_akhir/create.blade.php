<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Tugas Akhir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body class="bg-light vh-100">

    @include('header')

    <main class="container py-4 pt-2 pb-5 position-relative">
        <div class="row justify-content-center mt-0">
            <div class="col-md-10 col-lg-10 mt-50">
                <form action="{{ route('tugas_akhir.store') }}" method="POST" enctype="multipart/form-data" style="margin-top:100px;">
                    @csrf

                    <div class="my-3 p-3 bg-body rounded shadow-sm">

                        <!-- Judul -->
                        <div class="mb-3 row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul Tugas Akhir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="judul" id="judul">
                            </div>
                        </div>

                        <!-- NPM -->
                        <div class="mb-3 row">
                            <label for="npm" class="col-sm-2 col-form-label">NPM</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="npm" id="npm">
                            </div>
                        </div>

                        <!-- File Tugas Akhir -->
                        <div class="mb-3 row">
                            <label for="ta" class="col-sm-2 col-form-label">File Tugas Akhir</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="ta" id="ta">
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10 d-flex align-items-center">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="status" id="statusDiajukan" value="1">
                                    <label class="form-check-label" for="statusDiajukan">Diajukan</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="statusRevisi" value="0">
                                    <label class="form-check-label" for="statusRevisi">Revisi</label>
                                </div>
                            </div>
                        </div>

                        <!-- Field Revisi (hidden initially) -->
                        <div id="revisiFields" style="display: none;">
                            <div class="mb-3 row">
                                <label for="revisi" class="col-sm-2 col-form-label">File Revisi</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="revisi" id="revisi">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tgl" class="col-sm-2 col-form-label">Tanggal Revisi</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tgl" id="tgl">
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- JavaScript to handle show/hide -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const revisiFields = document.getElementById('revisiFields');
            const statusRadios = document.querySelectorAll('input[name="status"]');

            function toggleRevisiFields() {
                const selectedStatus = document.querySelector('input[name="status"]:checked');
                if (selectedStatus && selectedStatus.value === "0") {
                    revisiFields.style.display = 'block';
                } else {
                    revisiFields.style.display = 'none';
                }
            }

            toggleRevisiFields(); // Initial call
            statusRadios.forEach(function (radio) {
                radio.addEventListener('change', toggleRevisiFields);
            });
        });
    </script>

</body>
</html>
