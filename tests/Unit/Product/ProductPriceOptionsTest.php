<?php

namespace Tests\Unit\Product;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;

class ProductPriceOptionsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test product price options relationship
     *
     * @return void
     */
    public function testProductPriceOptions()
    {
        $this->seed();

        $product = Product::find(1);

        $this->assertInstanceOf(
            '\App\Models\Product',
            $product
        );

        $this->assertInstanceOf(
            '\Illuminate\Database\Eloquent\Relations\Relation',
            $product->priceOptions()
        );

        $this->assertInstanceOf(
            '\App\Models\PriceOption',
            $product->priceOptions->first()
        );
    }
}
