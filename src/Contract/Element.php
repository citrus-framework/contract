<?php

declare(strict_types=1);

/**
 * @copyright   Copyright 2020, CitrusContract. All Rights Reserved.
 * @author      take64 <take64@citrus.tk>
 * @license     http://www.citrus.tk/
 */

namespace Citrus\Contract;

use Citrus\Variable\Binders;

/**
 * コントラクト要素を表すクラス
 */
class Element
{
    use Binders;

    /** @var string|null プロパティキー */
    public string|null $property = null;

    /** @var string|null 名称 */
    public string|null $name = null;

    /** @var mixed|null 値 */
    public mixed $value = null;

    /** @var string|null 型 */
    public string|null $var_type = null;

    /** @var int|null 最小値 */
    public int|null $min = null;

    /** @var int|null 最大値 */
    public int|null $max = null;

    /** @var bool|null true:必須 */
    public bool|null $required = false;



    /**
     * constructor.
     *
     * @param array $element 要素定義
     * @param mixed $value   値
     */
    public function __construct(array $element, mixed $value)
    {
        $this->bindArray($element);
        $this->value = $value;
    }



    /**
     * バリデート
     *
     * @throws ContractException
     */
    public function validate(): void
    {
        // 必須チェック
        Validator::required($this);
        // 変数型チェック
        Validator::varType($this);
        // 最大値チェック
        Validator::max($this);
        // 最小値チェック
        Validator::min($this);
    }
}
