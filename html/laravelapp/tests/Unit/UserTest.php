<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserTest extends TestCase
{
    use RefreshDatabase;

    private $attributes;

    protected function setUp(): void
    {
        parent::setUp();

        $this->attributes = [
            'name'     => 'テスト太郎',
            'email'     => 'hoge@example.com',
            'password' => bcrypt('test'),
        ];
    }

    public function test_登録できる()
    {
        User::create($this->attributes);
        $this->assertDatabaseHas('users', $this->attributes);
    }
}
