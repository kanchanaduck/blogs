<?php

namespace Tests\Feature;

use App\Article;
use App\People;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowArticle()
    {
        $person = factory(People::class)->create();
        $article = factory(Article::class)->create([
            'author_id' => $person->id
        ]);

        $response = $this->json('GET', "/api/articles/{$article->id}");

        $response
            ->assertStatus(200)
            ->assertJson([
                'attributes' => [
                    'title' => $article->title
                ],
                'id' => (string)$article->id,
                'relationships' => [
                    'author' => [
                        'data' => [
                            'id' => (string)$person->id,
                            'type' => 'people'
                        ]
                    ]
                ]
            ]);
    }
}
