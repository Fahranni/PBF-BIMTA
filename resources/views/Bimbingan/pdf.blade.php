<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Bimbingan</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px;
        }
        th, td { 
            border: 1px solid #000; 
            padding: 8px; 
            text-align: left;
        }
        th { 
            background-color: #eee; 
        }
    </style>
</head>
<body>
    <h1>Jadwal Bimbingan</h1>

    <table>
        <tbody>
            <tr>
                <th>Nama Mahasiswa</th>
                <td>{{ $bimbingan['nama_mahasiswa'] }}</td>
            </tr>
            <tr>
                <th>Nama Dosen</th>
                <td>{{ $bimbingan['nama_dosen'] }}</td>
            </tr>
            <tr>
                <th>Tanggal Bimbingan</th>
                <td>{{ $bimbingan['tanggal_bimbingan'] }}</td>
            </tr>
            <tr>
                <th>Catatan Bimbingan</th>
                <td>{{ $bimbingan['catatan_bimbingan'] }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $bimbingan['status'] == 1 ? 'Diajukan' : 'Revisi' }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
