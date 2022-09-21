<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('patient_id');
            $table->uuid('user_id');
            $table->uuid('unit_id');
            $table->uuid('journal_type_id');
            $table->uuid('signed_by');
            $table->text('note');
            $table->string('type');
            $table->boolean('private');
            $table->boolean('draft');
            $table->dateTime('signed_date');
            $table->dateTime('data_date');
            $table->dateTime('deleted_at');
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
        Schema::dropIfExists('notes');
    }
}
