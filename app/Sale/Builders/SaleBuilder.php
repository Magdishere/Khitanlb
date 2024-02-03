<?php

namespace App\Sale\Builders;

use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class SaleBuilder
{
    private $saleData = [];

    public function setName($name)
    {
        $this->saleData['name'] = $name;
        return $this;
    }

    public function setType($type)
    {
        $this->saleData['type'] = $type;
        return $this;
    }

    public function setPosition($position)
    {
        $this->saleData['position'] = $position;
        return $this;
    }

    public function setBanner($banner)
    {
        $this->saleData['banner'] = $banner;
        return $this;
    }

    public function setBannerType($bannerType)
    {
        $this->saleData['banner_type'] = $bannerType;
        return $this;
    }

    public function setTargetType($targetType)
    {
        $this->saleData['target_type'] = $targetType;
        return $this;
    }

    public function setStartDate($startDate)
    {
        $this->saleData['start_date'] = $startDate;
        return $this;
    }

    public function setEndDate($endDate)
    {
        $this->saleData['end_date'] = $endDate;
        return $this;
    }

    public function setIsActive($isActive)
    {
        $this->saleData['is_active'] = $isActive;
        return $this;
    }

    public function setIsFlashSale($isFlashSale)
    {
        $this->saleData['is_flash_sale'] = $isFlashSale;
        return $this;
    }

    public function setCategory($categoryId)
    {
        $this->saleData['category_id'] = $categoryId;
        return $this;
    }

    public function setProductIds($productIds)
    {
        $this->saleData['product_ids'] = $productIds;
        return $this;
    }

    public function build()
    {
        // Additional logic or validations before creating the sale...

        $sale = DB::transaction(function () {
            $sale = Sale::create($this->saleData);

            $this->attachTargetItems($sale);

            return $sale;
        });

        return $sale;
    }



    private function attachTargetItems($sale)
    {
        if ($this->saleData['target_type'] === 'category') {
            $sale->categories()->attach($this->saleData['category_id']);
        } elseif ($this->saleData['target_type'] === 'product') {
            $productIds = array_filter($this->saleData['product_ids']);
            if (!empty($productIds)) {
                $sale->products()->attach($productIds);
            }
        }
    }
}
