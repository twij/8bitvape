<?php

namespace Tests\Unit\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class UserCommentsTest extends TestCase
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
            $user->comments()
        );

        $this->assertInstanceOf(
            'App\Models\Comment',
            $user->comments()->first()
        );
    }
}
