<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController
{
   protected $class;

   public function index(Request $request)
   {
      return str_replace('\/', '/', json_encode($this->class::paginate($request->per_page)));
   }

   public function store(Request $request)
   {
      return response()->json($this->class::create($request->all()), 201);
   }

   public function show(int $id)
   {
      $resource = $this->class::find($id);

      if (is_null($resource)) {
         return response()->json('', 204);
      }
      return response()->json($resource);
   }

   public function update(int $id, Request $request)
   {
      $resource = $this->class::find($id);

      if (is_null($resource)) {
         return response()->json(['Error' => $this->class + 'not found'], 404);
      }

      $resource->fill($request->all());
      $resource->save();

      return response()->json($resource);
   }

   public function destroy(int $id)
   {
      $quantity = $this->class::destroy($id);

      if ($quantity === 0) {
         return response()->json(['Error' => $this->class + 'not found'], 404);
      }

      return response()->json('', 204);
   }
}
