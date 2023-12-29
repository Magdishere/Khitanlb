<?php

namespace App\Sale\Commands;

use App\Sale\SaleRepository;

class UpdateSaleCommand
{
    protected $saleRepository;

    public function __construct(SaleRepository $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    public function execute(\App\Sale\Sale $sale, array $data)
    {
        return $this->saleRepository->updateSale($sale, $data);
    }
}
