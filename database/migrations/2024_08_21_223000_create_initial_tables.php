<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', static function (Blueprint $table) {
            $table->id();
            $table->string('street', 64);
            $table->string('street_number', 16);
            $table->string('zipcode', 16);
            $table->string('city', 64);
            $table->string('country', 64);
            $table->geography('location')->nullable();
            $table->mediumText('additional_information')->nullable();
            $table->unique(['street', 'street_number', 'zipcode', 'city', 'country']);
            $table->timestamps();
        });

        Schema::create('images', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('url');
            $table->unique(['name', 'url']);
            $table->timestamps();
        });

        Schema::create('contacts', static function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['person', 'business']);
            $table->string('business_name')->nullable();
            $table->string('salutation', 64);
            $table->string('first_name', 64);
            $table->string('last_name', 64);
            $table->integer('address_id');
            $table->string('phone_number', 64);
            $table->string('email', 64);
            $table->string('website', 64);
            $table->integer('image_id')->nullable();
            $table->mediumText('additional_information')->nullable();
            $table->unique(['business_name', 'salutation', 'first_name', 'last_name', 'phone_number', 'email', 'website']);
            $table->timestamps();
        });

        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64)->unique();
            $table->mediumText('description')->nullable();
            $table->integer('address_id');
            $table->integer('contact_id')->nullable();
            $table->integer('image_id')->nullable();
            $table->timestamps();
        });

        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64)->unique();
            $table->mediumText('description')->nullable();
            $table->dateTime('construction_year');
            $table->integer('property_id');
            $table->integer('image_id')->nullable();
            $table->timestamps();
        });

        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64)->unique();
            $table->integer('building_id')->nullable();
            $table->integer('property_id')->nullable();
            $table->timestamps();
        });

        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64)->unique();
            $table->mediumText('description')->nullable();
            $table->mediumText('floor')->nullable();
            $table->integer('area_id');
            $table->timestamps();
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64)->unique();
            $table->mediumText('description')->nullable();
            $table->integer('room_id')->nullable();
            $table->integer('area_id')->nullable();
            $table->timestamps();
        });

        Schema::create('storages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64)->unique();
            $table->mediumText('description')->nullable();
            $table->integer('location_id');
            $table->timestamps();
        });

        Schema::create('storage_items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64)->unique();
            $table->mediumText('description')->nullable();
            $table->date('expiration_date')->nullable();
            $table->integer('count')->nullable();
            $table->mediumText('storage_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('images');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('properties');
        Schema::dropIfExists('buildings');
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('storages');
        Schema::dropIfExists('storage_items');
    }
};
