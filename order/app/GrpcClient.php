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
        $message = $reply->getMessage();
        var_dump(memory_get_usage(true));
        return $message;
    }
}
