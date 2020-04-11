<?php

declare(strict_types=1);

/**
 * @copyright   Copyright 2020, CitrusContract. All Rights Reserved.
 * @author      take64 <take64@citrus.tk>
 * @license     http://www.citrus.tk/
 */

namespace Citrus\Contract;

use Citrus\Variable\Structs;

/**
 * コントラクト要素を表すクラス
 */
class Element
{
    use Structs;

    /** @var string プロパティキー */
    public $property;

    /** @var string 名称 */
    public $name;

    /** @var mixed 値 */
    public $value;

    /** @var string 型 */
    public $var_type;

    /** @var int 最小値 */
    public $min;

    /** @var int 最大値 */
    public $max;

    /** @var bool true:必須 */
    public $required = false;



    /**
     * constructor.
     *
     * @param array $element 要素定義
     * @param mixed $value   値
     */
    public function __construct(array $element, $value)
    {
        $this->bind($element);
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
