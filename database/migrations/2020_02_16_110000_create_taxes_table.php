<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxesTable extends Migration
{
    public function up()
    {
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(app('location'));
            $table->string('tax_code');
            $table->string('name')->unique(); // Internal reference name
            $table->string('title'); // Shows in book online checkout flow.
            $table->string('slug')->unique()->index();
            $table->unsignedDecimal('percent', 5, 2);
            $table->foreignIdFor(app('user'), 'creator_id');
            $table->timestamps();

            // This pairing must have at most one value
            $table->unique(['location_id', 'tax_code']);
        });
    }
}
