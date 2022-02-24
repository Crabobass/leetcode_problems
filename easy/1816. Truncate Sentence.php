<?php

class Solution
{

    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function truncateSentence2($s, $k): string
    {
        $strLen = strlen($s);
        $result = '';
        $tmpWord = '';
        $counter = 0;
        for ($i = 0; $i <= $strLen; $i++) {
            if ($s[$i] == ' ' || $i == $strLen) {
                $result .= ($counter == 0) ? $tmpWord : ' ' . $tmpWord;
                $tmpWord = '';
                $counter++;

                if ($counter == $k)
                    break;
            } else {
                $tmpWord .= $s[$i];
            }
        }

        return $result;
    }

    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function truncateSentence($s, $k): string
    {
        return implode(' ', array_slice(explode(' ', $s), 0, $k));
    }
}