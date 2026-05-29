<?php

namespace App\Libraries;

class SmsLibrary
{
    private $apiKey;
    private $email;
    private $senderID;
    private $baseUrl = 'https://sms.vintextechnologies.com/api/api';

    public function __construct()
    {
        $this->apiKey   = getenv('SMS_API_KEY');
        $this->email    = getenv('SMS_EMAIL');
        $this->senderID = getenv('SMS_SENDER_ID');
    }

    public function send(string $phone, string $message): bool
    {
        $url = $this->baseUrl . '/sendMessage?email=' . $this->email;

        $data = ([
            'recipients' => $phone,
            'senderID' => $this->senderID,
            'message' => $message,
        ]);

        $ch = curl_init($url);
        curl_setopt($ch , CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,  json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->apiKey,
            'Content-Type: application/json',
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);
        return isset($result['status']['code']) && $result['status']['code'] === 2000;
    }
    
    public function sendWelcome(string $phone, string $name): bool
    {
        $message = "Welcome to NexaStore, {$name}! Your account has been created successfully. Start shopping our exclusive watch collectionn at nexastore.com.";
        return $this->send($phone, $message);
    }

    public function sendOrderConfirmation(string $phone, string $name, int $orderId, string $total): bool
    {
        $message = "Hi {$name}, your NexaStore order #{$orderId} worth \${$total} has been placed successfully. We will notify you once it's shipped.";
        return $this->send($phone, $message);
    }

    public function sendOrderStatusUpdate(string $phone, string $name, int $orderId, string $status): bool
    {
        $message = "Hi {$name}, your NexaStore order #{$orderId} status has been updated to: " . strtoupper($status) . ". Thank you for shopping with us!";
        return $this->send($phone, $message);
    }
}