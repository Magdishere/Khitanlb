<?php

namespace App\Services;


class ProductRepository
{
    public static function sortBy($query, $sorting)
    {
        switch ($sorting) {
            case 'date':
                return $query->orderBy('created_at', 'DESC');
            case 'price':
                return $query->orderBy('regular_price', 'ASC');
            case 'price-desc':
                return $query->orderBy('regular_price', 'DESC');
            case 'alphabet':
                return $query->orderBy('name', 'ASC');
            case 'alphabet-desc':
                return $query->orderBy('name', 'DESC');
            default:
                return $query->orderBy('created_at', 'ASC');
        }
    }

}

