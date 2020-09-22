<?php

namespace App\Http\Controllers\Character;

use App\Http\Controllers\Controller;
use App\Repositories\CharacterRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Validation\Rule;

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
   * @return JSON
   */
  public function getAll(Request $request)
  {

    $rules = [
      'name' => ['sometimes', 'string'],
      'nameStartsWith' => ['sometimes', 'string'],
      'modifiedSince' => ['sometimes', 'date'],
      'comics' => ['sometimes', 'regex:/^(\d+(,\d+)*)?$/u'],
      'series' => ['sometimes', 'regex:/^(\d+(,\d+)*)?$/u'],
      'events' => ['sometimes', 'regex:/^(\d+(,\d+)*)?$/u'],
      'stories' => ['sometimes', 'regex:/^(\d+(,\d+)*)?$/u'],
      'orderBy' => ['sometimes', 'string', Rule::in(['name', 'modified', '-name', '-modified'])],
      'limit' => ['sometimes', 'integer', 'min:1', 'max:100'],
      'offset' => ['sometimes', 'integer'],
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      $this->result['code'] = 409;
      $this->result['status'] = 'failed';
      $this->result['message'] = $validator->errors();

      return $this->sendResponse($this->result);
    }

    $validatedData = $validator->validated();

    try {
      $this->result['data'] = $this->characterRepository->findAll($validatedData);
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
      $this->result = ['code' => 404, 'status' => 'failed', 'message' => 'Character not found'];
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

  private function sendResponse($response)
  {
    return response()->json($response, $response['code']);
  }
}
