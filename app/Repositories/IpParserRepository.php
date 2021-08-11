<?php

namespace App\Services\IpParser\Repositories;

use App\Models\Statistic;
use App\Services\IpParser\Repositories\Interfaces\IpParserRepositoryInterface;

/**
 * Class IpParserRepository
 * @package App\Services\IpParser\Repositories
 */
class IpParserRepository implements IpParserRepositoryInterface
{

    /**
     * @param array $data
     * @return bool
     */
    public function save(array $data): bool
    {
        $stat = new Statistic();
        $stat->ip = $data['ip'];
        $stat->country_code = $data['country_code'];
        $stat->country_name = $data['country_name'];
        $stat->city_name = $data['city_name'];

        return $stat->save();
    }
}
