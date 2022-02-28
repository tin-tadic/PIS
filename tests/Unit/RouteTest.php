<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * Home route test
     *
     * @return void
     */
    public function testIndexRouteShouldReturn200()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Non existent route route test
     *
     * @return void
     */
    public function testNonExistentRouteRouteShouldReturn404()
    {
        $response = $this->get('/nonExistentRoute');

        $response->assertStatus(404);
    }

    /**
     * Register route test
     *
     * @return void
     */
    public function testRegisterRouteShouldReturn302()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /**
     * Contact route test
     *
     * @return void
     */
    public function testContactRouteShouldReturn302()
    {
        $response = $this->get('/contact');

        $response->assertStatus(302);
    }

    /**
     * Tickets route test
     *
     * @return void
     */
    public function testTicketRouteShouldReturn302()
    {
        $response = $this->get('/tickets');

        $response->assertStatus(302);
    }

    /**
     * Edit Profile route test
     *
     * @return void
     */
    public function testEditProfileRouteShouldReturn302()
    {
        $response = $this->get('/editProfile/1');

        $response->assertStatus(302);
    }

    /**
     * Add Article route test
     *
     * @return void
     */
    public function testAddArticleRouteShouldReturn302()
    {
        $response = $this->get('/addArticle');

        $response->assertStatus(302);
    }
}