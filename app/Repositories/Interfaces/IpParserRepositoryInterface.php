<?php

namespace App\Services\IpParser\Repositories\Interfaces;

/**
 * Interface IpParserRepositoryInterface
 * @package App\Services\IpParser\Repositories\Interfaces
 */
interface IpParserRepositoryInterface
{
    /**
     * @param array $data
     * @return bool
     */
    public function save(array $data): bool;
}
