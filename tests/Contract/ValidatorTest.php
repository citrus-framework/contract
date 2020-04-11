<?php

declare(strict_types=1);

/**
 * @copyright   Copyright 2019, CitrusFramework. All Rights Reserved.
 * @author      take64 <take64@citrus.tk>
 * @license     http://www.citrus.tk/
 */

namespace Test;

use Citrus\Contract\ContractException;
use Citrus\Contract\Element;
use Citrus\Contract\Validator;
use PHPUnit\Framework\TestCase;

/**
 * コントラクトバリデーターテスト
 */
class ValidatorTest extends TestCase
{
    /**
     * @test
     * @throws ContractException
     */
    public function required_必須チェック_正常()
    {
        $element = new Element([
           'id' => 'user_id',
           'required' => true,
        ], 'hogehoge');
        Validator::required($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function required_必須チェック_例外()
    {
        $this->expectException(ContractException::class);
        $element = new Element([
            'id' => 'user_id',
            'required' => true,
        ], null);
        Validator::required($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeInt_数値チェック_正常()
    {
        $element = new Element([
            'id' => 'user_id',
        ], 11);
        Validator::varTypeInt($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeInt_数値チェック_例外()
    {
        $this->expectException(ContractException::class);

        $element = new Element([
            'id' => 'user_id',
        ], null);
        Validator::varTypeInt($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeFlaot_浮動小数点チェック_正常()
    {
        $element = new Element([
            'id' => 'user_id',
        ], 11.5);
        Validator::varTypeFloat($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeFlaot_浮動小数点チェック_例外()
    {
        $this->expectException(ContractException::class);

        $element = new Element([
            'id' => 'user_id',
        ], null);
        Validator::varTypeFloat($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeNumeric_数値チェック_正常()
    {
        $element = new Element([
            'id' => 'user_id',
        ], 11.5);
        Validator::varTypeNumeric($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeNumeric_数値チェック_例外()
    {
        $this->expectException(ContractException::class);

        $element = new Element([
            'id' => 'user_id',
        ], 'aaa');
        Validator::varTypeNumeric($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeAlphabet_アルファベットチェック_正常()
    {
        $element = new Element([
            'id' => 'user_id',
        ], 'abc');
        Validator::varTypeAlphabet($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeAlphabet_アルファベットチェック_例外()
    {
        $this->expectException(ContractException::class);

        $element = new Element([
            'id' => 'user_id',
        ], '11');
        Validator::varTypeAlphabet($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeAlphanumeric_英数字チェック_正常()
    {
        $element = new Element([
            'id' => 'user_id',
        ], 'abc11');
        Validator::varTypeAlphanumeric($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeAlphanumeric_英数字チェック_例外()
    {
        $this->expectException(ContractException::class);

        $element = new Element([
            'id' => 'user_id',
        ], '#$a');
        Validator::varTypeAlphanumeric($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeANMarks_英数字記号チェック_正常()
    {
        $element = new Element([
            'id' => 'user_id',
        ], 'abc11$#');
        Validator::varTypeANMarks($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeANMarks_英数字記号チェック_例外()
    {
        $this->expectException(ContractException::class);

        $element = new Element([
            'id' => 'user_id',
        ], 'あああ');
        Validator::varTypeANMarks($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeDate_日付チェック_正常()
    {
        $element = new Element([
            'id' => 'user_id',
        ], '2019-11-11');
        Validator::varTypeDate($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeDate_日付チェック_例外()
    {
        $this->expectException(ContractException::class);

        $element = new Element([
            'id' => 'user_id',
        ], '2019-13-13');
        Validator::varTypeDate($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeTime_時間チェック_正常()
    {
        $element = new Element([
            'id' => 'user_id',
        ], '01:02:03');
        Validator::varTypeTime($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeTime_時間チェック_例外()
    {
        $this->expectException(ContractException::class);

        $element = new Element([
            'id' => 'user_id',
        ], '01:02:79');
        Validator::varTypeTime($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeDatetime_日時チェック_正常()
    {
        // true
        $element = new Element([
            'id' => 'user_id',
        ], '2019-11-11 01:02:03');
        Validator::varTypeDatetime($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeDatetime_日時チェック_例外()
    {
        $this->expectException(ContractException::class);

        $element = new Element([
            'id' => 'user_id',
        ], '2019-13-13 01:02:79');
        Validator::varTypeDatetime($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeTel_電話番号チェック_正常()
    {
        $element = new Element([
            'id' => 'user_id',
        ], '01-2345-6789');
        Validator::varTypeTel($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeTel_電話番号チェック_例外()
    {
        $this->expectException(ContractException::class);

        $element = new Element([
            'id' => 'user_id',
        ], '0001-2345-6789');
        Validator::varTypeTel($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeEmail_メールアドレスチェック_正常()
    {
        $element = new Element([
            'id' => 'user_id',
        ], 'hoge@example.com');
        Validator::varTypeEmail($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function varTypeEmail_メールアドレスチェック_例外()
    {
        $this->expectException(ContractException::class);

        $element = new Element([
            'id' => 'user_id',
        ], 'hoge[at]example.c');
        Validator::varTypeEmail($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function numericMax_最大値チェック_正常()
    {
        $element = new Element([
            'id' => 'user_id',
            'max' => 10
        ], 10);
        Validator::numericMax($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function numericMax_最大値チェック_例外()
    {
        $this->expectException(ContractException::class);

        $element = new Element([
            'id' => 'user_id',
            'max' => 10
        ], 11);
        Validator::numericMax($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function numericMin_最小値チェック_正常()
    {
        $element = new Element([
            'id' => 'user_id',
            'min' => 1
        ], 1);
        Validator::numericMin($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function numericMin_最小値チェック_例外()
    {
        $this->expectException(ContractException::class);

        $element = new Element([
            'id' => 'user_id',
            'min' => 1
        ], 0);
        Validator::numericMin($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function lengthMax_最大値チェック_正常()
    {
        $element = new Element([
            'id' => 'user_id',
            'max' => 10
        ], '0123456789');
        Validator::lengthMax($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function lengthMax_最大値チェック_例外()
    {
        $this->expectException(ContractException::class);

        $element = new Element([
            'id' => 'user_id',
            'max' => 10
        ], '01234567890');
        Validator::lengthMax($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function lengthMin_最小値チェック_正常()
    {
        $element = new Element([
            'id' => 'user_id',
            'min' => 2
        ], '01');
        Validator::lengthMin($element);
    }



    /**
     * @test
     * @throws ContractException
     */
    public function lengthMin_最小値チェック_例外()
    {
        $this->expectException(ContractException::class);

        $element = new Element([
            'id' => 'user_id',
            'min' => 2
        ], '0');
        Validator::lengthMin($element);
    }
}

