<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel WebSockets</title>
</head>

<body>
    <p>
        <b>Trade: </b> <span id="trade-data"></span>
    </p>

    @vite('resources/js/app.js')

    <script type="module">
        // This code will run after Echo is initialized in app.js
        Echo.channel('trades').listen('NewTrade', (e) => {
            console.log(e); // Log event data

            // Optionally, update the UI with the trade data
            document.getElementById('trade-data').textContent = e
                .trade; // Assuming 'trade' is the key you want to display
        });
    </script>
</body>

</html>
