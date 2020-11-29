<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function only_logged_in_user_can_see_author()
    {
        $this->get('/authors')->assertRedirect('login');
    }

    /** @test */
    public function only_logged_in_user_can_add_author()
    {
        $this->withoutExceptionHandling();
        $this->be(factory('App\User')->create());
        $attributes = [
            'first_name' => $this->faker->firstNameMale,
            'second_name' => $this->faker->word,
            'birth_year' => (int) $this->faker->year,
        ];
        $this->post('/authors', $attributes)->assertRedirect('/authors');
        $this->assertDatabaseHas('authors', $attributes);
    }
}
