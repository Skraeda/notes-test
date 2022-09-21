<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes_history', function (Blueprint $table) {
            $table->id();
            $table->integer('version');
            $table->uuid('patient_id');
            $table->uuid('user_id');
            $table->uuid('unit_id');
            $table->uuid('journal_type_id');
            $table->uuid('created_by');
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
        Schema::dropIfExists('notes_history');
    }
}
