<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function only_logged_in_user_can_see_book()
    {
        $this->get('/books')->assertRedirect('login');
    }

    /** @test */
    public function only_logged_in_user_can_add_book()
    {
        $this->withoutExceptionHandling();
        $this->be(factory('App\User')->create());
        $author = factory('App\Author')->create();
        $attributes = [
            'title' => $this->faker->sentence,
            'publish_year' => (int) $this->faker->year,
            'edition' => 'Third Edition',
            'stocks' => 10,
            'author' => $author->id
        ];
        $this->post('/books', $attributes)->assertRedirect('/books');
        $this->assertDatabaseHas('books', [
            'title' => $attributes['title']
        ]);
    }

    /** @test */
    public function only_a_librarian_can_see_add_books()
    {
        $this->withoutExceptionHandling();
        $this->be(factory('App\User')->create(['type' => 'librarian']));
        $author = factory('App\Author')->create();
        $attributes = [
            'title' => $this->faker->sentence,
            'publish_year' => (int) $this->faker->year,
            'edition' => 'Third Edition',
            'stocks' => 10,
            'author' => $author->id
        ];
        $this->get('/books')->assertStatus(200);
        $this->post('/books', $attributes)->assertRedirect('/books');
        $this->assertDatabaseHas('books', [
            'title' => $attributes['title']
        ]);
    }
}
