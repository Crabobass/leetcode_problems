<?php

/**
 * easy
 * 20. Valid Parentheses
 *
 * Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.
 *
 * Example 1:
 * Input: s = "()"
 * Output: true
 *
 * Example 2:
 * Input: s = "()[]{}"
 * Output: true
 *
 * Example 3:
 * Input: s = "(]"
 * Output: false
 *
 * @param $s
 * @return bool
 */
function isValid($s)
{
    while ($p != $s) {
        $p = $s;
        $s = str_replace(['()', '[]', '{}'], '', $s);
    }
    return empty($s);
}


$arTests = [
    "(}{)" => false,
    "(){}}{" => false,
    '([{()[]}])' => true,
    '()[]{}' => true,
    ')(][' => false,
];

foreach ($arTests as $test => $value) {
    if (isValid($test) !== $value) {
        echo ' wrong output for: ' . $test;
        die();
    }
}

echo 'success';