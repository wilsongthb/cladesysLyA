<?php

use Illuminate\Database\Seeder;
use \DB as DB;

class brandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                DB::table('brands')->insert(
            [
                ['detail' => 'GENERAL', 'user_id' => 1 ],
                ['detail' => 'FGM ', 'user_id' => 1 ],
                ['detail' => 'ETCHANTGEL', 'user_id' => 1 ],
                ['detail' => 'VITACROM', 'user_id' => 1 ],
                ['detail' => 'RELIANCE', 'user_id' => 1 ],
                ['detail' => '3M ESPE -Z250', 'user_id' => 1 ],
                ['detail' => 'PALFIQUE BOND', 'user_id' => 1 ],
                ['detail' => 'PORTUGAL', 'user_id' => 1 ],
                ['detail' => 'DOCHEM - NIPRO - TOP JECT', 'user_id' => 1 ],
                ['detail' => 'CIRUGIA PERUANA', 'user_id' => 1 ],
                ['detail' => 'GRAL', 'user_id' => 1 ],
                ['detail' => 'FGM', 'user_id' => 1 ],
                ['detail' => 'DENTSPLY', 'user_id' => 1 ],
                ['detail' => 'DENTAURUM', 'user_id' => 1 ],
                ['detail' => 'DENSTPLY', 'user_id' => 1 ],
                ['detail' => 'TDV', 'user_id' => 1 ],
                ['detail' => 'TOP WAX', 'user_id' => 1 ],
                ['detail' => 'YETY', 'user_id' => 1 ],
                ['detail' => 'GEO CLASSIC', 'user_id' => 1 ],
                ['detail' => 'PERFECTIN', 'user_id' => 1 ],
                ['detail' => 'DOCHEM', 'user_id' => 1 ],
            ]
        );
    }
}
