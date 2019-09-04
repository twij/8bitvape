<?php

namespace Tests\Unit\Product;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;

class ProductPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test product page relationship
     *
     * @return void
     */
    public function testProductPage()
    {
        $this->seed();

        $product = Product::find(1);

        $this->assertInstanceOf(
            '\App\Models\Product',
            $product
        );

        $this->assertInstanceOf(
            '\Illuminate\Database\Eloquent\Relations\Relation',
            $product->page()
        );

        $this->assertInstanceOf(
            '\App\Models\Page',
            $product->page->first()
        );
    }
}
