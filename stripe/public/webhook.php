<?php

require '../vendor/autoload.php';

$payload = @file_get_contents('php://input');

// file_put_contents('log.txt', $payload);

try {
  $event = \Stripe\Event::constructFrom(
    json_decode($payload, true)
  );
} catch (\UnexpectedValueException $e) {
  http_response_code(400);
  exit();
}

switch ($event->type) {
  case 'payment_intent.succeeded':
    $paymentIntent = $event->data->object;
    file_put_contents('log.txt', $event);
    break;
  case 'charge.succeeded':
    $paymentMethod = $event->data->object;
    file_put_contents('log.txt', $paymentMethod);
    break;
  default:
    echo 'Received unknown event type ' . $event->type;
}