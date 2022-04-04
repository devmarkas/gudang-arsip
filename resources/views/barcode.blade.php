<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Barcode</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>

        .item-barcode {
            width: 33.33%;
            float: left;
            padding: 15px;
        }
        .item-barcode img{
            display: block;
            margin: auto;
        }

    </style>
</head>

<body style="background-color: #CDAE3E">
    @if ((isset($barcode)))
    <div class="item-barcode" id="item-barcode">
        <div class="d-flex justify-content-center"> 
            @php
                echo DNS1D::getBarcodeSVG($barcode[0], 'CODABAR',3,33,'#000000');
            @endphp
        </div>
        <table style="width: 100%">
            <tbody>
                <tr>
                    <td><b>ID PM</b></td>
                    <td style="text-align: right">{{$barcode[0]}}</td>
                </tr>
                <tr>
                    <td><b>Box</b></td>
                    <td style="text-align: right">{{$barcode[3]}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @else
    @foreach (($barcodes) as $barcode)
        <div class="item-barcode" id="item-barcode">
            <div class="d-flex justify-content-center">
                @php
                    echo DNS1D::getBarcodeSVG($barcode->id_pm, 'CODABAR',3,33,'#000000');
                @endphp
            </div>
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td><b>ID PM</b></td>
                        <td style="text-align: right">{{$barcode->id_pm}}</td>
                    </tr>
                    <tr>
                        <td><b>Box</b></td>
                        <td style="text-align: right">{{$barcode->box}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforeach
    @endif
</body>
<script>
    window.print()
</script>
</html>
