<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Travaux Public Api",
 *      description="L5 Swagger OpenApi description"
 * )
 * @OA\Tag(
 *     name="Projects",
 *     description="API Endpoints of Projects"
 * )
 * @OA\Tag(
 *     name="Articles",
 *     description="API Endpoints of Articles"
 * )
 *
 */
class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
