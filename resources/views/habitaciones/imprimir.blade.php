<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
            text-transform: uppercase;
        }

        .contenido {
            font-size: 20px;
        }

        .text-format td:nth-child(2) {
            text-align: left;
        }

        .text-format td:nth-child(3) {
            text-align: left;
        }
        .text-format td:nth-child(4) {
            text-align: center;
        }
        .text-format td:nth-child(5) {
            text-align: center;
        }

        /* print */
        @page {
            size: 21.6cm 27.9cm;
        }

        @media print {
            *:not(i):not(.material-icons) {
                -webkit-print-color-adjust: exact;
                font-family: "Courier New" !important;
                font-weight: bold;
            }

            .no-print,
            .no-print * {
                display: none !important;
            }
        }

        @media print {

            *,
            *:before,
            *:after {
                box-sizing: border-box;
            }

            @page {
                size: 297mm 210mm;
                margin: 10mm;
            }

            h1 {
                height: 10mm;
                font-size: 5mm;
                line-height: 5mm;
                padding-top: 2.5mm;
                padding-bottom: 2.5mm;
                margin-top: 0;
                margin-bottom: 0;
            }

            table {
                table-layout: fixed;
                width: 277mm;
                border-collapse: collapse;
            }

            td,
            th {
                width: 18%;
                padding: 0 1mm 0 1mm;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                border: 1px solid #000;
                height: 3.3615384615mm;
                font-size: 3.3615384615mm;
                line-height: 3.3615384615mm;
            }

            th:first-child {
                width: 10%;
            }

            td>div {
                height: 3.3615384615mm;
            }

            body {
                position: relative;
            }

            .background {
                width: 277mm;
                height: 189.5mm;
                position: absolute;
                top: 0;
                left: 0;
                background-color: rgba(227, 237, 37, 0.5);
            }
        }
    </style>
</head>

<body>
    <h1>Lista de Habitaciones</h1>
    <hr>
    <div class="contenido">
        <p>{{$today}}</p>
        <table class="table text-format">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th class="active">Nombre</th>
                    <th>Tipo</th>
                    <th>Capacidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($habitacion as $item)
                <tr>
                    <td>{{$loop->iteration }}</td>
                    <td>{{$item->nombreHabitacion }}</td>
                    <td><span style="color:black;background: #aaa;">{{$item->tipo->tipoHabitacion }}</span></td>
                    <td>{{$item->capacidad }}</td>
                    <td>{{$item->precio }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>