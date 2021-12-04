<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnAndAddColumnsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->renameColumn('name', 'admin_name');
            $table->string('customer_name')->nullable()->after('name');
            $table->string('phone')->nullable()->after('email');
            $table->string('alamat')->nullable()->after('remember_token');
            $table->string('kecamatan')->nullable()->after('alamat');
            $table->integer('city')->nullable()->after('kecamatan');
            $table->integer('province')->nullable()->after('city');
            $table->integer('postcode')->nullable()->after('province');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('admin_name', 'name');
            $table->dropColumn('customer_name');
            $table->dropColumn('phone');
            $table->dropColumn('alamat');
            $table->dropColumn('kecamatan');
            $table->dropColumn('city');
            $table->dropColumn('province');
            $table->dropColumn('postcode');
        });
    }
}
