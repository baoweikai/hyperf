<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use Grpc\Reply;
use App\Model\User;

class UserController extends AbstractController
{
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello 111 {$user}.",
        ];
    }

    public function info() 
    {
        $model = User::query()->where('id', '=', 193)->first();

        $message = new Reply();
        $message->setMessage(json_encode($model->getDates()));
        return $message;
    }
}
