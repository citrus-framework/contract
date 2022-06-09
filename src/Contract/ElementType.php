<?php

declare(strict_types=1);

/**
 * @copyright   Copyright 2019, CitrusFramework. All Rights Reserved.
 * @author      take64 <take64@citrus.tk>
 * @license     http://www.citrus.tk/
 */

namespace Citrus\Contract;

/**
 * 要素型タイプ
 */
class ElementType
{
    /** @var string int */
    public const TYPE_INT = 'int';

    /** @var string float */
    public const TYPE_FLOAT = 'float';

    /** @var string numeric */
    public const TYPE_NUMERIC = 'numeric';

    /** @var string string */
    public const TYPE_STRING = 'string';

    /** @var string alphabet */
    public const TYPE_ALPHABET = 'alphabet';

    /** @var string alphabet & numeric */
    public const TYPE_ALPHANUMERIC = 'alphanumeric';

    /** @var string alphabet & numeric & marks */
    public const TYPE_AN_MARKS = 'an_marks';

    /** @var string date */
    public const TYPE_DATE = 'date';

    /** @var string time */
    public const TYPE_TIME = 'time';

    /** @var string datetime */
    public const TYPE_DATETIME = 'datetime';

    /** @var string bool */
    public const TYPE_BOOL = 'bool';

    /** @var string file */
    public const TYPE_FILE = 'file';

    /** @var string telephone */
    public const TYPE_TELEPHONE = 'telephone';

    /** @var string tel */
    public const TYPE_TEL = 'tel';

    /** @var string year */
    public const TYPE_YEAR = 'year';

    /** @var string month */
    public const TYPE_MONTH = 'month';

    /** @var string day */
    public const TYPE_DAY = 'day';

    /** @var string email */
    public const TYPE_EMAIL = 'email';

    /** @var string[] 数値系要素 */
    public static array $NUMERICALS = [
        self::TYPE_INT,
        self::TYPE_FLOAT,
        self::TYPE_NUMERIC,
    ];
}
