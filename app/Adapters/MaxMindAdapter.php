<?php

namespace App\Services\IpParser\Adapters;

use App\Services\IpParser\Adapters\Interfaces\ParserAdapterInterface;
use GeoIp2\Database\Reader;
use GeoIp2\Model\City;

/**
 * Class MaxMindAdapter
 * @package App\Services\IpParser\Adapters
 */
class MaxMindAdapter implements ParserAdapterInterface
{

    /**
     * @var Reader
     */
    private Reader $reader;
    /**
     * @var City
     */
    private City $record;

    /**
     * @param string $ip
     * @return bool
     * @throws \GeoIp2\Exception\AddressNotFoundException
     * @throws \MaxMind\Db\Reader\InvalidDatabaseException
     */
    public function parse(string $ip): bool
    {
        $this->reader = new Reader(resource_path('geo/GeoLite2-City.mmdb'));
        $this->record = $this->reader->city($ip);

        return (bool)$this->record;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->record->country->isoCode;
    }

    /**
     * @return string
     */
    public function getCountryName(): string
    {
        return $this->record->country->name;
    }

    /**
     * @return string
     */
    public function getCityName(): string
    {
        return $this->record->city->name;
    }
}
