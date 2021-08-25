<?php
namespace App\Services\Offer;
use App\Services\Offer\Reader;

class Filter {
    public function __construct(Reader $reader) {
        $this->reader = $reader;
    }

    public static function byPriceRange($file, $price_from, $price_to) {
        $arr = $this->reader->read($file);
        $filteredValues = array_filter($arr, function($row) use ($price_from, $price_to) {
            return $row['price'] > $price_from && $row['price'] < $price_to;
        });
        return static::response($filteredValues, "Filter by price range: {$price_from} {$price_to}");
    }

    public static function response($response, $message) {
        logger($message);
        return count($response) ? count($response) : 'No Results found';
    }
}