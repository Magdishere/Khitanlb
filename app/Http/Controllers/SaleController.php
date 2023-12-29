<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Sale\Services\SaleTableService;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    protected $saleTableService;

    public function __construct(SaleTableService $saleTableService)
    {
        $this->saleTableService = $saleTableService;
    }

    public function createSale(Request $request)
    {
        $sale = Sale::create($request->all());

        // Create a separate table for the sale type
        $this->saleTableService->createSaleTable($sale->type);

        return response()->json($sale, 201);
    }

    public function deleteSale($id)
    {
        $sale = Sale::findOrFail($id);

        // Delete the separate table for the sale type
        $this->saleTableService->dropSaleTable($sale->type);

        $sale->delete();

        return response()->json(null, 204);
    }
}
