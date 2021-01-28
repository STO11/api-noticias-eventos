<?php
namespace App\Business;
use Illuminate\Support\Arr;
class HttpCode
{
    public static function getCodeDefaultMessage()
    {
        $codes = [
            ['success' => ['code' => 200, 'msg' => 'Operação realizada com sucesso']],
            ['created' => ['code' => 201, 'msg' => 'Registrado com sucesso']],
            ['forbidden' => ['code' => 403, 'msg' => 'Não foi possível realizar essa operação']],
            ['unauthorized' => ['code' => 401, 'msg' => 'Operação não autorizado']],
            ['not_found' => ['code' => 404, 'msg' => 'Operação não foi encontrada']]
        ];
        return Arr::collapse($codes);
    }
}
