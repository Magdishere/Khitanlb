<?php
namespace App\Sale\Strategies;

interface SaleStrategy
{
    public function applyDiscount($price);
}
