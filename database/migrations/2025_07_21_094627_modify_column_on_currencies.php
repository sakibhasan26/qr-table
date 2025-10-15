<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $uniqueIndex = DB::select("SHOW INDEX FROM currencies WHERE Key_name = 'currencies_code_unique'");
        if (count($uniqueIndex)) {
            Schema::table('currencies', function (Blueprint $table) {
                $table->dropUnique('currencies_code_unique');
            });
        }

        $normalIndex = DB::select("SHOW INDEX FROM currencies WHERE Key_name = 'currencies_code_index'");
        if (count($normalIndex)) {
            Schema::table('currencies', function (Blueprint $table) {
                $table->dropIndex('currencies_code_index');
            });
        }

        Schema::table('currencies', function (Blueprint $table) {
            $table->unique('country');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->dropUnique('currencies_country_unique');
            $table->unique('code');
            $table->index('code');
        });
    }
};
