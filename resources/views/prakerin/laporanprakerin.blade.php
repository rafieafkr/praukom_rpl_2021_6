<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @page {
        size: auto;
        margin: 0mm;
    }

    table {
        font-size: 15px;
        text-align: center;
        border-collapse: collapse;
        margin: 4px;
    }

    th,
    td {
        padding: 5px;
    }
    </style>
</head>

<body>
    <center>
        <?php 
        $i = 1;
        ?>
        <h3>LAPORAN PRAKERIN SMK NEGERI 1 KOTA BEKASI</h3>
        <table border="1">
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>NIK Pembimbing Perusahaan</th>
                <th>Nama Pembimbing Perusahaan</th>
                <th>Nama Perusahaan</th>
                <th>Alamat Perusahaan</th>
                <th>Nama Pembimbing Sekolah</th>
                <th>Nama Kepala Program</th>
                <th>Angkatan</th>
                <th>Status</th>
            </tr>
            @foreach ($print as $key)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $key->nis }}</td>
                <td>{{ $key->nama_siswa }}</td>
                <td>{{ $key->nik_pp }}</td>
                <td>{{ $key->nama_pp }}</td>
                <td>{{ $key->nama_perusahaan }}</td>
                <td>{{ $key->alamat_perusahaan }}</td>
                <td>{{ $key->nama_ps }}</td>
                <td>{{ $key->nama_kaprog }}</td>
                <td>{{ $key->tahun }}</td>
                <td>{{ $key->status }}</td>
            </tr>
            @endforeach
        </table>
    </center>
    <script>
    window.print()
    </script>
</body>

</html>