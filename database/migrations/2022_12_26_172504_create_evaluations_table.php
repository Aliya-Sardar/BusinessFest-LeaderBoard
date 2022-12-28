<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('business_Name');
            $table->tinyInteger('HRM')->unsigned()->default(0);                             // HRM 10%
            $table->tinyInteger('Innovation')->unsigned()->default(0);                      // Innovation 15%
            $table->tinyInteger('Sustainibility')->unsigned()->default(0);                  // Sustainibility 10%
            $table->tinyInteger('Finance')->unsigned()->default(0);                         // Finance 10%
            $table->tinyInteger('Entrepreneurial_Drive')->unsigned()->default(0);           // Entrepreneurial Drive 15%
                                // Marketing 20%
            $table->tinyInteger('Sponsorship')->unsigned()->default(0);                     // Sponsorship 5%
            $table->tinyInteger('Social_Media')->unsigned()->default(0);                    // Social Media 5%
            $table->tinyInteger('Digital_Ads')->unsigned()->default(0);                     // Digital Ads 5%
            $table->tinyInteger('Promotions')->unsigned()->default(0);                      // Promotional Activities 5%
                                // Sales 20%
            $table->tinyInteger('Sales')->unsigned()->default(0);                           // Sales on Likert Scale  
            $table->mediumInteger('Sales_Money')->unsigned()->default(0);                   // Money from Total Sales
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
        Schema::dropIfExists('evaluations');
    }
}
