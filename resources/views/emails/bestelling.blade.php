<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Bevesting verhuren</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset('img/logo.png') }}" alt="">
                <h1>Bevestiging verhuren</h1>

                <p>Beste heer/mevrouw {{ $verhuren->klant->achternaam }},</p>
                <br>
                <p>Bedankt voor uw verhuring!</p>
                <br>
                <p>Uw betaling is voltooid en heeft de volgende producten bij ons gehuurd in de genoemde periode:</p>
                <br>
                <table class="table table-striped">
                    <tr>
                        <th>Product</th>
                        <th>Begindatum</th>
                        <th>Einddatum</th>
                        <th>Aantal dagen</th>
                        <th>Totale huurprijs</th>
                    </tr>
                    @foreach ($verhuren->items as $item)
                        <tr>
                            <td>{{ $item['merk'] }} {{ $item['naam'] }}</td>
                            <td>{{ date("d-m-Y", strtotime($item['begindatum'])) }}</td>
                            <td>{{ date("d-m-Y", strtotime($item['einddatum'])) }}</td>
                            <td align="center">{{ $item['dagen'] }}</td>
                            <td align="right">&euro; {{ number_format($item['totale_huurprijs'], 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td><strong>Totaalbedrag</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align="right"><strong>&euro; {{ number_format($verhuren->subTotaal, 2, ',', '.') }}</strong></td>
                    </tr>
                </table>
                <br>
                <p>Met vriendelijke groet,</p>
                <br>
                <p>SynthRENT</p>
            </div>
        </div>
    </div>
</body>
</html>