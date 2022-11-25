<?php

namespace Database\Seeders;

use App\Models\Center;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  
        
       /**center_id	city_code	region_code	center_type	op_area
        * $csv= file_get_contents($file);
    $array = array_map('str_getcsv', explode(PHP_EOL, $csv));
return json_encode($array); 
 */
    
    
    public function run()
       {   
        
        $csv = array_map('str_getcsv', file('public/center_info.csv'));
        array_walk($csv, function(&$a) use ($csv) {
          $a = array_combine($csv[0], $a);
        });
        array_shift($csv); # remove column header
              
                Center::create($csv);
            }
        }

      
