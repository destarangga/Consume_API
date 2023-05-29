<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consume REST API Students || edit</title>
</head>
<body>
    <h2>Edit Data Siswa Baru</h2>
    @if (Session::get('errors'))
        <p style="color:red">{{ Session::get('errors') }}</p>
    @endif
    <form action="{{ route('update', $student['id']) }}" method="POST">
        @csrf 
        @method('PATCH')
        <div style="display:flex; margin-bottom:15px">
            <label for="nama">NAMA</label>
            <input type="text" name="nama" value="{{ $student['nama'] }}" id="nama" placeholder="Nama Anda...">
        </div>
        <div style="display:flex; margin-bottom:15px">
            <label for="nis">NIS</label>
            <input type="text" name="nis" value="{{ $student['nis'] }}" id="nis" placeholder="Nis Anda...">
        </div>
        <div style="display:flex; margin-bottom: 15px">
            <label for="rombel">Rombel</label>
            <select name="rombel" id="rombel">
                <option value="PPLG" {{ $student['rombel'] == 'PPLG' ? 'selected' : '' }}>PPLG</option>
                <option value="HTL" {{ $student['rombel'] == 'HTL' ? 'selected' : '' }}>HTL</option>
                <option value="KLN" {{ $student['rombel'] == 'KLN' ? 'selected' : '' }}>KLN</option>
            </select>
        </div>
        <div style="display:flex; margin-bottom:15px">
            <label for="rayon">Rayon</label>
            <input type="text" name="rayon" value="{{ $student['rayon'] }}" id="rayon" placeholder="contoh cic 2">
        </div>

        <button type="submit">Send</button>
    </form>
    
</body>
</html>