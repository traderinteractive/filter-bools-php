<?php

namespace TraderInteractive\Filter;

use TraderInteractive\Exceptions\FilterException;

/**
 * A collection of filters for booleans.
 */
final class Booleans
{
    /**
     * Filters $value to a boolean strictly.
     *
     * $value must be a bool or 'true' or 'false' disregarding case and whitespace.
     *
     * The return value is the bool, as expected by the \TraderInteractive\Filterer class.
     *
     * @param mixed $value       the value to filter to a boolean
     * @param bool  $allowNull   Set to true if NULL values are allowed. The filtered result of a NULL value is
     *                           NULL
     * @param array $trueValues  Array of values which represent the boolean true value. Values should be lower
     *                           cased
     * @param array $falseValues Array of values which represent the boolean false value. Values should be lower
     *                           cased
     *
     * @return bool|null the filtered $value
     *
     * @throws FilterException
     */
    public static function filter(
        $value,
        bool $allowNull = false,
        array $trueValues = ['true'],
        array $falseValues = ['false']
    ) {
        if (self::valueIsNullAndValid($allowNull, $value)) {
            return null;
        }

        if (is_bool($value)) {
            return $value;
        }

        self::validateAsString($value);

        $value = trim($value);
        $value = strtolower($value);

        return self::validateTrueValuesArray($value, $trueValues, $falseValues);
    }

    /**
     * Filters the boolean $value to the given $true and $false cases
     *
     * @param boolean $value The boolean value to convert.
     * @param mixed   $true  The value to return on the true case.
     * @param mixed   $false The value to return on the false case.
     *
     * @return mixed
     */
    public static function convert(bool $value, $true = 'true', $false = 'false')
    {
        return $value ? $true : $false;
    }

    private static function valueIsNullAndValid(bool $allowNull, $value = null) : bool
    {
        if ($allowNull === false && $value === null) {
            throw new FilterException('Value failed filtering, $allowNull is set to false');
        }
        return $allowNull === true && $value === null;
    }

    /**
     * @param $value
     *
     * @throws FilterException
     */
    private static function validateAsString($value)
    {
        if (!is_string($value)) {
            throw new FilterException('"' . var_export($value, true) . '" $value is not a string');
        }
    }

    private static function validateTrueValuesArray($value, array $trueValues, array $falseValues) : bool
    {
        if (in_array($value, $trueValues, true)) {
            return true;
        }

        if (in_array($value, $falseValues, true)) {
            return false;
        }

        throw new FilterException(
            sprintf(
                "%s is not '%s' disregarding case and whitespace",
                $value,
                implode("' or '", array_merge($trueValues, $falseValues))
            )
        );
    }
}
