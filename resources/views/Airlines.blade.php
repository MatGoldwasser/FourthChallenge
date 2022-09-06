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
        </tr>

        @foreach($airlines as $airline)
                <tr>
                    <td>{{$airline->id}}</td>
                    <td>{{$airline->name}}</td>
                    <td>{{$airline->description}}</td>
                    <td class="text-center">{{$airline->number_of_flights}}</td>
                    @endforeach
                </tr>


    </table><br><br>
    {{ $airlines->links() }}
</div>
</body>
</html>
