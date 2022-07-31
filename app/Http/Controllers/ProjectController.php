<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use StoreProjectRequest;

class ProjectController extends Controller
{
    /**
     * @OA\Post(
     *      path="/api/CreateProject",
     *      tags={"Projects"},
     *      summary="Store new project",
     *      description="Returns project data",
     *      @OA\RequestBody(
     *          @OA\JsonContent(
     *              example={
     *                      "project_name": "string",
     *                      "project_address": "string",
     *                      "project_client_name": "string",
     *                      "devise": "string",
     *                  },
     *              @OA\Schema (
     *
     *                      type="object",
     *                      @OA\Property(
     *                           property="project_name",
     *                           required=true,
     *                           description="project_name",
     *                           type="string"
     *                      ),
     *                      @OA\Property(
     *                           property="quantité",
     *                           required=true,
     *                           description="quantité",
     *                           type="quantité"
     *                      ),
     *                      @OA\Property(
     *                           property="project_client_name",
     *                           required=true,
     *                           description="project_client_name",
     *                           type="string"
     *                      ),
     *                      @OA\Property(
     *                           property="devise",
     *                           required=true,
     *                           description="devise",
     *                           type="string"
     *                      ),
     *

     *
     *                  ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function CreateProject(Request $request)
    {
        $request->validate([
            "project_name" => "required",
            "project_address" => "required",
            "project_client_name" => "required",
            "devise" => "required",
        ]);
        $project = Project::create([
            "project_name" => $request->project_name,
            "project_address" => $request->project_address,
            "project_client_name" => $request->project_client_name,
            "devise" => $request->devise,
        ]);
        return response()->json(["project", $project], 201);
    }
    /**
     * @OA\Put(
     *      path="/api/UpdateProject/{project_id}",
     *      tags={"Projects"},
     *      summary="Store new project",
     *      description="Returns project data",
     *      @OA\Parameter(
     *          name="project_id",
     *          description="Project id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(
     *              example={
     *                      "project_name": "string",
     *                      "project_address": "string",
     *                      "project_client_name": "string",
     *                      "devise": "string",
     *                  },
     *              @OA\Schema (
     *
     *                      type="object",
     *                      @OA\Property(
     *                           property="project_name",
     *                           required=true,
     *                           description="project_name",
     *                           type="string"
     *                      ),
     *                      @OA\Property(
     *                           property="quantité",
     *                           required=true,
     *                           description="quantité",
     *                           type="quantité"
     *                      ),
     *                      @OA\Property(
     *                           property="project_client_name",
     *                           required=true,
     *                           description="project_client_name",
     *                           type="string"
     *                      ),
     *                      @OA\Property(
     *                           property="devise",
     *                           required=true,
     *                           description="devise",
     *                           type="string"
     *                      ),
     *

     *
     *                  ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function UpdateProject(Request $request, int $project_id)
    {
        $request->validate([
            "project_name" => "required",
            "project_address" => "required",
            "project_client_name" => "required",
            "devise" => "required",
        ]);
        $project = Project::find($project_id);
        $project->project_name = $request->project_name;
        $project->project_address = $request->project_address;
        $project->project_client_name = $request->project_client_name;
        $project->devise = $request->devise;
        $project->save();
        return response()->json(["project" => $project]);
    }
    /**
     * @OA\Get(
     *     path="/api/AllProjects",
     *     tags={"Projects"},
     *     description="Returns list of projects",
     *     @OA\Response(response="200", description="Display a listing of projects."),
     *     @OA\Response(response="401", description="Unauthenticated"),
     *     @OA\Response(response="403", description="Forbidden"),
     * )
     */
    public function AllProjects()
    {
        return response()->json(["projects" => Project::all()]);
    }
}
