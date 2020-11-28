<?php

namespace Tests\Feature;

use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorRegister extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function register_an_author()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/authors', [
            'first_name' => 'James',
            'second_name' => 'More',
            'birth_year' => 1978
        ]);

        $response->assertOk();
        $this->assertCount(1, Author::find(1));

        $response = $this->post('/books', [
            'title' => 'Test title',
            'publish_year' => 1993,
            'edition' => 'First edition'
        ]);

        $response->assertOk();
        $this->assertCount(1, Book::find(1));
    }

    /** @test */
    public function register_a_book()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => 'Test title',
            'stocks' => 10,
            'publish_year' => 1993,
            'edition' => 'First edition'
        ]);

        $response->assertOk();
        $this->assertCount(1, Book::find(1));
    }
}
