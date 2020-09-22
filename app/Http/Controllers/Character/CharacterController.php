<?php

namespace App\Http\Controllers\Character;

use App\Http\Controllers\Controller;
use App\Repositories\CharacterRepository;

use Illuminate\Http\Request;
use Exception;

class CharacterController extends Controller
{  
  /**
   * characterService
   *
   * @var CharacterRepository
   */
  protected $characterRepository;
  protected $result;
  
  /**
   * CharacterController Constructor
   *
   * @param  CharacterRepository $characterService
   */
  public function __construct(CharacterRepository $characterRepository)
  {
    $this->characterRepository = $characterRepository;
    $this->result = ['code' => 200, 'status' => 'success'];
  }  
    
  /**
   * Get all Characters
   *
   * @return ApiResponse
   */
  public function getAll()
  {
    try {
      $this->result['data'] = $this->characterRepository->findAll();
    } catch (Exception $e) {
      $this->result = ['code' => 500, 'status' => 'failed'];
    }

    return $this->sendResponse($this->result);
  }

  public function getById($id)
  {

    try {
      $this->result['data'] = $this->characterRepository->findById($id);
    } catch (Exception $e) {
      $this->result = ['code' => 500, 'status' => 'failed'];
    }

    // check if exists
    if ($this->result['data'] === null) {
      $this->result = ['code' => 404, 'status' => 'failed', 'message'=> 'Character not found'];
    }

    return $this->sendResponse($this->result);
  }

  public function getCharacterComics(int $id)
  {
    try {
      $this->result['data'] = $this->characterRepository->getComics($id);
    } catch (Exception $e) {
      $this->result = ['code' => 500, 'status' => 'failed'];
    }

    return $this->sendResponse($this->result);
  }

  public function getCharacterEvents(int $id)
  {
    try {
      $this->result['data'] = $this->characterRepository->getEvents($id);
    } catch (Exception $e) {
      $this->result = ['code' => 500, 'status' => 'failed'];
    }

    return $this->sendResponse($this->result);
  }

  public function getCharacterSeries(int $id)
  {
    try {
      $this->result['data'] = $this->characterRepository->getSeries($id);
    } catch (Exception $e) {
      $this->result = ['code' => 500, 'status' => 'failed'];
    }

    return $this->sendResponse($this->result);
  }
  
  public function getCharacterStories(int $id)
  {
    // try {
      $this->result['data'] = $this->characterRepository->getStories($id);
    // } catch (Exception $e) {
      // $this->result = ['code' => 500, 'status' => 'failed'];
    // }

    return $this->sendResponse($this->result);
  }

  private function sendResponse($response){
    return response()->json($response, $response['code']);
  }

}
