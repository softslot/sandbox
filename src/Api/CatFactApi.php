<?php

declare(strict_types=1);

namespace Sandbox\Api;

class CatFactApi implements CatFactApiInterface
{
    private const string API_URL = 'https://catfact.ninja/fact';

    private readonly \CurlHandle $ch;

    public function __construct()
    {
        $this->ch = curl_init(self::API_URL);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
    }

    public function getFact(): string
    {
        ['fact' => $fact] = json_decode(
            json: curl_exec($this->ch),
            associative: true
        );

        return $fact;
    }

    public function __destruct()
    {
        curl_close($this->ch);
    }
}
