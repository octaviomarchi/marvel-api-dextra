<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAllCharacters()
    {
        $response = $this->get('/v1/public/characters');
        $response->assertStatus(200);
    }

    public function testGetCharacterById()
    {
        $characterId = 1;
        $response = $this->get('/v1/public/characters/'. $characterId);
        $response->assertStatus(200);

    }

    public function testGetInvaliodCharacter()
    {
        $characterId = 0;
        $response = $this->get('/v1/public/characters/'. $characterId);

        $response->assertStatus(404);
        $response->assertJson(['reason' => 'Character not found']);
    }
}
