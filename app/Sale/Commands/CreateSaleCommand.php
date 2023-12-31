<?php
namespace App\Sale\Commands;


use App\Sale\SaleRepository;

class CreateSaleCommand
{
    protected $saleRepository;

    public function __construct(SaleRepository $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    public function execute(array $data)
    {
        return $this->saleRepository->createSale($data);
    }
}
