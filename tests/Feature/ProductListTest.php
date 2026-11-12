<?php

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

test('the product page opens without querying products', function () {
    DB::enableQueryLog();

    $this->get(route('products.index'))
        ->assertOk()
        ->assertViewIs('product.index')
        ->assertViewMissing('products')
        ->assertSee('Loading products...')
        ->assertDontSee('data-product-row', false);

    expect(collect(DB::getQueryLog())->contains(fn (array $query): bool => str_contains(strtolower($query['query']), '"products"')))->toBeFalse();
    DB::disableQueryLog();
});

test('ajax requests render the product partial with non deleted products', function () {
    $product = Product::factory()->create(['name' => 'Fresh Tea']);
    Product::factory()->create(['name' => 'Deleted Tea', 'deleted' => true]);

    $this->get(route('products.index'), ['X-Requested-With' => 'XMLHttpRequest'])
        ->assertOk()
        ->assertViewIs('product._index')
        ->assertSee($product->name)
        ->assertSee('data-product-row', false)
        ->assertDontSee('Deleted Tea')
        ->assertDontSee('<!DOCTYPE html>', false);
});

test('ajax requests render an empty product list', function () {
    $this->get(route('products.index'), ['X-Requested-With' => 'XMLHttpRequest'])
        ->assertOk()
        ->assertViewIs('product._index')
        ->assertSee('No products found.')
        ->assertSee('0 products');
});
