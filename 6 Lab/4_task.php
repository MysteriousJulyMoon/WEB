<?php
require_once 'ApiClient.php';
$client = new ApiClient('https://httpbin.org', 'user', 'pass');
echo "GET: " . print_r($client->get('/basic-auth/user/pass')) . "\n";
echo "POST: " . print_r($client->post('/anything', ['title' => 'Hello', 'body' => 'World'])) . "\n";
echo "PUT: " . print_r($client->put('/anything', ['update' => 'value'])) . "\n";
echo "DELETE: " . print_r($client->delete('/anything')) . "\n";
?>