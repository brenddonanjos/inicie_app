<?php

namespace App\Http\Controllers;

use App\PostModel;
use App\UserModel;
use App\WebServices\GoRestWebService;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = PostModel::orderBy("id", "DESC")->get();
        return response()->json($posts);
    }
    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function index_comments($id)
    {
        $posts = PostModel::with("comments")->find($id);
        return response()->json($posts);
    }
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //validation
            $mensagens = [
                'required' => 'O campo :attribute é obrigatório!',
            ];
            $request->validate([
                'title' => 'required',
                'body' => 'required',
                'user_id' => 'required',
            ], $mensagens);

            $user = UserModel::find($request->get("user_id"));
            if ($user == null)
                throw new Exception("Usuário informado não existe", 1);

            $request->request->add(["gorest_userid" => $user->go_rest_id]);
            //Send to register on gorest API 
            $gr = new GoRestWebService();
            $gorest_store = $gr->PostSave($request);
            if (!$gorest_store->success)
                throw new Exception("Erro ao salvar em GoRest: " . $gorest_store->error, 1);

            $request->request->add(["go_rest_id" => $gorest_store->body->id]);
            $post = $this->save($request);
            return $this->success("Post registrado com sucesso!", $post, 201);
        } catch (\Illuminate\Validation\ValidationException $th) {
            $error = $th->errors();
            return $this->error($error, 400);
        } catch (\Throwable $th) {

            return $this->error($th->getMessage(), 400);
        }
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function save(Request $request)
    {
        try {
            $post = new PostModel();
            $post->user_id = $request->get("user_id");
            $post->title = $request->get("title");
            $post->body = $request->get("body");
            $post->go_rest_id = $request->get("go_rest_id");
            $post->save();
            return $post;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
