<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulePermissionTable extends Migration
{
    public function up()
    {
        // Schema::create('module_permission', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('module_id')->constrained('modules')->onDelete('cascade');
        //     $table->foreignId('permission_id')->constrained('permissions')->onDelete('cascade');
        //     $table->timestamps();
        // });
        Schema::create('module_permission', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained('modules')->onDelete('cascade');
            $table->foreignId('permission_id')->constrained('permissions')->onDelete('cascade');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('module_permission');
    }

};
