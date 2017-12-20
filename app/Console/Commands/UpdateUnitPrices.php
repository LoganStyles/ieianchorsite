<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class UpdateUnitPrices extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UpdateUnitPrices:updateprices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update unit prices';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        /* .determine if there is a new price
          .if Y-fetch the price,update my table, display fetched price
         */
        
        //select last_date from unit-price tbl
        $last_unit_price = DB::table('unit_price_backup')
                ->latest('report_date')
                ->first();
        print_r($last_unit_price);exit;
    }

}
