<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserAdminTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test user admin
     *
     * @return void
     */
    public function testUserAdmin()
    {
        $user = factory(\App\Models\User::class, 1)->create()->first();

        $this->assertIsObject($user);

        $this->assertNotTrue($user->isAdmin());

        $user->type = 'admin';

        $this->assertTrue($user->isAdmin());
    }
}
