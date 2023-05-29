<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consume REST API Students || create</title>
</head>
<body>
    <h2>Tambah Data Siswa Baru</h2>
    @if (Session::get('errors'))
        <p style="color:red">{{ Session::get('errors') }}</p>
    @endif
    <form action="{{ route('send') }}" method="POST">
        @csrf 
        <div style="display:flex; margin-bottom:15px">
            <label for="nama">NAMA</label>
            <input type="text" name="nama" id="nama" placeholder="Nama Anda...">
        </div>
        <div style="display:flex; margin-bottom:15px">
            <label for="nis">NIS</label>
            <input type="text" name="nis" id="nis" placeholder="Nis Anda...">
        </div>
        <div style="display:flex; margin-bottom: 15px">
            <label for="rombel">Rombel</label>
            <select name="rombel" id="rombel">
                <option value="PPLG">PPLG</option>
                <option value="HTL">HTL</option>
                <option value="KLN">KLN</option>
            </select>
        </div>
        <div style="display:flex; margin-bottom:15px">
            <label for="rayon">Rayon</label>
            <input type="text" name="rayon" id="rayon" placeholder="contoh cic 2">
        </div>

        <button type="submit">Send</button>
    </form>
    
</body>
</html>