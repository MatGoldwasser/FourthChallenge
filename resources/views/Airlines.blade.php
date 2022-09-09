<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>

<body>
<div class="px-6">
    <table class='bg-red-200 px-4'>

        <tr class="border-2 border-black">
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Cantidad de Vuelos</th>
            <th></th>
            <th></th>
        </tr>

        @foreach($airlines as $airline)
            <tr id="airline-{{$airline->id}}">
                <td>
                    <td>{{$airline->id}}</td>

                    <form method='POST' action="/airlines/{{$airline->id}}">
                        @csrf
                        @method('PUT')
                        <td>
                            <input type="text" id="name-{{$loop->index}}" name="name" value="{{$airline->name}}"
                                   class="bg-red-200" readonly>

                            <input id="description-{{$loop->index}}" name="description" value="{{$airline->description}}"
                                   class="bg-red-200" readonly>

                            <button type="submit" id="button-{{$loop->index}}"
                                    class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600"
                                    hidden>
                                Submit
                            </button>
                        </td>
                    </form>


                    <td class="text-center">{{$airline->number_of_flights}}</td>

                    <td>
                        <button type="submit" id="delete-button-{{$airline->id}}"
                                class="onDelete bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                            Eliminar
                        </button>
                    </td>

                    <td>
                        <button name="Editar" type="button"  id="edit-button-{{$airline->id}}"
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

<script>

    $(document).ready(function () {
        $(".onDelete").click(function (e) {
            const id = (this.id).split('-')[2];
            const pet = `/airlines/${id}`;
            e.preventDefault();
            $.ajax({
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                url: pet,
                type: 'delete',
                success: function(){
                    $(`#airline-${id}`).remove()
                }
            })
        });
    });
</script>

</html>
