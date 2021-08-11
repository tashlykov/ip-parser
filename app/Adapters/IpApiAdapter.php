<?php

namespace App\Services\IpParser\Adapters;

use App\Services\IpParser\Adapters\Interfaces\ParserAdapterInterface;
use Illuminate\Support\Facades\Http;

/**
 * Class IpApiAdapter
 * @package App\Services\IpParser\Adapters
 */
class IpApiAdapter implements ParserAdapterInterface
{

    /**
     * @var string
     */
    private const URL = 'http://ip-api.com/json/';

    /**
     * @var array
     */
    private array $response;

    /**
     * @param string $ip
     * @return bool
     */
    public function parse(string $ip): bool
    {
        $response = Http::get(self::URL . $ip)->json();

        $this->response = $response;

        return (bool)$response;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->response['countryCode'] ?? '';
    }

    /**
     * @return string
     */
    public function getCountryName(): string
    {
        return $this->response['country'] ?? '';
    }

    /**
     * @return string
     */
    public function getCityName(): string
    {
        return $this->response['city'] ?? '';
    }
}
