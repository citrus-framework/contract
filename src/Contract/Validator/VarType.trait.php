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

/**
 * コントラクトプロパティの検証(変数型)
 */
trait VarType
{
    /**
     * 型チェック(int)
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function varTypeInt(Element $element): void
    {
        ContractException::exceptionIf(
            (
                false === is_int(intval($element->value)) and
                false === is_numeric($element->value) and
                0 === preg_match('/^-?[0-9]*$/', $element->value)
            ),
            sprintf('「%s」には整数を入力してください。', $element->name));
        ContractException::exceptionIf(
            (PHP_INT_MAX <= $element->value),
            sprintf('「%s」には「%d」以下の値を入力してください。', $element->name, PHP_INT_MAX));
        ContractException::exceptionIf(
            (PHP_INT_MIN >= $element->value),
            sprintf('「%s」には「%d」以上の値を入力してください。', $element->name, PHP_INT_MIN));
    }



    /**
     * 型チェック(float)
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function varTypeFloat(Element $element): void
    {
        ContractException::exceptionIf(
            (false === is_float($element->value)),
            sprintf('「%s」には少数を入力してください。', $element->name));
    }



    /**
     * 型チェック(数値として認識できる)
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function varTypeNumeric(Element $element): void
    {
        ContractException::exceptionIf(
            (false === is_numeric($element->value)),
            sprintf('「%s」には数字を入力してください。', $element->name));
    }



    /**
     * 文字列チェック
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function varTypeString(Element $element): void
    {
        ContractException::exceptionIf(
            (false === is_string($element->value)),
            sprintf('「%s」には文字列を入力してください。', $element->name));
    }



    /**
     * アルファベットチェック
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function varTypeAlphabet(Element $element): void
    {
        ContractException::exceptionIf(
            (0 === preg_match('/^[a-zA-Z]/', $element->value)),
            sprintf('「%s」には半角英字を入力してください。', $element->name));
    }



    /**
     * 英数字チェック
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function varTypeAlphanumeric(Element $element): void
    {
        ContractException::exceptionIf(
            (0 === preg_match('/^[a-zA-Z0-9_.]/', $element->value)),
            sprintf('「%s」には半角英数字を入力してください。', $element->name));
    }



    /**
     * 英数字と記号チェック
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function varTypeANMarks(Element $element): void
    {
        ContractException::exceptionIf(
            (0 === preg_match('/^[a-zA-Z0-9_.%&#-]/', $element->value)),
            sprintf('「%s」には半角英数字および記号を入力してください。', $element->name));
    }
}
