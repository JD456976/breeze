<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugAddressCityStateZipCountryToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('slug')
                ->after('name')
                ->nullable();

            $table->string('address')
                ->after('slug')
                ->nullable();

            $table->string('city')
                ->after('address')
                ->nullable();

            $table->string('state')
                ->after('city')
                ->nullable();

            $table->string('zip')
                ->after('state')
                ->nullable();

            $table->string('country')
                ->after('zip')
                ->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('slug','address','city','state','zip','country');
        });
    }
}
