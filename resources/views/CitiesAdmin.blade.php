<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <title>Document</title>
</head>
<body>
<div class="px-4">
    <table class='bg-red-200 px-4'>

        <tr class="border-2 border-black">
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad de Vuelos que llegan</th>
            <th>Cantidad de Vuelos que salen</th>
            <th>Editar o eliminar ciudad</th>
        </tr>

        @foreach($cities as $city)
            <tr id="city-{{$city->id}}">
                <td>{{$city->id}}</td>
                <form method='POST' action="/cities/{{$city->id}}">
                    <!-- tengo que hacer que cuando haga click le saque el readonly y le haga un post del nombre para editar -->
                    @csrf
                    @method('PUT')
                    <td>
                        <input type="text" id="input-{{$loop->index}}" name="name" value="{{$city->name}}"
                               class="bg-red-200" readonly> <!-- readonly -->

                        <button type="submit" id="button-{{$loop->index}}"
                                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600"
                                hidden> <!-- hidden -->
                            Submit
                        </button>
                    </td>
                </form>
                <td>Aca tengo que mostrar cantidad de vuelos que llegan</td>
                <td>Aca tengo que mostrar cantidad de vuelos que salen</td>
                <td class="px-6">

                        <button type="submit" id="delete-button-{{$city->id}}"
                                class="onDelete bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                            Eliminar
                        </button>

                    <button name="Editar" type="button" onclick="editarNombre({{$loop->index}})" id="{{$city->id}}"
                            class="bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                        Editar
                    </button>
                    <br><br>


                </td>
                @endforeach

            </tr>
    </table>
    <br><br>

    {{ $cities->links() }}



    <h1>Agregar una nueva ciudad</h1><br>

    <form method="POST" action="/cities">
        @csrf

        <label for="name">Nombre</label><br>
        <input type="text" id="name" name="name" class="border-2 border-black"><br><br>
        <input type="submit" value="Submit"
               class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">

        @error("name")
        <strong>No se puede dejar el nombre vacio ni introducir un nombre ya existente</strong>
        @enderror

    </form>
</div>
</body>

<script>
    $(document).ready(function () {
        $(".onDelete").click(function (e) {
            const id = (this.id).split('-')[2];
            const pet = `/cities/${id}`;
            e.preventDefault();
            $.ajax({
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                url: pet,
                type: 'delete',
                success: function(){
                    $(`#city-${id}`).remove()
                }
            })
        });
    });
</script>
</html>


