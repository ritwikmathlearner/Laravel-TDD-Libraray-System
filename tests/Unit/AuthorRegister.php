<?php

namespace Tests\Unit;

use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class AuthorRegister extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function register_an_author()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/authors', [
            'title' => 'Test title',
            'author' => 'Test author',
            'publish_year' => 1993,
            'edition' => 'First edition'
        ]);

        $response->assertOk();
        $this->assertCount(1, Author::all());
    }
}
