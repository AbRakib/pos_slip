<?php

use App\Models\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

test('the unit page opens without querying units', function () {
    DB::enableQueryLog();

    $this->get(route('units.index'))
        ->assertOk()
        ->assertViewIs('unit.index')
        ->assertViewMissing('units')
        ->assertSee('Loading units...')
        ->assertDontSee('data-unit-row', false);

    expect(collect(DB::getQueryLog())->contains(fn (array $query): bool => str_contains(strtolower($query['query']), '"units"')))->toBeFalse();
    DB::disableQueryLog();
});

test('ajax requests render the unit partial with non deleted units', function () {
    $unit = Unit::factory()->create(['name' => 'Kilogram']);
    Unit::factory()->create(['name' => 'Deleted Unit', 'deleted' => true]);

    $this->get(route('units.index'), ['X-Requested-With' => 'XMLHttpRequest'])
        ->assertOk()
        ->assertViewIs('unit._index')
        ->assertSee($unit->name)
        ->assertSee('data-unit-row', false)
        ->assertDontSee('Deleted Unit')
        ->assertDontSee('<!DOCTYPE html>', false);
});

test('ajax requests render an empty unit list', function () {
    $this->get(route('units.index'), ['X-Requested-With' => 'XMLHttpRequest'])
        ->assertOk()
        ->assertViewIs('unit._index')
        ->assertSee('No units found.')
        ->assertSee('0 units');
});
