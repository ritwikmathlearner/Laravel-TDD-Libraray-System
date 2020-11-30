<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BorrowTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function borrow_a_book_by_librarian()
    {
        $this->withoutExceptionHandling();

        $this->be(factory('App\User')->create(['type' => 'librarian']));

        $author = factory('App\Author')->create();
        $book = factory('App\Book')->create();
        $book->authors()->attach($author->id);
        $user = factory('App\User')->create();
        $this->get('/borrow/new')->assertStatus(200);
        $attributes = [
            'book_id' => $book->id,
            'user_id' => $user->id,
            'expected_return_date' => $this->faker->date,
        ];
        $this->post('/borrow', $attributes);
        $this->assertDatabaseHas('borrows', $attributes);
    }
}
