<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>



            #currency td, #currency th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #currency tr:nth-child(even){background-color: #f2f2f2;}

            #currency tr:hover {background-color: #ddd;}

            #currency th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #04AA6D;
                color: white;
            }
        </style>
        <script type="text/javascript">
            async function setCheck(id){
                var status = false
                status = document.getElementById('check_'+id).checked ? 1 : 0;
                let response = await fetch('/api/set-status/' + id, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
                    body: JSON.stringify({
                        is_active : status
                    })
                });
            }
        </script>
    </head>
    <body>
    <div align="center">
        <h4>List of countries</h4>
        <table id="currency">
            <tr>
                <th>Entity</th>
                <th>Currency</th>
                <th>Alphabetic Code</th>
                <th>Numeric Code</th>
                <th>Minor unit</th>
                <th>Is active</th>
            </tr>
            @foreach($currencies as $item)
                <tr>
                    <td>{{$item->entity}}</td>
                    <td>{{$item->currency}}</td>
                    <td>{{$item->alpha_code}}</td>
                    <td>{{$item->number_code}}</td>
                    <td>{{$item->minor_unit}}</td>
                    <td>
                        <input type="checkbox" id="check_{{$item->id}}" name="{{$item->id}}" onchange="setCheck({{$item->id}});" value="{{$item->id}}" @if($item->is_active) checked @endif
                    </td>
                </tr>
            @endforeach
        </table>

                {{$currencies->links('pagination::tailwind')}}

    </div>


    </body>

</html>
