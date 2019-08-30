<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class UserMixesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUserComments()
    {
        $this->seed();

        $user = User::find(1);

        $this->assertInstanceOf(
            '\Illuminate\Database\Eloquent\Relations\Relation',
            $user->mixes()
        );

        $this->assertInstanceOf(
            'App\Models\Mix',
            $user->mixes()->first()
        );
    }
}
