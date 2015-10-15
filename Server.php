<?php

require("JsonRPC/src/JsonRPC/Server.php");

use JsonRPC\Server;

$server = new Server;

// Procedures registration

$server->register('addition', function ($a, $b) {
    return $a + $b;
});

$server->register('random', function ($start, $end) {
    return mt_rand($start, $end);
});

$server->register('hello', function () {
    return 'world';
});

// Return the response to the client
echo $server->execute();

?>