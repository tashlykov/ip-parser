<?php

namespace Tashlykov\IpParser\Adapters\Interfaces;

use GeoIp2\ProviderInterface;

/**
 * Interface ParserAdapterInterface
 * @package Tashlykov\IpParser\Adapters\Interfaces
 */
interface ParserAdapterInterface
{
    /**
     * @param string $ip
     * @param ProviderInterface|null $reader
     * @return bool
     */
    public function parse(string $ip, ProviderInterface $reader = null): bool;

    /**
     * @return string
     */
    public function getCountryCode(): string;

    /**
     * @return string
     */
    public function getCountryName(): string;

    /**
     * @return string
     */
    public function getCityName(): string;
}
