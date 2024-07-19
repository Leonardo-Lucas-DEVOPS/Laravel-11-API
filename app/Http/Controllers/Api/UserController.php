<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
use PhpParser\Node\Stmt\TryCatch;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        // recurpera os dados em ordem pelo id crescente e faz a paginação dos dados
        $users = User::orderBy('id', 'ASC')->paginate(10);
        // retorna como json as informações populadas na var $Users 
        return response()->json([
            'status' => true,
            'message' => 'Lista de Usuários em ordem cresente de 10 em 10 ',
            'users' => $users,
        ], 200);
    }
    // vindo pela Url da API e passado como parametro para o metodo da controle o id é chamado o modelo com base no parametro
    public function show(User $Userid): JsonResponse
    {
        // Após passado no parametro userId com ID retorna como json os dados da model 
        return response()->json([
            'status' => true,
            'User' => $Userid,
        ], 200);
    }
    public function store(UserRequest $request): JsonResponse
    {

        // Para ter mais Consistencia declaramos o inicio meio e fim das transações no banco 
        DB::beginTransaction();
        try {
            // criação da solicitação 
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            //conclusão da transação de informações
            DB::commit();
            // retorna como json as informações de confirmação
            return response()->json([
                'status' => true,
                'menssage' => "Usuario criado com sucesso",
            ], 201);
        } catch (Exception $e)
        {
            // tratativa dos erros de cadastro

            //operação falhou
            DB::rollBack();

            //retorna uma mensagem de erro com status 400
            return response()->json([
                'status' => false,
                'menssage' => "Erro no cadastro do usuario",
            ], 400);
        }
    }
    public function update(UserRequest $request, User $Userid): JsonResponse
    {
        DB::beginTransaction();
        try {

            $Userid->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'User' => $request->$Userid,
                'message' => 'Usuário editado com Sucesso!',
            ], 200);
        } catch (Exception $e) {

            // operação não concluida 
            DB::rollBack();

            // retorno da operação
            return response()->json([
                'status' => false,
                'message' => 'usuario não editado!',
            ], 400);
        };
    }
    public function destroy(User $Userid): JsonResponse
    {

        try {
            $Userid->delete();
            return response()->json([
                "status" => true,
                "message" => "Usuario " . $Userid->name . " apagado",
                "user" => $Userid,
            ], 200);
        } catch (Exception $e) {

            return response()->json([
                "status" => false,
                "message" => 'Ususario não delerado',
            ], 400);
        }
    }
}
