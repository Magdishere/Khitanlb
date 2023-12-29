<?php
namespace App\Sale\Strategies;

use SplObserver;
use SplSubject;

class ProductPriceUpdater implements SplObserver
{
    public function update(SplSubject $subject)
    {
        // Update product prices based on the sale
    }

}
