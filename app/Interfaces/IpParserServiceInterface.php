<?php

namespace App\Services\IpParser\Interfaces;

/**
 * Interface IpParserServiceInterface
 * @package App\Services\IpParser\Interfaces
 */
interface IpParserServiceInterface
{
    /**
     * @param string $ip
     * @return mixed
     */
    public function parse(string $ip): bool;

    /**
     * @return mixed
     */
    public function save(): bool;

    /**
     * @return mixed
     */
    public function getCountryCode(): string;

    /**
     * @return mixed
     */
    public function getCountryName(): string;

    /**
     * @return mixed
     */
    public function getCityName(): string;
}
