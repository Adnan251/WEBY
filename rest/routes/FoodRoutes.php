<?php

/**
 * @OA\Get(path="/foods", tags={"WEBY"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all food from the API. ",
 *         @OA\Parameter(in="query", name="search", description="Search critieri"),
 *         @OA\Response( response=200, description="List of foods.")
 * )
 */
Flight::route('GET /foods', function(){
  Flight::json(Flight::foodService()->get_all());
});

/**
 * @OA\Get(path="/foods/{id}", tags={"foods"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return food with the given ID.",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of food"),
 *     @OA\Response(response="200", description="Fetch individual food")
 * )
 */
Flight::route('GET /foods/@id', function($id){
  Flight::json(Flight::foodService()->get_by_id($id));
});

/**
* @OA\Post(path="/foods", tags={"foods"}, security={{"ApiKeyAuth": {}}}, description="Add food",
*         summary="Add new food.",
*     @OA\RequestBody(description="Basic food info", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="name", type="string", example="Banana",	description="Name of the food"),
*    				@OA\Property(property="type", type="string", example="Fruit",	description="type of food" ),
*           @OA\Property(property="price", type="float", example="2.5",	description="Price of the food" ),
*           @OA\Property(property="description", type="string", example="Very jummy",	description="Some description" ),
*           @OA\Property(property="image_url", type="string", example="food-69.jpg",	description="Image of the food" ),
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Food has been added"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route('POST /foods', function(){
  Flight::json(Flight::foodService()->add(Flight::request()->data->getData()));
});

/**
* @OA\Put(path="/foods/{id}", security={{"ApiKeyAuth": {}}}, description="Update a food", tags={"foods"},
*       summary="Update a food.",
*     @OA\Parameter(in="path", name="id", example=1, description="Food ID"),
*     @OA\RequestBody(description="Basic food info", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="name", type="string", example="Banana",	description="Name of the food"),
*    				@OA\Property(property="type", type="string", example="Fruit",	description="type of food" ),
*           @OA\Property(property="price", type="float", example="2.5",	description="Price of the food" ),
*           @OA\Property(property="description", type="string", example="Very jummy",	description="Some description" ),
*           @OA\Property(property="image_url", type="string", example="food-69.jpg",	description="Image of the food" ),
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Food has been updated"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route('PUT /foods/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::foodService()->update($id, $data));
});

/**
* @OA\Delete(path="/foods/{id}", security={{"ApiKeyAuth": {}}}, description="Soft delete a food", tags={"foods"},
*       summary="Delete a food.",
*     @OA\Parameter(in="path", name="id", example=1, description="Food ID"),
*     @OA\Response(
*         response=200,
*         description="Food deleted"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route('DELETE /foods/@id', function($id){
  Flight::foodService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
