<?php

require("JsonRPC/src/JsonRPC/Server.php");

use JsonRPC\Server;
use JsonRPC\AuthenticationFailure;

function beforeProcedure($username, $password, $class, $method) {
	if ($login_condition_failed) {
    	throw new AuthenticationFailure('Wrong credentials!');
    }
}

$server = new Server;
$server->authentication(['testuser' => 'testpass']);

// Register the before callback
$server->before('beforeProcedure');

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