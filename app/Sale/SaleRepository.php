<?php

namespace App\Sale;

use App\Models\Sale;
use App\Sale\Services\SaleModelService;
use App\Sale\Services\SaleTableService;
class SaleRepository
{
    protected $saleTableService;
    protected $saleModelService;

    public function __construct(SaleModelService $saleModelService, SaleTableService $saleTableService)
    {
        $this->saleTableService = $saleTableService;
        $this->saleModelService = $saleModelService;
    }

    public function createSaleModelsAndTables(array $data)
    {
        // Create a separate table and model for the sale
        $this->saleModelService->createSaleModel($data['type']);
        $this->saleTableService->createSaleTable($data['type']);
    }

}
