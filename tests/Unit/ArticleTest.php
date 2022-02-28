<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    /**
     * Create article without a title.
     *
     * @return void
     */
    public function testCreateArticleWithoutTitleShouldFailValidation()
    {
        $this->post('/addArticle', 
        [ 
            'description' =>'A Description',
            'price' => 23,
            'more_info' => 'Some More Info',
            'picture' => 'Example of picture string'
        ]
        );

        $this->assertDatabaseMissing('articles', [
            'title' => 'Some Title',
            'description' =>'A Description',
            'price' => 23,
            'more_info' => 'Some More Info',
            'picture' => 'Example of picture string'
        ]);
    }

    /**
     * Create article without a description.
     *
     * @return void
     */
    public function testCreateArticleWithoutDescriptionShouldFailValidation()
    {
        $this->post('/addArticle', 
        [ 
            'title' => 'Some Title',
            'price' => 23,
            'more_info' => 'Some More Info',
            'picture' => 'Example of picture string'
        ]
        );

        $this->assertDatabaseMissing('articles', [
            'title' => 'Some Title',
            'description' =>'A Description',
            'price' => 23,
            'more_info' => 'Some More Info',
            'picture' => 'Example of picture string'
        ]);
    }

    /**
     * Create article without a price.
     *
     * @return void
     */
    public function testCreateArticleWithoutPriceShouldFailValidation()
    {
        $this->post('/addArticle', 
        [ 
            'title' => 'Some Title',
            'description' =>'A Description',
            'more_info' => 'Some More Info',
            'picture' => 'Example of picture string'
        ]
        );

        $this->assertDatabaseMissing('articles', [
            'title' => 'Some Title',
            'description' =>'A Description',
            'price' => 23,
            'more_info' => 'Some More Info',
            'picture' => 'Example of picture string'
        ]);
    }

    /**
     * Create article without a title.
     *
     * @return void
     */
    public function testCreateArticleWithoutMoreInfoShouldFailValidation()
    {
        $this->post('/addArticle', 
        [ 
            'title' => 'Some Title',
            'description' =>'A Description',
            'price' => 23,
            'picture' => 'Example of picture string'
        ]
    );

    $this->assertDatabaseMissing('articles', [
        'title' => 'Some Title',
        'description' =>'A Description',
        'price' => 23, 'more_info' =>
        'Some More Info', 'picture' =>
        'Example of picture string'
    ]);
    }

    /**
     * Create article without a picture.
     *
     * @return void
     */
    public function testCreateArticleWithouPictureShouldFailValidation()
    {
        $this->post('/addArticle', 
        [ 
            'title' => 'Some Title',
            'description' =>'A Description',
            'price' => 23,
            'more_info' => 'Some More Info',
        ]
        );

        $this->assertDatabaseMissing('articles', [
            'title' => 'Some Title',
            'description' =>'A Description',
            'price' => 23,
            'more_info' => 'Some More Info',
            'picture' => 'Example of picture string'
        ]);
    }

}
