<?php

namespace App\Sale;
use App\Sale\Strategies\SaleStrategy;
use SplObjectStorage;
use SplObserver;
use SplSubject;

class Sale implements SplSubject
{
    protected $observers;
    protected $discountStrategy;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function setDiscountStrategy(SaleStrategy $strategy)
    {
        $this->discountStrategy = $strategy;
        $this->notify();
    }

    public function applyDiscount($price)
    {
        return $this->discountStrategy->applyDiscount($price);
    }
}
