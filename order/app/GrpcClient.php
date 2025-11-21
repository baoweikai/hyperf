<?php
namespace App;

use Hyperf\GrpcClient\BaseClient;

class GrpcClient extends BaseClient
{
    public function sayHello(HiUser $argument)
    {
        return $this->_simpleRequest(
            '/grpc.Hi/SayHello',
            $argument,
            [HiReply::class, 'decode']
        );
    }
}
