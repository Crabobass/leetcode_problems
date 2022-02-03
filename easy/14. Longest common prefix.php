<?php

/**
 * easy
 * 14. Longest Common Prefix
 * @see https://leetcode.com/problems/longest-common-prefix/
 *
 * Example 1:
 * Input: strs = ["flower","flow","flight"]
 * Output: "fl"
 *
 * Example 2:
 * Input: strs = ["dog","racecar","car"]
 * Output: ""
 * Explanation: There is no common prefix among the input strings.
 */

// horizontal scan
function longestCommonPrefix($strs)
{
    $mainWord = $strs[0];
    $resLen = strlen($mainWord);

    while (true) {
        foreach ($strs as $i => $nowStr) {
            if ($nowStr == $mainWord) {
                unset($strs[$i]);
                continue;
            }
            while (true) {
                if (substr($nowStr, 0, $resLen) == substr($mainWord, 0, $resLen)) {
                    unset($strs[$i]);
                    break;
                } else {
                    $mainWord = substr($mainWord, 0, -1);
                    $resLen = strlen($mainWord);

                    if ($resLen == 0)
                        return '';
                }
            }
        }

        if (count($strs) == 0)
            return substr($mainWord, 0, $resLen);
    }
}

// vertical scan
function longestCommonPrefix2($strs)
{
    $first = $strs[0];
    $resLen = strlen($strs[0]);
    $result = '';
    for ($i = 0; $i < $resLen; $i++) {
        foreach ($strs as $str) {
            if (empty($str[$i]) || $str[$i] != $first[$i]) {
                return $result;
            }
        }
        $result .= $str[$i];
    }

    return $result;
}