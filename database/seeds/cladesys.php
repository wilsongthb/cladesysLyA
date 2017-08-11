<?php

use Illuminate\Database\Seeder;
use \DB as DB;

class cladesys extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('brands')->insert([
        //     ['detail' => 'FGM ', 'user_id' => 1],
        //     ['detail' => 'ETCHANTGEL', 'user_id' => 1],
        //     ['detail' => 'VITACROM', 'user_id' => 1],
        //     ['detail' => 'RELIANCE', 'user_id' => 1],
        //     ['detail' => '3M ESPE -Z250', 'user_id' => 1],
        //     ['detail' => 'GENERAL', 'user_id' => 1],
        //     ['detail' => 'PALFIQUE BOND', 'user_id' => 1],
        //     ['detail' => 'PORTUGAL', 'user_id' => 1],
        //     ['detail' => 'DOCHEM - NIPRO - TOP JECT', 'user_id' => 1],
        //     ['detail' => 'CIRUGIA PERUANA', 'user_id' => 1],
        //     ['detail' => 'GRAL', 'user_id' => 1],
        //     ['detail' => 'FGM', 'user_id' => 1],
        //     ['detail' => 'DENTSPLY', 'user_id' => 1],
        //     ['detail' => 'DENTAURUM', 'user_id' => 1],
        //     ['detail' => ' DENSTPLY', 'user_id' => 1],
        //     ['detail' => 'TDV', 'user_id' => 1],
        //     ['detail' => 'TOP WAX', 'user_id' => 1],
        //     ['detail' => 'YETY', 'user_id' => 1],
        //     ['detail' => 'GEO CLASSIC', 'user_id' => 1],
        //     ['detail' => 'PERFECTIN', 'user_id' => 1],
        //     ['detail' => 'DOCHEM', 'user_id' => 1],
        // ]);
        // DB::table('categories')->insert([
        //     ['detail' => 'GENERAL', 'user_id' => 1],
        //     ['detail' => 'PROTESIS', 'user_id' => 1],
        //     ['detail' => 'ESTETICA', 'user_id' => 1],
        //     ['detail' => 'TODOS', 'user_id' => 1],
        //     ['detail' => 'CIRUGIA', 'user_id' => 1],
        //     ['detail' => 'INSTRUMENTO', 'user_id' => 1],
        //     ['detail' => 'PEDIATRIA', 'user_id' => 1],
        //     ['detail' => 'ENDODONCIA', 'user_id' => 1],
        //     ['detail' => 'LABORATORIO', 'user_id' => 1],
        // ]);
        // DB::table('packings')->insert([
        //     ['detail' => 'SPRAY 480 ML', 'user_id' => 1],
        //     ['detail' => 'JERINGA X 2.5 ML', 'user_id' => 1],
        //     ['detail' => 'FRASCO X 13 GR.', 'user_id' => 1],
        //     ['detail' => 'FRASCO X 240 ML', 'user_id' => 1],
        //     ['detail' => 'FRASCO X 450 GR.', 'user_id' => 1],
        //     ['detail' => 'KIT (56G Y 60 ML)', 'user_id' => 1],
        //     ['detail' => 'FRASCO X 6 GR', 'user_id' => 1],
        //     ['detail' => 'FRASCO X 4 ML', 'user_id' => 1],
        //     ['detail' => 'FRASCO X 1000 ML', 'user_id' => 1],
        //     ['detail' => 'CAJA X  100 IND ', 'user_id' => 1],
        //     ['detail' => 'CAJA X 24 UND', 'user_id' => 1],
        //     ['detail' => 'CAJA X 100 UND', 'user_id' => 1],
        //     ['detail' => 'CAJA X 12 UNID', 'user_id' => 1],
        //     ['detail' => 'FRASCO X 500 ML', 'user_id' => 1],
        //     ['detail' => 'ML', 'user_id' => 1],
        //     ['detail' => 'UNID', 'user_id' => 1],
        //     ['detail' => 'KIT', 'user_id' => 1],
        //     ['detail' => 'KIT X 4 TUBETES', 'user_id' => 1],
        //     ['detail' => 'KITx2 TUBETES', 'user_id' => 1],
        //     ['detail' => 'FRASCO X 3.5 ML', 'user_id' => 1],
        //     ['detail' => 'BOLSA X 150 GR', 'user_id' => 1],
        //     ['detail' => 'KIT (LIQ. POLVO)', 'user_id' => 1],
        //     ['detail' => 'UNID X 2.5 GR', 'user_id' => 1],
        //     ['detail' => 'KIT (POLVO LIQUIDO)', 'user_id' => 1],
        //     ['detail' => 'CAJA X 12 UNIDADES', 'user_id' => 1],
        //     ['detail' => 'CAJA X 10 BARRAS', 'user_id' => 1],
        //     ['detail' => 'tt', 'user_id' => 1],
        //     ['detail' => 'POMO X 10 GR', 'user_id' => 1],
        //     ['detail' => 'POMO X 70 GR', 'user_id' => 1],
        //     ['detail' => 'PAQUETE X 50 UNID', 'user_id' => 1],
        //     ['detail' => 'FRASCO X 12 UNID', 'user_id' => 1],
        //     ['detail' => 'CAJA X 50 UND', 'user_id' => 1],
        //     ['detail' => 'SPRAY 480 ML', 'user_id' => 1],
        //     ['detail' => 'FRASCO X 120 ML', 'user_id' => 1],
        //     ['detail' => 'FRASCO X 225 GR.', 'user_id' => 1],
        //     ['detail' => 'UNIT', 'user_id' => 1],
        //     ['detail' => 'UNIDAD', 'user_id' => 1],
        // ]);
        // DB::table('measurements')->insert([
        //     ['detail' => 'GRAMOS', 'user_id' => 1],
        //     ['detail' => 'KILOS', 'user_id' => 1],
        //     ['detail' => 'LITROS', 'user_id' => 1],
        //     ['detail' => 'MILILITROS', 'user_id' => 1],
        // ]);
    }
}
