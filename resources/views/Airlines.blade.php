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
<div class="px-4">
    <table class='bg-red-200 px-4'>

        <tr class="border-2 border-black">
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Cantidad de Vuelos</th>
            <th>Eliminar aerolinea</th>
            <th>Editar aerolinea</th>
        </tr>

        @foreach($airlines as $airline)
            <tr>
                <td>
                    <td>{{$airline->id}}</td>
                    <td>{{$airline->name}}</td>
                    <td>{{$airline->description}}</td>
                    <td class="text-center">{{$airline->number_of_flights}}</td>

                    <td>
                        <form method='POST' action="/airlines/{{$airline->id}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" id="{{$airline->id}}"
                                    class="bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                                Eliminar
                            </button>
                        </form>
                    </td>

                    <td>
                        <button name="Editar" type="button"
                                class="bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                            Editar
                        </button>
                    </td>
                    @endforeach
                </tr>
    </table><br>


    {{ $airlines->links() }}

    <h1 class="text-4xl">Agregar una nueva aerolinea</h1><br>

    <form method="POST" action="/airlines">
        @csrf

        <label for="name">Nombre</label><br>
        <input type="text" id="name" name="name" class="border-2 border-black"><br><br>

        <label for="description">Descripcion</label><br>
        <input type="text" id="description" name="description" class="border-2 border-black"><br><br>

        <input type="submit" value="Submit"
               class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">

        @error("name")
        <strong>No se puede dejar el nombre vacio ni introducir un nombre ya existente</strong>
        @enderror

    </form>
</div>
</body>
</html>
