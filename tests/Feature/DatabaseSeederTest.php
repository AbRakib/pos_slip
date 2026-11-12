<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('the database seeder populates products customers and units', function () {
    $this->seed();

    $this->assertDatabaseCount('products', 10);
    $this->assertDatabaseCount('customers', 10);
    $this->assertDatabaseCount('units', 17);
    $this->assertDatabaseHas('units', ['name' => 'Piece', 'short_name' => 'pc']);
});
