<?php

namespace App\Http\Controllers;

use App\CommentModel;
use App\PostModel;
use App\WebServices\GoRestWebService;
use Exception;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = CommentModel::orderBy("id", "DESC")->get();
        return response()->json($comments);
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
                'name' => 'required',
                'body' => 'required',
                'email' => 'required',
                'post_id' => 'required',
            ], $mensagens);

            $post = PostModel::find($request->get("post_id"));
            if ($post == null)
                throw new Exception("Post não encontrado", 1);

            $request->request->add(["gorest_postid" => $post->go_rest_id]);
            //Send to register on gorest API 
            $gr = new GoRestWebService();
            $gorest_store = $gr->CommentSave($request);
            if (!$gorest_store->success)
                throw new Exception("Erro ao salvar em GoRest: " . $gorest_store->error, 1);

            $request->request->add(["go_rest_id" => $gorest_store->body->id]);
            $post = $this->save($request);
            return $this->success("Comentário registrado com sucesso!", $post, 201);
        } catch (\Illuminate\Validation\ValidationException $th) {
            $error = $th->errors();
            return $this->error($error, 400);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400);
        }
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_first_post(Request $request)
    {
        try {
            //validation
            $mensagens = [
                'required' => 'O campo :attribute é obrigatório!',
            ];
            $request->validate([
                'name' => 'required',
                'body' => 'required',
                'email' => 'required',
            ], $mensagens);

            $post = PostModel::orderBy("id", "DESC")->first();
            if ($post == null)
                throw new Exception("Post não encontrado", 1);

            $request->request->add(["post_id" => $post->id]);
            $request->request->add(["gorest_postid" => $post->go_rest_id]);
            //Send to register on gorest API 
            $gr = new GoRestWebService();
            $gorest_store = $gr->CommentSave($request);
            if (!$gorest_store->success)
                throw new Exception("Erro ao salvar em GoRest: " . $gorest_store->error, 1);

            $request->request->add(["go_rest_id" => $gorest_store->body->id]);
            $post = $this->save($request);
            return $this->success("Comentário registrado no post mais recente!", $post, 201);
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
            $comment = new CommentModel();
            $comment->name = $request->get("name");
            $comment->email = $request->get("email");
            $comment->body = $request->get("body");
            $comment->post_id = $request->get("post_id");
            $comment->go_rest_id = $request->get("go_rest_id");
            $comment->save();
            return $comment;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $comment = CommentModel::find($id);
            if ($comment == null)
                throw new Exception("Comentário não encontrado", 1);

            $gr = new GoRestWebService();
            $gorest_store = $gr->CommentDelete($comment->go_rest_id);
            if (!$gorest_store->success)
                throw new Exception("Erro ao deletar em GoRest: " . $gorest_store->error, 1);

            $comment->delete();
            return $this->success("Comentário deletado!", [], 201);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400);
        }
    }
}
