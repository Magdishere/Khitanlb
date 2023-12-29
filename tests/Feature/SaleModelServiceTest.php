<?php

namespace Tests\Feature;

use App\Sale\Services\SaleModelService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class SaleModelServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateSaleModel()
    {
        $type = 'Session';

        // Instantiate SaleModelService
        $saleModelService = new SaleModelService();

        // Create a sale model
        $actualFilePath = $saleModelService->createSaleModel($type);

        // Assert that the model file was created at the expected path
        $expectedFilePath = app_path("Models/Sales{$type}.php");
        $this->assertFileExists($expectedFilePath);

        // Cleanup: Remove the created model file
        File::delete($expectedFilePath);
    }
}
