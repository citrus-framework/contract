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
    const TYPE_INT = 'int';

    /** @var string float */
    const TYPE_FLOAT = 'float';

    /** @var string numeric */
    const TYPE_NUMERIC = 'numeric';

    /** @var string string */
    const TYPE_STRING = 'string';

    /** @var string alphabet */
    const TYPE_ALPHABET = 'alphabet';

    /** @var string alphabet & numeric */
    const TYPE_ALPHANUMERIC = 'alphanumeric';

    /** @var string alphabet & numeric & marks */
    const TYPE_AN_MARKS = 'an_marks';

    /** @var string date */
    const TYPE_DATE = 'date';

    /** @var string time */
    const TYPE_TIME = 'time';

    /** @var string datetime */
    const TYPE_DATETIME = 'datetime';

    /** @var string bool */
    const TYPE_BOOL = 'bool';

    /** @var string file */
    const TYPE_FILE = 'file';

    /** @var string telephone */
    const TYPE_TELEPHONE = 'telephone';

    /** @var string tel */
    const TYPE_TEL = 'tel';

    /** @var string year */
    const TYPE_YEAR = 'year';

    /** @var string month */
    const TYPE_MONTH = 'month';

    /** @var string day */
    const TYPE_DAY = 'day';

    /** @var string email */
    const TYPE_EMAIL = 'email';

    /** @var string[] 数値系要素 */
    public static $NUMERICALS = [
        self::TYPE_INT,
        self::TYPE_FLOAT,
        self::TYPE_NUMERIC,
    ];
}
