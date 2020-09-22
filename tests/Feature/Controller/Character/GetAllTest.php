<?php

namespace Tests\Feature\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetAllTest extends TestCase
{


  /**
   * makeRequest
   *
   * @param  mixed $queryParameters
   * @return \Illuminate\Testing\TestResponse
   */
  private function makeRequest(array $queryParameters)
  {
    return $this->call('GET', '/v1/public/characters', $queryParameters);
  }
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function testQueryParamNameIsNotNullableForGetAllCharacters()
  {
    // prepare
    $queryParameters = [
      'name' => ''
    ];

    // act
    $response = $this->makeRequest($queryParameters);

    //check
    $response
      ->assertStatus(409)
      ->assertJsonFragment([
        'message' => [
          'name' => [
            'The name must be a string.'
          ]
        ]
      ]);
  }

  public function testQueryParamOrderByNotInArrayShouldFail()
  {
    // prepare
    $queryParameters = [
      'orderBy' => 'something'
    ];

    //act
    $response = $this->makeRequest($queryParameters);

    //check
    $response
      ->assertStatus(409)
      ->assertJsonFragment([
        'status' => 'failed'
      ]);

  }

  public function testQueryParamLimitIsLessThan_100()
  {
    $queryParameters = [
      'limit' => 101
    ];

    $response = $this->makeRequest($queryParameters);

    $response
      ->assertStatus(409)
      ->assertJson([
        'code'=> 409,
        'status'=> 'failed',
        'message'=> [
          'limit'=> [
            'The limit may not be greater than 100.'
          ]
        ]
      ]);
  }
  
  
  public function testQueryParamLimitIshigherThan_0()
  {
    $queryParameters = [
      'limit' => 0
    ];

    $response = $this->makeRequest($queryParameters);

    $response
      ->assertStatus(409)
      ->assertJson([
        'code'=> 409,
        'status'=> 'failed',
        'message'=> [
          'limit'=> [
            'The limit must be at least 1.'
          ]
        ]
      ]);
  }
  
  
  public function testQueryParamOffsetIsInteger()
  {
    $queryParameters = [
      'offset' => 'something'
    ];

    $response = $this->makeRequest($queryParameters);

    $response
      ->assertStatus(409)
      ->assertJson([
        'code'=> 409,
        'status'=> 'failed',
        'message'=> [
          'offset'=> [
            'The offset must be an integer.',
          ]
        ]
      ]);
  }
}
