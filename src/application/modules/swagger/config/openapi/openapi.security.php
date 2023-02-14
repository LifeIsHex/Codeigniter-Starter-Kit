<?php

/**
 * @license Apache 2.0
 */

/**
 * @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      in="header",
 *      name="bearerAuth",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 * )
 */

/**
 * @OA\SecurityScheme(
 *     securityScheme="api_key",
 *     in="header",
 *     name="api_key",
 *     type="apiKey",
 *
 *
 * )
 */

/**
 * @OA\SecurityScheme(
 *     securityScheme="petstore_auth",
 *
 *     name="petstore_auth",
 *     type="oauth2",
 *     @OA\Flow(
 *         flow="implicit",
 *         authorizationUrl="https://petstore.swagger.io/oauth/dialog",
 *         scopes={
 *             "write:pets": "modify pets in your account",
 *             "read:pets": "read your pets",
 *         }
 *     )
 * )
 */
