<?php

class Solution
{
    /**
     * @param String $sentence
     * @return String
     */
    function toGoatLatin(string $sentence): string
    {
        $w = explode(' ', $sentence);
        $m = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
        foreach ($w as $i => $item) {
            if (in_array($item[0], $m)) {
                $w[$i] .= 'ma' . str_repeat('a', $i+1);
            } else {
                $f     = $item[0];
                $w[$i] = substr($item, 1) . $f . 'ma' . str_repeat('a', $i+1);
            }
        }
        return implode(' ', $w);
    }
}

function test()
{
    $cases = [
        ['input' => "I speak Goat Latin", 'output' => "Imaa peaksmaaa oatGmaaaa atinLmaaaaa"],
        ['input' => "The quick brown fox jumped over the lazy dog", 'output' => "heTmaa uickqmaaa rownbmaaaa oxfmaaaaa umpedjmaaaaaa overmaaaaaaa hetmaaaaaaaa azylmaaaaaaaaa ogdmaaaaaaaaaa"],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $res = (new Solution)->toGoatLatin($case['input']);
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
        echo ' ['.$res.']';
        echo ' ' . $time . "\r\n";
    }
}

test();