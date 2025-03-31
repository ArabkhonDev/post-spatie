<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
     /**
     * @OA\Get(
     *      path="/api/posts",
     *      operationId="getPostList",
     *      tags={"Posts"},
     *      summary="Barcha postlarni olish",
     *      description="Postlar ro‘yxatini qaytaradi",
     *      @OA\Response(
     *          response=200,
     *          description="Muvaffaqiyatli",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(
     *                  type="object",
     *                  @OA\Property(property="id", type="integer", example=1),
     *                  @OA\Property(property="title", type="string", example="Post sarlavhasi"),
     *                  @OA\Property(property="body", type="string", example="Post matni"),
     *              )
     *          )
     *      )
     * )
     */
    public function index()
    {
        $posts = Post::orderBy("created_at","desc")->paginate(10);
        return response()->json($posts);
    }

    /**
 * @OA\Post(
 *      path="/api/posts",
 *      operationId="createPost",
 *      tags={"Posts"},
 *      summary="Yangi post yaratish",
 *      description="Post yaratish API",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"title","body"},
 *              @OA\Property(property="title", type="string", example="Yangi post"),
 *              @OA\Property(property="body", type="string", example="Postning batafsil ma'lumoti"),
 *          )
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="Post yaratildi",
 *          @OA\JsonContent(
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="title", type="string", example="Yangi post"),
 *              @OA\Property(property="body", type="string", example="Postning batafsil ma'lumoti"),
 *          )
 *      )
 * )
 */

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->all());
        return response()->json($post);
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return response()->json($post);
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json($post);
    }
}
