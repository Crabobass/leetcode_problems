<?php

class Solution
{
    public $vowels = ['a' => 1, 'e' => 1, 'i' => 1, 'o' => 1, 'u' => 1];

    /**
     * @param String $word
     * @return Integer
     */
    public function countVowelSubstrings(string $word): int
    {
        $l          = strlen($word);
        $substrings = [];
        $tmp        = '';
        $counter    = 0;
        $res        = 0;

        for ($i = 0; $i < $l; $i++) {
            if (isset($this->vowels[$word[$i]])) {
                $counter++;
                $tmp .= $word[$i];
            } else {
                if ($counter >= 5) {
                    $substrings[] = $tmp;
                }
                $counter = 0;
                $tmp     = '';
            }
        }
        if (!empty($tmp)) {
            $substrings[] = $tmp;
        }

        foreach ($substrings as $substring) {
            $res += $this->countStr($substring);
        }

        return $res;
    }

    private function countStr($s): int
    {
        $l      = strlen($s);
        $icount = $l - 5;
        $res    = 0;
        for ($i = 0; $i <= $icount; $i++) {
            $tmpVowels    = $this->vowels;
            $tmpString    = substr($s, $i, $l - $i);
            $tmpStringLen = strlen($tmpString);
            $tmpMinLen    = 0;
            for ($j = 0; $j < $l; $j++) {
                if (isset($tmpVowels[$tmpString[$j]])) {
                    unset($tmpVowels[$tmpString[$j]]);
                }
                if (empty($tmpVowels)) {
                    $tmpMinLen = $j;
                    break;
                }
            }
            if ($tmpMinLen >= 4) {
                $res += $tmpStringLen - $tmpMinLen;
            }
        }

        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => 'aeiouu', 'output' => 2],
        ['input' => 'unicornarihan', 'output' => 0],
        ['input' => 'cuaieuouac', 'output' => 7],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->countVowelSubstrings($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();