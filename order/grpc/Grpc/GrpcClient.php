<?php
namespace Grpc;

use Hyperf\GrpcClient\BaseClient;

class GrpcClient
{
    private $client;

    public function __construct(string $url = '127.0.0.1:9601') {
        $this->client = new BaseClient($url, [
            'credentials' => null,
        ]);
    }

    public function get(string $path = '', array $data = [])
    {
        $request = new GrpcMessage();
        $request->setData($data);
        list($reply, $status) = $this->client->_simpleRequest(
            $path,
            $request,
            [GrpcMessage::class, 'decode']
        );
        $message = $reply->getMessage();
        var_dump(memory_get_usage(true));
        return $message;
    }
}
