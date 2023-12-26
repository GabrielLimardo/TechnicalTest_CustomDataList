    <h1>Resultados de búsqueda</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre de Lista</th>
                <th>Nombre de Columna</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
            <tr>
                <td>{{ $result->customDataList->name }}</td>
                <td>{{ $result->customDataColumn->name }}</td>
                <td>{{ $result->value }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

