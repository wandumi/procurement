<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRfqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->string('request_title');
            $table->string('reference_no');

            $table->unsignedBigInteger('requesttypes_id');
            $table->unsignedBigInteger('suppliertypes_id');
            $table->unsignedBigInteger('pcategories_id');

            $table->date('open_date_time');
            $table->date('closing_date_time');

            $table->string('estimated_amount');
            $table->string('available_budget');
            $table->string('account_code');

            $table->text('content_of_rfq');
            $table->string('uploadfile');

            $table->unsignedBigInteger('status_id');

            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('pcategories_id')->references('id')->on('pcategories')->onDelete('cascade');
            // $table->foreign('requesttypes_id')->references('id')->on('requesttypes')->onDelete('cascade');
            // $table->foreign('suppliertypes_id')->references('id')->on('suppliertypes')->onDelete('cascade');
            // $table->foreign('status_id')->references('id')->on('rfqstatuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rfqs');
    }
}
