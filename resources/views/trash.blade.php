<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consume REST API Students || trash</title>
</head>
<body>
    @if (Session::get('eror'))
        <p style="padding: 5px 10px; background: red; color:white; margin: 10px;">{{ Session::get('eror') }}</p>
    @endif
    @if (Session::get('success'))
        <p style="padding: 5px 10px; background:green; color:white; margin: 10px;">{{ Session::get('success') }}</p>
    @endif
   <a href="/">Kembali</a>
    @foreach ($studentsTrash as $student)
    <ul>
        <li>NIS : {{ $student['nis'] }}</li>
        <li>Nama : {{ $student['nama'] }}</li>
        <li>Rombel : {{ $student['rombel'] }}</li>
        <li>Rayon : {{ $student['rayon'] }}</li>
        <li>Dihapus Tanggal : {{ \carbon\carbon::parse($student['deleted_at'])->format('j F, Y') }}</li>
        <li>
            <a href="{{route('restore', $student['id']) }}">Kembalikan Data</a> ||
            <a href="{{route('permanent', $student['id']) }}">Hapus Permanen</a>
        </li>
    </ul>
        @endforeach
</body>
</html>