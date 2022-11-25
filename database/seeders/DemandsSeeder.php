<?php

namespace Database\Seeders;

use App\Models\Demand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
       //**  id	week	center_id	meal_id	checkout_price	base_price	emailer_for_promotion	homepage_featured	num_orders*/

        public function run()
        {   
        
            $csv = array_map('str_getcsv', file('public/weekly_demand.csv'));
            array_walk($csv, function(&$a) use ($csv) {
              $a = array_combine($csv[0], $a);
            });
            array_shift($csv); # remove column header
                  
                    Demand::create($csv);
                }
     
    }

