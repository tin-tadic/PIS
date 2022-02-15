<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->post('/addArticle', 
        [ 'title' => 'asdasd',
        'description' =>'asdasfasfasfaf',
        'price' => 23,
        'more_info' => 'asdasdasdasdasdadad',
        'picture' => '12312312313123'
        ]
    );

        $this->assertDatabaseMissing('articles', ['title' => 'asdasd']);
    }
}
