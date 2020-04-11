<?php
/**
 * @copyright   Copyright 2020, CitrusContract All Rights Reserved.
 * @author      take64 <take64@citrus.tk>
 * @license     http://www.besidesplus.net/
 */

$dir_base = dirname(__FILE__) . '/Sample';

return [
    'default' => [
        'application' => [
            'id'        => 'Test\Sample',
            'path'      => $dir_base,
        ],
        'contract' => [
            'path'      => $dir_base,
        ],
    ],
    'example.com' => [
    ],
];
