<?php

namespace App\Helpers;

use App\Models\Url;

class UrlShortener
{
    public function __construct(public string $original_url)
    {
    }

    public function short(): string
    {
        $code = $this->getRandomCode();
        $encodedCode = encrypt($code);
        $decoded = decrypt($encodedCode);

        $url = $this->urlExists($this->original_url);

        if (!$url) {
            $url = new Url();

            $url->code = $this->getRandomCode();
            $url->original_url = $this->original_url;

            $url->save();
        }

        $short_url = "https://bc.test/{}";

        return $short_url;
    }

    private function getRandomCode($length = 3): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public function urlExists($url)
    {
        $url = Url::first('original_url', $url);

        if ($url) {
            return $url;
        }

        return false;
    }
}
