<?php

namespace App\Http\Controllers;

use App\UserModel;
use App\WebServices\GoRestWebService;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = UserModel::all();
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
                'email' => 'required',
                'gender' => 'required',
            ], $mensagens);

            //Send to register on gorest API 
            $gr = new GoRestWebService();
            $gorest_store = $gr->UserSave($request);
            if (!$gorest_store->success)
                throw new Exception("Erro ao salvar em GoRest: " . $gorest_store->error, 400);
            //Persist localy on success api register cases
            $request->request->add(["go_rest_id" => $gorest_store->body->id]);
            $user = $this->save($request);
            return $this->success("Usuário registrado com sucesso!", $user, 201);
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
            $user = new UserModel();
            $user->name = $request->get("name");
            $user->email = $request->get("email");
            $user->gender = $request->get("gender");
            $user->status = "active";
            $user->go_rest_id = $request->get("go_rest_id");
            $user->save();
            return $user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = UserModel::find($id);
        return response()->json($user);
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_gorestid($id)
    {
        $user = UserModel::where("go_rest_id", $id)->first();
        return response()->json($user);
    }

    /**
     * Data sync with gorest Repository
     * @return \Illuminate\Http\Response
     */
    public function sync()
    {
        try {
            $gr = new GoRestWebService();
            $syncemails = [];
            $users = json_decode($gr->UserIndex(), true);

            if (count($users) > 0) {
                foreach ($users as $user) {
                    //Save on db case email doesn't exists
                    $usermodel = UserModel::where('email', $user['email'])->first();
                    if ($usermodel == null) {
                        array_push($syncemails, $user['email']);
                        $user['go_rest_id'] = $user["id"];
                        unset($user["id"]);

                        $this->save(new Request($user));
                    }
                }
            }
            return  $this->success("Usuários sincronizados", $syncemails, 201);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400);
        }
    }
}
