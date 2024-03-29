<?php

declare(strict_types=1);

/**
 * @copyright   Copyright 2020, CitrusContract. All Rights Reserved.
 * @author      take64 <take64@citrus.tk>
 * @license     http://www.citrus.tk/
 */

namespace Test\Sample\Contract\User;

use Citrus\Contract\ElementType;
use Test\Sample\Entity\UserEntity;

return [
    'type' => UserEntity::class,
    'elements' => [
        'user_id' => [
            'property' => 'user_id',
            'name' => 'ユーザーID',
            'var_type' => ElementType::TYPE_STRING,
        ],
        'password' => [
            'property' => 'password',
            'name' => 'パスワード',
            'var_type' => ElementType::TYPE_STRING,
        ],
    ],
];
