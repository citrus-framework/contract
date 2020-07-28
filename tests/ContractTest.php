<?php

declare(strict_types=1);

/**
 * @copyright   Copyright 2020, CitrusContract. All Rights Reserved.
 * @author      take64 <take64@citrus.tk>
 * @license     http://www.citrus.tk/
 */

namespace Test;

use Citrus\Configure\ConfigureException;
use Citrus\Contract;
use PHPUnit\Framework\TestCase;
use Test\Sample\Entity\UserEntity;

/**
 * コントラクトクラスのテスト
 */
class ContractTest extends TestCase
{
    /**
     * @test
     * @throws ConfigureException
     */
    public function configurable_設定を読み込んで適用できる()
    {
        // 設定ファイル
        $configures = require(dirname(__DIR__) . '/tests/citrus-configure.php');

        // 生成
        $contract = Contract::sharedInstance()->loadConfigures($configures);

        // 検証
        $this->assertSame($configures['default']['contract']['path'], $contract->configures['path']);
    }



    /**
     * @test
     */
    public function autoParse_想定通り()
    {
        $_POST['user_id'] = 'scott';
        $_POST['password'] = 'tiger';
        $_SERVER['REQUEST_URI'] = '/Contract/User/Login';

        // 設定ファイル
        $configures = require(dirname(__DIR__) . '/tests/citrus-configure.php');

        // 生成
        /** @var Contract $contract */
        $contract = Contract::sharedInstance()->loadConfigures($configures);

        // 自動パース
        $user = $contract->autoParse();

        // 検証
        $this->assertInstanceOf(UserEntity::class, $user);
    }
}
