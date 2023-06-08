<?php

class Solution
{

    /**
     * @param String $key
     * @param String $message
     * @return String
     */
    public function decodeMessage($key, $message): string
    {
        $alphabet = range('a', 'z');
        $lenK    = strlen($key);
        $map     = [];
        $counter = 0;
        for ($i = 0; $i < $lenK; $i++) {
            if ($key[$i] !== ' ' && !isset($map[$key[$i]])) {
                $map[$key[$i]] = $alphabet[$counter];
                $counter++;
            }
        }

        $lenM = strlen($message);
        for ($i = 0; $i < $lenM; $i++) {
            $message[$i] = ($message[$i] === ' ') ? ' ' : $map[$message[$i]];
        }

        return $message;
    }
}

function test()
{
    $cases = [
        ['input' => ["the quick brown fox jumps over the lazy dog", "vkbs bs t suepuv"], 'output' => "this is a secret"],
        ['input' => ["eljuxhpwnyrdgtqkviszcfmabo", "zwx hnfx lqantp mnoeius ycgk vcnjrdb"], 'output' => "the five boxing wizards jump quickly"],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->decodeMessage($case['input'][0], $case['input'][1]) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();