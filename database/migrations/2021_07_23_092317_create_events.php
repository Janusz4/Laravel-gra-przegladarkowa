<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE DEFINER=`root`@`localhost` EVENT `wood_update`
            ON SCHEDULE EVERY 60 SECOND STARTS '2020-05-13 19:10:09'
            ON COMPLETION NOT PRESERVE ENABLE DO UPDATE users
            INNER JOIN villages
                on users.id = villages.id_user
            INNER JOIN sawmills
                on villages.id_sawmill = sawmills.id
            SET users.wood = users.wood  + sawmills.production;");

        DB::unprepared("CREATE DEFINER=`root`@`localhost` EVENT `stone_update`
            ON SCHEDULE EVERY 60 SECOND STARTS '2020-06-05 15:25:29'
            ON COMPLETION NOT PRESERVE ENABLE DO UPDATE users
            INNER JOIN villages
                on users.id = villages.id_user
            INNER JOIN quarries
                on villages.id_quarry = quarries.id
            SET users.stone = users.stone  + quarries.production");

        DB::unprepared("CREATE DEFINER=`root`@`localhost` EVENT `cereral_update`
            ON SCHEDULE EVERY 60 SECOND STARTS '2020-06-05 15:59:35'
            ON COMPLETION NOT PRESERVE ENABLE DO UPDATE users
            INNER JOIN villages
                on users.id = villages.id_user
            INNER JOIN fields
                on villages.id_field = fields.id
            SET users.creral = users.creral  + fields.production");

        DB::unprepared('SET GLOBAL event_scheduler="ON"');
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
