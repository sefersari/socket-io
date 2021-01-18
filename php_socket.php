<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Php socket io test</title>
</head>
<body>
<?php


require_once 'vendor/autoload.php';

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;

try {
    $client = new Client(new Version2X('http://localhost:3000'));
    $client->initialize();
    $client->emit("test", [
        'message' => 'merhaba burası php den geldi'
    ]);
    $client->close();
} catch (\Exception $e) {
    echo $e->getMessage();
}

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.5/socket.io.js"
        integrity="sha512-2rUSTSAeOO02jF6eBqENNqPs1EohenJ5j+1dgDPdXSLz9nOlrr8DJk4zW/lDy8rjhGCSonW3Gx812XJQIKZKJQ=="
        crossorigin="anonymous"></script>
<script>

    var socket = io('http://localhost:3000');

    socket.on('welcome', function (result) {
        console.log(result);
    });

    socket.emit('welcome_client', 'Client tarafından bu veri geldi');

</script>
</body>
</html>