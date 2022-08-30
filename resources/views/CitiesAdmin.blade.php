<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<table class = 'bg-red-500'>

    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Cantidad de Vuelos que llegan</th>
        <th>Cantidad de Vuelos que salen</th>

        <td>
            <button name="Editar" type="button">
                Editar
            </button>
        </td>
    </tr>

    @foreach($cities as $city)
        <tr>
            <td>{{$city->id}}</td>
            <td>{{$city->name}}</td>
            <td>Aca tengo que mostrar cantidad de vuelos que llegan</td>
            <td>Aca tengo que mostrar cantidad de vuelos que salen</td>
            @endforeach

            <td>
                <button name="Eliminar" type="button">
                    Eliminar
                </button>
            </td>

        </tr>
</table>

<h2>Agregar una nueva ciudad</h2>

<form method="POST" action="/cityAdmin">
    @csrf



    <label for="name">Name</label><br>
    <input type="text" id="name" name="name"><br><br>
    <input type="submit" value="Submit">

    @error("name")
    <strong>No se puede dejar el nombre vacio</strong>
    @enderror

</form>
</body>
</html>


