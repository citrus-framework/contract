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
 * コントラクトプロパティの検証(日時)
 */
trait Datetime
{
    /**
     * 日付チェック
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function varTypeDate(Element $element): void
    {
        $timestamp = strtotime($element->value);
        if (false !== $timestamp)
        {
            $year = (int)date('Y', $timestamp);
            $month = (int)date('n', $timestamp);
            $day = (int)date('j', $timestamp);
            if (true === checkdate($month, $day, $year))
            {
                return;
            }
        }
        // ここまでに返却されてない場合はエラー
        throw new ContractException(
            sprintf('「%s」には年月日を「yyyy-mm-dd」「yyyy/mm/dd」「yyyymmdd」のいずれかの形式で入力してください。', $element->name)
        );
    }



    /**
     * 時間チェック
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function varTypeTime(Element $element): void
    {
        ContractException::exceptionIf(
            (0 === preg_match('/^[0-9]{2}:[0-5][0-9]:?([0-5][0-9])+?/', $element->value)),
            sprintf('「%s」には時分秒または時分を入力してください。', $element->name));
    }



    /**
     * 日時チェック
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function varTypeDatetime(Element $element): void
    {
        ContractException::exceptionIf(
            (false === strtotime($element->value)),
            sprintf('「%s」には年月日時分秒を入力してください。', $element->name));
    }
}
