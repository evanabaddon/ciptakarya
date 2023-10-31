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
        Schema::table('sub_kegiatans', function (Blueprint $table) {
            // add bidang_id column
            $table->foreignId('bidang_id')->nullable()->after('id')->constrained('bidangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_kegiatans', function (Blueprint $table) {
            //
        });
    }
};
