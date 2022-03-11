<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = [
            ['level' => 1, 'wood' => 100, 'stone' => 150, 'production' => 10],
            ['level' => 2, 'wood' => 150, 'stone' => 225, 'production' => 15],
            ['level' => 3, 'wood' => 220, 'stone' => 200, 'production' => 20],
            ['level' => 4, 'wood' => 300, 'stone' => 220, 'production' => 30],
            ['level' => 5, 'wood' => 450, 'stone' => 300, 'production' => 50],
        ];

        DB::table('quarries')->insert($data);

        $data = [
            ['level' => 1, 'wood' => 300, 'stone' => 150, 'worriors' => 5, 'archers' => 0],
            ['level' => 2, 'wood' => 500, 'stone' => 250, 'worriors' => 8, 'archers' => 0],
            ['level' => 3, 'wood' => 750, 'stone' => 300, 'worriors' => 10, 'archers' => 1],
            ['level' => 4, 'wood' => 1000, 'stone' => 500, 'worriors' => 20, 'archers' => 2],
            ['level' => 5, 'wood' => 2000, 'stone' => 1100, 'worriors' => 30, 'archers' => 3],
        ];

        DB::table('barracks')->insert($data);

        $data = [
            ['level' => 1, 'wood' => 20, 'stone' => 0, 'production' => 5],
            ['level' => 2, 'wood' => 50, 'stone' => 10, 'production' => 7],
            ['level' => 3, 'wood' => 150, 'stone' => 20, 'production' => 10],
            ['level' => 4, 'wood' => 200, 'stone' => 50, 'production' => 15],
            ['level' => 5, 'wood' => 300, 'stone' => 100, 'production' => 20],
        ];

        DB::table('fields')->insert($data);

        $data = [
            ['level' => 1, 'wood' => 10, 'stone' => 20, 'production' => 10],
            ['level' => 2, 'wood' => 50, 'stone' => 10, 'production' => 20],
            ['level' => 3, 'wood' => 100, 'stone' => 200, 'production' => 35],
            ['level' => 4, 'wood' => 350, 'stone' => 370, 'production' => 80],
            ['level' => 5, 'wood' => 700, 'stone' => 500, 'production' => 100],
        ];

        DB::table('sawmills')->insert($data);

        $data = [
            ['level' => 1, 'wood' => 50, 'stone' => 30],
            ['level' => 2, 'wood' => 90, 'stone' => 50],
            ['level' => 3, 'wood' => 320, 'stone' => 150],
            ['level' => 4, 'wood' => 500, 'stone' => 220],
            ['level' => 5, 'wood' => 0, 'stone' => 0],
        ];

        DB::table('castles')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
