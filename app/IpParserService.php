<?php

namespace App\Services\IpParser;

use App\Services\IpParser\Adapters\Interfaces\ParserAdapterInterface;
use App\Services\IpParser\Adapters\IpApiAdapter;
use App\Services\IpParser\Interfaces\IpParserServiceInterface;
use App\Services\IpParser\Repositories\Interfaces\IpParserRepositoryInterface;

class IpParserService implements IpParserServiceInterface
{

    private ParserAdapterInterface $adapter;
    private IpParserRepositoryInterface $repository;
    private string $ip;

    public function __construct(ParserAdapterInterface $adapter, IpParserRepositoryInterface $repository)
    {
        $this->adapter = $adapter;
        $this->repository = $repository;
    }

    public function parse(string $ip): bool
    {
        $this->ip = $ip;
        return $this->adapter->parse($ip);
    }

    public function save(): bool
    {
        return $this->repository->save([
            'ip' => $this->ip,
            'country_code' => $this->getCountryCode(),
            'country_name' => $this->getCountryName(),
            'city_name' => $this->getCityName()
        ]);
    }

    public function getCountryCode(): string
    {
        return $this->adapter->getCountryCode();
    }

    public function getCountryName(): string
    {
        return $this->adapter->getCountryName();
    }

    public function getCityName(): string
    {
        return $this->adapter->getCityName();
    }
}
