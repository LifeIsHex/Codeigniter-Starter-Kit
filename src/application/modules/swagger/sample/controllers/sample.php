<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sample extends MH_Rest_Controller {

	/**
	 * @OA\Tag(
	 *     name="Sample",
	 *     description="Sample APIs",
	 * )
	 *
	 * Get    200,400,404,422
	 * Post   200,201,202,400,404,422
	 * Put    200,202,204,400,404,422
	 * Patch  200,204,400,404,422
	 * Delete 200,204,400,404,422
	 *
	 * 200  OK
	 * 201  Created
	 * 202  Accepted
	 * 204  No Content
	 * 400  Bad Request
	 * 401  Unauthorized
	 * 404  Not Found
	 * 422  Unprocessable Entity
	 */


	/**
	 * @OA\Get(
	 *     path="/v1/sample",
	 *     tags={"Sample"},
	 *     deprecated=false,
	 *     summary="Get Logged in user details",
	 *     description="This can only be done by the logged in user.",
	 *     operationId="",
	 *     @OA\Parameter(name="id",in="query",required=false,@OA\Schema(type="string")),
	 *     @OA\Response(response=400, description="Invalid username/password supplied"),
	 *     @OA\Response(response="401", description="Unauthorized"),
	 *     @OA\Response(response="404", description="Not Found"),
	 *     @OA\Response(response="422", description="Unprocessable Entity"),
	 *     @OA\Response(response=200,description="Success",
	 *     @OA\JsonContent(
	 *       @OA\Property(property="status", type="boolean"),
	 *       @OA\Property(property="message", type="string"),
	 *       @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/sample"))
	 *        )
	 *     ),
	 *     security={{"api_key": {}}}
	 * )
	 */
	// 200,400,404,422
	public function index_get()
	{
		/*   */
	}

	/**
	 * @OA\Post(
	 *     path="/v1/sample",
	 *     tags={"Sample"},
	 *     deprecated=false,
	 *     summary="Create user",
	 *     description="This can only be done by the logged in user.",
	 *     operationId="",
	 *     @OA\Response(response="201", description="Created"),
	 *     @OA\Response(response="202", description="Accepted"),
	 *     @OA\Response(response=400, description="Invalid username/password supplied"),
	 *     @OA\Response(response="401", description="Unauthorized"),
	 *     @OA\Response(response="404", description="Not Found"),
	 *     @OA\Response(response="422", description="Unprocessable Entity"),
	 *     @OA\Response(response=200,description="Success",
	 *     @OA\JsonContent(
	 *       @OA\Property(property="status", type="boolean"),
	 *       @OA\Property(property="message", type="string"),
	 *       @OA\Property(property="data", type="object", ref="#/components/schemas/sample")
	 *        )
	 *     ),
	 *     @OA\RequestBody(description="Create Post object",required=true,
	 *      @OA\JsonContent(ref="#/components/schemas/sample"),
	 *      @OA\MediaType(mediaType="multipart/form-data",
	 *      @OA\Schema(
	 *         type="object",
	 *        @OA\Property(property="userId", type="string"),
	 *        @OA\Property(property="title", type="string"),
	 *        @OA\Property(property="body", type="string"),
	 *         required={"userId","title","body"}
	 *         )
	 *      )
	 *     ),
	 *     security={{"api_key": {}}}
	 * )
	 */
	//200,201,202,400,404,422
	public function index_post()
	{
		/*   */
	}

	/**
	 * @OA\Put(
	 *     path="/v1/sample/{id}",
	 *     tags={"Sample"},
	 *     deprecated=false,
	 *     summary="Update Full Data",
	 *     description="This can only be done by the logged in user.",
	 *     operationId="",
	 *     @OA\Parameter(name="id",in="path",required=true,@OA\Schema(type="string")),
	 *     @OA\Response(response="202", description="Accepted"),
	 *     @OA\Response(response="204", description="No Content"),
	 *     @OA\Response(response=400, description="Invalid username/password supplied"),
	 *     @OA\Response(response="401", description="Unauthorized"),
	 *     @OA\Response(response="404", description="Not Found"),
	 *     @OA\Response(response="422", description="Unprocessable Entity"),
	 *     @OA\Response(response=200,description="Success",
	 *     @OA\JsonContent(
	 *       @OA\Property(property="status", type="boolean"),
	 *       @OA\Property(property="message", type="string"),
	 *       @OA\Property(property="data", type="object", ref="#/components/schemas/sample")
	 *        )
	 *     ),
	 *     @OA\RequestBody(description="Create Post object",required=true,
	 *      @OA\JsonContent(ref="#/components/schemas/sample"),
	 *      @OA\MediaType(mediaType="multipart/form-data",
	 *      @OA\Schema(
	 *         type="object",
	 *        @OA\Property(property="userId", type="string"),
	 *        @OA\Property(property="title", type="string"),
	 *        @OA\Property(property="body", type="string"),
	 *         required={"userId","title","body"}
	 *         )
	 *      )
	 *     ),
	 *     security={{"api_key": {}}}
	 * )
	 */
	// 200,202,204,400,404,422
	public function index_put($id)
	{
		/*   */
	}

	/**
	 * @OA\Patch(
	 *     path="/v1/sample/{id}",
	 *     tags={"Sample"},
	 *     deprecated=false,
	 *     summary="Update User Small Data",
	 *     description="This can only be done by the logged in user.",
	 *     operationId="",
	 *     @OA\Parameter(name="id",in="path",required=true,@OA\Schema(type="string")),
	 *     @OA\Parameter(name="userId",in="query",@OA\Schema(type="string")),
	 *     @OA\Parameter(name="title",in="query",@OA\Schema(type="string")),
	 *     @OA\Parameter(name="body",in="query",@OA\Schema(type="string")),
	 *     @OA\Response(response=200,description="Success",
	 *     @OA\JsonContent(
	 *       @OA\Property(property="status", type="boolean"),
	 *       @OA\Property(property="message", type="string"),
	 *       @OA\Property(property="data", type="object", ref="#/components/schemas/sample")
	 *        )
	 *     ),
	 *     @OA\Response(response="204", description="No Content"),
	 *     @OA\Response(response=400, description="Invalid username/password supplied"),
	 *     @OA\Response(response="401", description="Unauthorized"),
	 *     @OA\Response(response="404", description="Not Found"),
	 *     @OA\Response(response="422", description="Unprocessable Entity"),
	 *     security={{"api_key": {}}}
	 * )
	 */
	// 200,204,400,404,422
	public function index_patch($id)
	{
		/*   */
	}

	/**
	 * @OA\Delete(
	 *     path="/v1/sample/{id}",
	 *     tags={"Sample"},
	 *     deprecated=false,
	 *     summary="Delete User",
	 *     description="This can only be done by the logged in user.",
	 *     operationId="",
	 *     @OA\Parameter(name="id",in="path",required=true,@OA\Schema(type="string"),
	 *         description="The name that needs to be deleted"),
	 *     @OA\Response(response="200", description="Success"),
	 *     @OA\Response(response="204", description="No Content"),
	 *     @OA\Response(response=400, description="Invalid username/password supplied"),
	 *     @OA\Response(response="401", description="Unauthorized"),
	 *     @OA\Response(response="404", description="Not Found"),
	 *     @OA\Response(response="422", description="Unprocessable Entity"),
	 *     security={{"api_key": {}}}
	 * )
	 */
	// 200,204,400,404,422
	public function index_delete($id)
	{
		/*   */
	}
}
