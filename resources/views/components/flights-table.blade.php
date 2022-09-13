
    <div>
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
                <td>{{$flight->origin_id}}</td>
                <td>{{$flight->arrival_id}}</td>
                <td>{{$flight->takeoff_time}}</td>
                <td>{{$flight->arrival_time}}</td>
            @endforeach
        </table>
    </div>
