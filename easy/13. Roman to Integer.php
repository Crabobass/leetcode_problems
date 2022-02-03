<?php

/**
 * easy
 * 13. Roman to Integer
 * Given a roman numeral, convert it to an integer.
 *
 * @see https://leetcode.com/problems/roman-to-integer/
 * @param string $s
 * @return int
 */
function romanToInt(string $s): int
{
    $res = 0;
    $l = strlen($s);
    $sMap = [
        'IV' => 4,
        'IX' => 9,
        'XL' => 40,
        'XC' => 90,
        'CD' => 400,
        'CM' => 900,
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
    ];
    for ($i = 0; $i < $l; $i++) {
        if (isset($sMap[$s[$i] . $s[$i + 1]])) {
            $res += $sMap[$s[$i] . $s[$i + 1]];
            $i++;
        } else {
            $res += $sMap[$s[$i]];
        }
    }
    return $res;
}

var_dump('III'); // 3
var_dump('LVIII'); // 58
var_dump('MCMXCIV'); // 1994