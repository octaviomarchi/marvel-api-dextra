<?php

namespace App\Repositories;

use App\Models\Character;
use App\Models\Comic;
use App\Models\Event;
use App\Models\Serie;
use App\Models\Story;
use Illuminate\Database\Eloquent\Model;

class CharacterRepository
{
  
  public function findById($id)
  {
    $character = Character::find($id);

    if ($character === null) {
      return $character;
    }

    $character = $this->fetchRelations($character);

    return $character;
  }

  private function fetchRelations(Model $model)
  {
    if (!($model instanceof Character))
    {
      $model['characters'] = $model->characters()->paginate(10);
    }

    if (!($model instanceof Comic))
    {
      $model['comics'] = $model->comics()->paginate(10);
    }

    if (!($model instanceof Event))
    {
      $model['events'] = $model->events()->paginate(10);
    }

    if (!($model instanceof Serie))
    {
      $model['series'] = $model->series()->paginate(10);
    }

    if (!($model instanceof Story))
    {
      $model['stories'] = $model->stories()->paginate(10);
    }

    return $model;
  }

  
}
