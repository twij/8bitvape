<?php

namespace Tests\Feature\Routes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Product;

class ShopRouteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the shop route
     *
     * @return void
     */
    public function testShopRoute()
    {
        $this->seed();

        $response = $this->get('/shop');

        $response->assertStatus(200);
        $response->assertViewIs('shop.index');
        $response->assertViewHas('products');

        $product = Product::find(1);
        $product->enabled = false;
        $product->save();

        $response = $this->get('/shop');

        $response->assertStatus(200);
        $response->assertViewIs('shop.product');
        $response->assertViewHas('product');

        $product2 = Product::find(2);
        $product2->enabled = false;
        $product2->save();

        $response = $this->get('/shop');

        $response->assertStatus(404);
    }
}
