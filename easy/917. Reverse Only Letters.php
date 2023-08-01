<?php

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    public function reverseOnlyLetters(string $s): string
    {
        $left              = 0;
        $right             = -1;
        $lettersCount = $this->lettersCount($s);
        $permutationsCount = (int)floor($lettersCount / 2);
        $permutations      = 0;
        if ($lettersCount === 0 || $lettersCount === 1)
            return $s;

        while ($permutations !== $permutationsCount) {
            if (!$this->isLetter($s[$left])) {
                $left++;
            }
            if (!$this->isLetter($s[$right])) {
                $right--;
            }
            if ($this->isLetter($s[$left]) && $this->isLetter($s[$right])) {
                $tmp       = $s[$left];
                $s[$left]  = $s[$right];
                $s[$right] = $tmp;
                $left++;
                $right--;
                $permutations++;
            }
        }
        return $s;
    }

    public function lettersCount($s)
    {
        $res = 0;
        $s   = str_split($s);
        foreach ($s as $item) {
            if ($this->isLetter($item)) {
                $res++;
            }
        }
        return $res;
    }

    public function isLetter($sym)
    {
        return ctype_alpha($sym);
    }
}

function test()
{
    $cases = [
        ['input' => '7_28]', 'output' => "7_28]"],
        ['input' => 'ab-cd', 'output' => "dc-ba"],
        ['input' => "a-bC-dEf-ghIj", 'output' => "j-Ih-gfE-dCba"],
        ['input' => "Test1ng-Leet=code-Q!", 'output' => "Qedo1ct-eeLg=ntse-T!"],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->reverseOnlyLetters($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();