<?php

declare(strict_types=1);

/**
 * @copyright   Copyright 2020, CitrusContract. All Rights Reserved.
 * @author      take64 <take64@citrus.tk>
 * @license     http://www.citrus.tk/
 */

namespace Test\Contract;

use Citrus\Contract\Builder;
use Citrus\Contract\ContractException;
use PHPUnit\Framework\TestCase;
use Test\Sample\Entity\UserEntity;

/**
 * オブジェクト生成クラスのテスト
 */
class BuilderTest extends TestCase
{
    /**
     * @test
     */
    public function execute_想定通り()
    {
        $user_id = 'scott';
        $password = 'tiger';

        $contract_path = __DIR__ . '/../Sample/Contract/User/Login.php';
        /** @var UserEntity $user */
        $user = Builder::execute($contract_path, [
            'user_id' => $user_id,
            'password' => $password,
        ]);

        $this->assertSame($user_id, $user->user_id);
        $this->assertSame($password, $user->password);
        $this->assertInstanceOf(UserEntity::class, $user);
    }



    /**
     * @test
     */
    public function execute_typeが無い()
    {
        $this->expectException(ContractException::class);
        $this->expectExceptionMessage('type');

        $user_id = 'scott';
        $password = 'tiger';

        $contract_path = __DIR__ . '/../Sample/Contract/User/LoginFailureType.php';
        /** @var UserEntity $user */
        $user = Builder::execute($contract_path, [
            'user_id' => $user_id,
            'password' => $password,
        ]);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function execute_propertiesが無い()
    {
        $this->expectException(ContractException::class);
        $this->expectExceptionMessage('elements');

        $user_id = 'scott';
        $password = 'tiger';

        $contract_path = __DIR__ . '/../Sample/Contract/User/LoginFailureProperties.php';
        /** @var UserEntity $user */
        $user = Builder::execute($contract_path, [
            'user_id' => $user_id,
            'password' => $password,
        ]);
    }
}
