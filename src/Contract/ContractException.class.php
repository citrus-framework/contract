<?php

declare(strict_types=1);

/**
 * @copyright   Copyright 2020, CitrusContract. All Rights Reserved.
 * @author      take64 <take64@citrus.tk>
 * @license     http://www.citrus.tk/
 */

namespace Citrus\Contract;

use Citrus\CitrusException;

/**
 * コントラクト例外クラス
 */
class ContractException extends CitrusException
{
    /**
     * {@inheritDoc}
     *
     * @throws ContractException
     */
    public static function exceptionIf($expr, string $message): void
    {
        parent::exceptionIf($expr, $message);
    }



    /**
     * {@inheritDoc}
     *
     * @throws ContractException
     */
    public static function exceptionElse($expr, string $message): void
    {
        parent::exceptionElse($expr, $message);
    }
}
