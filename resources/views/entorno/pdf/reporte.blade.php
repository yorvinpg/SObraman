<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        .titulo {
            text-align: center;
            font: 2rem;
            color: blue;
        }
    </style>
</head>

<body>
    <div class="titulo">
        <h1>LISTADO DE O.T
    </div>
    <table class="table mt-4 table-bordered">
        <thead class="table-info">
            <tr>
                <th scope="col">OT</th>
                <th scope="col">FECHA</th>
                <th scope="col">RESPONSABLE</th>
                <th scope="col">UBICACION</th>
                <th scope="col">ESTADO</th>

            </tr>
        </thead>
        <tbody class="table-dark">
            @foreach ($solicit as $item)
            <tr>
                <td>{{$item->idsolicitudOT }}</td>
                <td>{{$item->fecha->format('Y-m-d')}}</td>
                <td>{{$item->encargado->nom_E }}</td>
                <td>{{$item->ubicacion->nom_ubi }}</td>
                <td>{{$item->estado->nombrE }}</td>
                @endforeach
        </tbody>
    </table>
    {{$solicit->links()}}
</body>

</html>
