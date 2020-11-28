<?php

namespace Tests\Feature;

use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Author;

class AuthorRegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function register_a_book()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => 'Test title',
            'publish_year' => 1993,
            'edition' => 'First edition',
            'stocks' => 10,
            'author' => 1
        ]);

        $response->assertOk();
        $this->assertCount(1, Book::all());
    }
}
