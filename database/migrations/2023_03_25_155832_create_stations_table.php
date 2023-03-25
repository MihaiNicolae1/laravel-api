<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //id, name, latitude, longitude, company_id, address
        Schema::create('stations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->double('latitude',10,8)->nullable(false);
            $table->double('longitude', 10, 8)->nullable(false);
            $table->foreignId('company_id')
                  ->nullable(false)
                  ->constrained('companies')
                  ->cascadeOnDelete();
            $table->text('address');
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
        Schema::dropIfExists('stations');
    }
};
