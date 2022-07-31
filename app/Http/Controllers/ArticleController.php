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
     *                      "quantité": 1,
     *                      "prix_unitaire": 4,
     *                      "unité": "string",
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
     *                           property="quantité",
     *                           required=true,
     *                           description="quantité",
     *                           type="integer"
     *                      ),
     *                      @OA\Property(
     *                           property="prix_unitaire",
     *                           required=true,
     *                           description="prix_unitaire",
     *                           type="integer"
     *                      ),
     *                      @OA\Property(
     *                           property="unité",
     *                           required=true,
     *                           description="unité",
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
            "quantité" => "required",
            "unité" => "required",
            "prix_unitaire" => "required",
            //"prix_total" => "required",
        ]);
        $article =  Article::create([
            "project_id" => $project_id,
            "N_prix" => $request->N_prix,
            "article_name" => $request->article_name,
            "quantité" => $request->quantité,
            "unité" => $request->unité,
            "prix_unitaire" => $request->prix_unitaire,
            "prix_total" => intval($request->prix_unitaire) * intval($request->quantité),
        ]);
        return response()->json(["article", $article]);
    }
}
