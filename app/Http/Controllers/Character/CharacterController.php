<?php

namespace App\Http\Controllers\Character;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Character;

use function PHPUnit\Framework\isNull;

class CharacterController extends Controller
{
  public function getAll()
  {

  }

  public function getById($id)
  {
    $character = Character::find($id);
    
    //check if exists
    if ($character === null) {
      return response()->json(['reason' => 'Character not found'], 404);
    }

    //get the relations
    // $character = $this->fetchRelations($character);


    return response()->json($character, 200);
  }

  private function fetchRelations(Character $characterObj)
  {

    $characterObj = $this->getComics($characterObj);

    return $characterObj;
  }

  private function getComics(Character $characterObj)
  {
    $comics = 
    $characterObj['comics'] = $characterObj->comics()->get();

    return $characterObj;
  }
}
