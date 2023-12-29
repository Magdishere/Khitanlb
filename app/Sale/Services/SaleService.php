<?php

namespace App\Sale\Services;

class SaleService
{
    protected $saleRepository;

    public function __construct(\App\Sale\SaleRepository $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    public function createSale(array $data)
    {
        // Additional business logic if needed
        return $this->saleRepository->createSale($data);
    }

    public function updateSale(\App\Sale\Sale $sale, array $data)
    {
        // Additional business logic if needed
        return $this->saleRepository->updateSale($sale, $data);
    }
}
