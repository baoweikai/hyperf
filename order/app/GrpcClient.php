<?php
namespace App;

use Hyperf\GrpcClient\BaseClient;
use Grpc\Request;

class GrpcClient extends BaseClient
{
    public function __construct(string $host = '127.0.0.1:9601') {
        parent::__construct($host, [
            'credentials' => null,
        ]);
    }

    public function request(string $path = '', array $data = [])
    {
        $request = new Request([]);
        $request->setMessage('1111111');
        list($reply, $status) = $this->_simpleRequest(
            $path,
            $request,
            [Request::class, 'decode']
        );
        if($status == 0){
            $message = $reply->getMessage();
            var_dump('[111', $status, memory_get_usage(true));
            return ['code' => 200, 'data' => $message];
        } else {
            return ['msg' => 'grpc error', 'code' => 501];
        }
    }
}
