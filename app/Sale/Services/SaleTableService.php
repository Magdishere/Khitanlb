<?php

namespace App\Sale\Services;

use Illuminate\Support\Facades\Schema;

class SaleTableService
{
    public function createSaleTable($type)
    {
        $tableName = 'sales_' . strtolower($type);

        if (!Schema::hasTable($tableName)) {
            Schema::create($tableName, function ($table) {
                $table->id();
                $table->bigInteger('sale_id');
                $table->date('start_date');
                $table->date('end_date');
                $table->string('banner')->nullable();
                $table->integer('position')->default(0);
                $table->timestamps();

                $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
            });
        }
    }

    public function dropSaleTable($type)
    {
        $tableName = 'sales_' . strtolower($type);

        if (Schema::hasTable($tableName)) {
            Schema::dropIfExists($tableName);
        }
    }
}
