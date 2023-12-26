
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Subir Excel</title>
</head>
<body>

    <h1>Subir Archivo Excel</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('upload.excel') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="file">Seleccione un archivo Excel:</label>
            <input type="file" name="file" id="file" required>
        </div>
        <br>
        <div>
            <button type="submit">Subir archivo</button>
        </div>
    </form>

</body>
</html>
