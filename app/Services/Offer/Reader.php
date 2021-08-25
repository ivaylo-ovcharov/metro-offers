<?php
namespace App\Services\Offer;
use Illuminate\Support\Facades\Storage;

interface ReaderInterface {
    public function read();
}

class Reader implements ReaderInterface {

    public function read($input) {
        $offers = Storage::disk('local')->get($this->input);
        return json_decode($offers, true);
    }
}