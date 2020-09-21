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
  
  public function getAll()
  {

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

    return response()->json($this->result, $this->result['code']);
  }

  public function getCharacterComics(int $id)
  {
    try {
      $this->result['data'] = $this->characterRepository->getComics($id);
    } catch (Exception $e) {
      $this->result = ['code' => 500, 'status' => 'failed'];
    }

    return response()->json($this->result, $this->result['code']);
  }

  public function getCharacterEvents(int $id)
  {
    try {
      $this->result['data'] = $this->characterRepository->getEvents($id);
    } catch (Exception $e) {
      $this->result = ['code' => 500, 'status' => 'failed'];
    }

    return response()->json($this->result, $this->result['code']);
  }

  public function getCharacterSeries(int $id)
  {
    try {
      $this->result['data'] = $this->characterRepository->getSeries($id);
    } catch (Exception $e) {
      $this->result = ['code' => 500, 'status' => 'failed'];
    }

    return response()->json($this->result, $this->result['code']);
  }

}
