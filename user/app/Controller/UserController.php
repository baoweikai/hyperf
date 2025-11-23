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
        $rows = User::query()->where('delete_at', '=', 0)->get()->all();
        $message = new Reply();
        $message->setMessage(json_encode(['list' => $rows]));
        return $message;
    }

    public function view()
    {
        $model = User::query()->where('id', '=', 193)->first();

        $message = new Reply();
        $message->setMessage(json_encode($model));
        return $message;
    }
}
