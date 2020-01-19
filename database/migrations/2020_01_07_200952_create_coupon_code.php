<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_code', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->date('from_date');
            // $table->date('to_date');
            // $table->string('coupon_code');
            // $table->string('coupon_type');
            // $table->string('coupon_value');
            // $table->string('coupon_min_value');
            // $table->string('coupon_max_value');
            // $table->string('coupon_limit');
            // $table->string('coupon_for');
            // $table->string('product_name');
            $table->string('coupon_name');
            $table->text('coupon_detail');
            $table->string('coupon_image');
            //$table->text('comments');
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
        Schema::dropIfExists('coupon_code');
    }
}
