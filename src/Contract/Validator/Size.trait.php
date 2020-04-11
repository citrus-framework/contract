<?php

declare(strict_types=1);

/**
 * @copyright   Copyright 2020, CitrusContract. All Rights Reserved.
 * @author      take64 <take64@citrus.tk>
 * @license     http://www.citrus.tk/
 */

namespace Citrus\Contract\Validator;

use Citrus\Contract\ContractException;
use Citrus\Contract\Element;
use Citrus\Contract\ElementType;
use Citrus\Variable\Strings;

/**
 * コントラクトプロパティの検証(サイズ)
 */
trait Size
{
    /**
     * 必須チェック
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function required(Element $element): void
    {
        // 必須でなければtrue
        if (false === $element->required)
        {
            return;
        }
        // 数値として認識できるということはtrue
        if (true === is_numeric($element->value))
        {
            return;
        }

        ContractException::exceptionIf(empty($element->value), sprintf('「%s」は入力必須です。', $element->name));
    }



    /**
     * 最大値チェック
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function max(Element $element): void
    {
        // 入力がある場合のみチェックする。
        // null もしくは 空文字 はスルー
        if (true === is_null($element->max) or true === Strings::isEmpty($element->value))
        {
            return;
        }

        // 入力値チェック
        if (true === in_array($element->var_type, ElementType::$NUMERICALS, true))
        {
            self::numericMax($element);
        }
        else if (ElementType::TYPE_STRING === $element->var_type)
        {
            self::lengthMax($element);
        }
    }



    /**
     * 最小値チェック
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function min(Element $element): void
    {
        // 入力がある場合のみチェックする。
        // null もしくは 空文字 はスルー
        if (true === is_null($element->min) or true === Strings::isEmpty($element->value))
        {
            return;
        }

        // 入力値チェック
        if (true === in_array($element->var_type, ElementType::$NUMERICALS, true))
        {
            self::numericMin($element);
        }
        else if (ElementType::TYPE_STRING === $element->var_type)
        {
            self::lengthMin($element);
        }
    }



    /**
     * 最大値チェック(数値)
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function numericMax(Element $element): void
    {
        ContractException::exceptionIf(
            ($element->value > $element->max),
            sprintf('「%s」には「%s」以下の値を入力してください。', $element->name, $element->max));
    }



    /**
     * 最小値チェック(数値)
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function numericMin(Element $element): void
    {
        ContractException::exceptionIf(
            ($element->value < $element->min),
            sprintf('「%s」には「%s」以上の値を入力してください。', $element->name, $element->min));
    }



    /**
     * 最大値チェック(文字列長)
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function lengthMax(Element $element): void
    {
        $length = mb_strwidth($element->value, 'UTF-8');
        ContractException::exceptionIf(
            ($length > $element->max),
            sprintf('「%s」には「%s」文字以下で入力してください。', $element->name, $element->max));
    }



    /**
     * 最小値チェック(文字列長)
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function lengthMin(Element $element): void
    {
        $length = mb_strwidth($element->value, 'UTF-8');
        ContractException::exceptionIf(
            ($length < $element->min),
            sprintf('「%s」には「%s」文字以上で入力してください。', $element->name, $element->min));
    }
}
