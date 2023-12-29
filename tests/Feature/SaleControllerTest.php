<?php

namespace Tests\Feature;

use App\Models\Sale;
use App\Sale\SaleRepository;
use App\Sale\Services\SaleModelService;
use App\Sale\Services\SaleTableService;
use Database\Factories\SaleFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class SaleControllerTest extends TestCase
{
    use RefreshDatabase;

    use RefreshDatabase;


    use RefreshDatabase;

    public function testCreateSale()
    {
        $data = [
            'type' => 'Flash',
            'name' => 'Test Sale',
            'start_date' => now()->toDateString(),
            'end_date' => now()->addDays(7)->toDateString(),
            'banner' => 'https://example.com/banner.jpg',
            'position' => 1,
        ];

        // Instantiate SaleRepository and SaleTableService
        $saleRepository = new SaleRepository(new SaleModelService(), new SaleTableService());

        // Create a sale
        $saleRepository->createSaleModelsAndTables($data);

    }
    public function testDeleteSale()
    {
        // Assuming you have a sale in the database
        $sale = Sale::factory()->create(['type' => 'BOGO']);

        $response = $this->deleteJson("/api/sales/{$sale->id}");

        $response->assertStatus(204);

        // Assert that the corresponding table was dropped from the database
        $this->assertFalse(Schema::hasTable('sales_bogo'));
    }
}
