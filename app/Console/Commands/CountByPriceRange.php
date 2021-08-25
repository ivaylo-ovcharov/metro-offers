<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Offer\Reader;
use App\Services\Offer\Filter;

class CountByPriceRange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'count_by_price_range {price_from} {price_to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $price_from = (float) $this->argument('price_from');
        $price_to = (float) $this->argument('price_to');

        $filteredValues = Filter::byPriceRange('object.json',$price_from, $price_to);

        var_dump($offerValues);
    }
}
