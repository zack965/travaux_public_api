<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    /**
     * @OA\Get(
     *     path="/api/AllArticles",
     *     tags={"Articles"},
     *     description="Returns list of Articles",
     *     @OA\Response(response="200", description="Display a listing of projects."),
     *     @OA\Response(response="401", description="Unauthenticated"),
     *     @OA\Response(response="403", description="Forbidden"),
     * )
     */
    public function AllArticles()
    {
        return response()->json(["articles" => Article::all()]);
    }
    /**
     * @OA\Get(
     *     path="/api/ArticlesOfProject/{project_id}",
     *     tags={"Articles"},
     *     description="Returns list of Articles of project",
     *     @OA\Parameter(
     *          name="project_id",
     *          description="Project id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(response="200", description="Display a listing of projects."),
     *     @OA\Response(response="401", description="Unauthenticated"),
     *     @OA\Response(response="403", description="Forbidden"),
     * )
     */
    public function ArticlesOfProject(int $project_id)
    {
        return response()->json(["articles" => Article::where("project_id", $project_id)->get()]);
    }
    /**
     * @OA\Post(
     *      path="/api/CreateArticle/{project_id}",
     *      tags={"Articles"},
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
     *                      "N_prix": "string",
     *                      "article_name": "string",
     *                      "quantit??": 1,
     *                      "prix_unitaire": 4,
     *                      "unit??": "string",
     *                  },
     *              @OA\Schema (
     *
     *                      type="object",
     *                      @OA\Property(
     *                           property="N_prix",
     *                           required=true,
     *                           description="N_prix",
     *                           type="string"
     *                      ),
     *                      @OA\Property(
     *                           property="article_name",
     *                           required=true,
     *                           description="article_name",
     *                           type="string"
     *                      ),
     *                      @OA\Property(
     *                           property="quantit??",
     *                           required=true,
     *                           description="quantit??",
     *                           type="integer"
     *                      ),
     *                      @OA\Property(
     *                           property="prix_unitaire",
     *                           required=true,
     *                           description="prix_unitaire",
     *                           type="integer"
     *                      ),
     *                      @OA\Property(
     *                           property="unit??",
     *                           required=true,
     *                           description="unit??",
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
    public function CreateArticle(Request $request, int $project_id)
    {
        $request->validate([
            "N_prix" => "required",
            "article_name" => "required",
            "quantit??" => "required",
            "unit??" => "required",
            "prix_unitaire" => "required",
            //"prix_total" => "required",
        ]);
        $article =  Article::create([
            "project_id" => $project_id,
            "N_prix" => $request->N_prix,
            "article_name" => $request->article_name,
            "quantit??" => $request->quantit??,
            "unit??" => $request->unit??,
            "prix_unitaire" => $request->prix_unitaire,
            "prix_total" => intval($request->prix_unitaire) * intval($request->quantit??),
        ]);
        return response()->json(["article", $article]);
    }
}
