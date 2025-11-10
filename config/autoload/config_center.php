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
use Hyperf\ConfigCenter\Mode;

use function Hyperf\Support\env;

return [
    'enable' => (bool) env('CONFIG_CENTER_ENABLE', false),
    'driver' => env('CONFIG_CENTER_DRIVER', 'nacos'),
    'mode' => env('CONFIG_CENTER_MODE', Mode::PROCESS),
    'drivers' => [
        'nacos' => [
            'driver' => Hyperf\ConfigNacos\NacosDriver::class,
            // 配置合并方式，支持覆盖和合并
            'merge_mode' => Hyperf\ConfigNacos\Constants::CONFIG_MERGE_OVERWRITE,
            'interval' => 3,
            // 如果对应的映射 key 没有设置，则使用默认的 key
            'default_key' => 'nacos_config',
            'listener_config' => [
                // dataId, group, tenant, type, content
                // 映射后的配置 KEY => Nacos 中实际的配置
                'nacos_config' => [
                    'tenant' => 'tenant', // corresponding with service.namespaceId
                    'data_id' => 'hyperf-service-config',
                    'group' => 'DEFAULT_GROUP',
                ],
                'nacos_config.data' => [
                    'data_id' => 'hyperf-service-config-yml',
                    'group' => 'DEFAULT_GROUP',
                    'type' => 'yml',
                ]
            ]
        ],
    ],
];
