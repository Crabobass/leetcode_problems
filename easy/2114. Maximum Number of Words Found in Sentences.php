<?php

class Solution {

    /**
     * @param String[] $sentences
     * @return Integer
     */
    function mostWordsFound($sentences) {
        $maxWords = 0;
        foreach($sentences as $sentence){
            $countWords = count(explode(' ', trim($sentence)));
            if ($countWords > $maxWords){
                $maxWords = $countWords;
            }
        }
        return $maxWords;
    }
}