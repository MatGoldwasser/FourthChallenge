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
    <table>
        <tr>
            <th>ID</th>
            <th>Airline</th>
            <th>Origin</th>
            <th>Arrival</th>
            <th>Takeoff time</th>
            <th>Arrival time</th>
        </tr>


        @foreach($flights as $flight)
            <tr id="flight-{{$flight->id}}"></tr>
            <td>{{$flight->id}}</td>
            <td>{{$flight->airline}}</td>
            <td>{{$flight->origin}}</td>
            <td>{{$flight->arrival}}</td>
            <td>{{$flight->takeoff_time}}</td>
            <td>{{$flight->arrival_time}}</td>
        @endforeach
    </table><br><br>

    {{$flights->links()}}
    <br><br>

<form action="/AddFlight">
    <input type="submit" value="Add Flight"
           class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
</form>

</body>

</html>
