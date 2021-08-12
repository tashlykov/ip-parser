<?php

namespace App\Adapters\Interfaces;

/**
 * Interface ParserAdapterInterface
 * @package App\Adapters\Interfaces
 */
interface ParserAdapterInterface
{
    /**
     * @param string $ip
     * @return bool
     */
    public function parse(string $ip): bool;

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
