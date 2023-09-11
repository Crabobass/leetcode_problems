<?php

class Solution
{
    /**
     * @param String[] $words
     * @param String $target
     * @param Integer $startIndex
     * @return Integer
     */
    public function closetTarget(array $words, string $target, int $startIndex): int
    {
        if (!in_array($target, $words))
            return -1;

        if ($words[$startIndex] === $target)
            return 0;

        $l = count($words);
        for ($i = 1; $i < $l; $i++) {
            $right = ($startIndex + $i >= $l) ? abs($l - ($startIndex + $i)) : $startIndex + $i;
            $left = ($startIndex - $i < 0) ? $l + ($startIndex - $i) : $startIndex - $i;
            if ($words[$right] === $target || $words[$left] === $target) {
                return $i;
            }
        }
    }
}

function test()
{
    $cases = [
        ['input' => [["hsdqinnoha","mqhskgeqzr","zemkwvqrww","zemkwvqrww","daljcrktje","fghofclnwp","djwdworyka","cxfpybanhd","fghofclnwp","fghofclnwp"], 'zemkwvqrww', 8], 'output' => 4],
        ['input' => [["ibkgecmeyx","jsdkekkjsb","gdjgdtjtrs","jsdkekkjsb","jsdkekkjsb","jsdkekkjsb","gdjgdtjtrs","msjlfpawbx","pbgjhutcwb","gdjgdtjtrs"], 'pbgjhutcwb', 0], 'output' => 2],
        ['input' => [["a", "b", "leetcode"], 'leetcode', 0], 'output' => 1],
        ['input' => [["hello", "i", "am", "leetcode", "hello"], 'hello', 1], 'output' => 1],
        ['input' => [["i", "eat", "leetcode"], 'ate', 0], 'output' => -1],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->closetTarget($case['input'][0], $case['input'][1], $case['input'][2]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();