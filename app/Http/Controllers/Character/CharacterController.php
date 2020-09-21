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
  
  /**
   * CharacterController Constructor
   *
   * @param  CharacterRepository $characterService
   */
  public function __construct(CharacterRepository $characterRepository)
  {
    $this->characterRepository = $characterRepository;
  }  
  
  public function getAll()
  {

  }

  public function getById($id)
  {
    $result = ['code' => 200, 'status' => 'success'];

    try {
      $result['data'] = $this->characterRepository->findById($id);
    } catch (Exception $e) {
      $result = ['code' => 200, 'status' => 'failed'];
    }

    //check if exists
    // if ($result['data'] === null) {
    //   $result = ['code' => 404, 'status' => 'failed', 'message'=> 'Character not found'];
    // }

    return response()->json($result, $result['code']);
  }

}
