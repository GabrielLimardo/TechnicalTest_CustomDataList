
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

    <br>
    <br>
    <br>
    
    <form action="{{ route('search') }}" method="post">
        @csrf

        <label for="list_name">Lista:</label>
        <input type="text" name="list_name" id="list_name">

        <label for="column_name">Columna:</label>
        <input type="text" name="column_name" id="column_name">

        <label for="search_term">Término de búsqueda:</label>
        <input type="text" name="search_term" id="search_term">

        <label for="search_type">Tipo de búsqueda:</label>
        <select name="search_type" id="search_type">
            <option value="contains">Contiene</option>
            <option value="equals">Igual a</option>
        </select>

        <button type="submit">Buscar</button>
    </form>


</body>
</html>
