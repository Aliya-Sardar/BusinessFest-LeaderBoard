<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluation2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation2s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('business_Name');
            $table->tinyInteger('HRM')->unsigned()->default(0);                             // HRM 10%
            $table->tinyInteger('Innovation')->unsigned()->default(0);                      // Innovation 15%
            $table->tinyInteger('Sustainibility')->unsigned()->default(0);                  // Sustainibility 10%
            $table->tinyInteger('Clean')->unsigned()->default(0);                           // Cleanly Hygiene 5%
            $table->tinyInteger('Doc')->unsigned()->default(0);                             // Documentation 5%
            $table->tinyInteger('Decor')->unsigned()->default(0);                           // Stall Decor 10%
                                // Marketing 20%
            $table->tinyInteger('Sponsorship')->unsigned()->default(0);                     // Sponsorship 5%
            $table->tinyInteger('Social_Media')->unsigned()->default(0);                    // Social Media 5%
            $table->tinyInteger('Digital_Ads')->unsigned()->default(0);                     // Digital Ads 5%
            $table->tinyInteger('Promotions')->unsigned()->default(0);                      // Promotional Activities 5%
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluation2s');
    }
}
