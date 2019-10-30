<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnRedirectCountOnShortensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shortens', function (Blueprint $table) {
            $table->bigInteger('redirect_count')->default(0);
            $table->timestamp('last_seen_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shortens', function (Blueprint $table) {
            $table->dropColumn('redirect_count');
            $table->dropColumn('last_seen_date');
        });
    }
}
