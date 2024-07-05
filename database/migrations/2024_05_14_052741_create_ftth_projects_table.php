<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ftth_projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');
            $table->string('project_name');
            $table->string('olt_hostname');
            $table->string('no_sp2k_spa');
            $table->unsignedBigInteger('sbu_id');
            $table->foreign('sbu_id')->references('id')->on('sbus');
            $table->string('hp_plan');
            $table->string('hp_built');
            $table->string('fat_total');
            $table->string('fat_progress');
            $table->string('fat_built');
            $table->string('ip_olt');
            $table->text('kendala');
            $table->string('progress');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->date('start_date');
            $table->date('target');
            $table->date('end_date')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->string('radius')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ftth_projects');
    }
};
