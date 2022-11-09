<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data User</title>
</head>
<body>
    <h1>Tambah Data User</h1>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div>
            <label for="">Nama</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="">Email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password">
        </div>
        <div>
            <input type="submit" value="Simpan">
        </div>
    </form>

    <div class="{{ session()->has('success') ? 'showmessage' : ''}}">
        @if (session('success'))
        <h4>{{ session('success') }}</h4>
        @endif
    </div>
</body>
<script>
let x = document.getElementsByClassName("showmessage")[0];
setTimeout(function () {
    if (typeof x !== 'undefined'){
        x.style.display = "none";
        console.log("2 seconds end over..");
    }
}, 2000);
</script>
</html>