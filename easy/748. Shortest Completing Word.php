<?php

class Solution
{
    /**
     * @param String $licensePlate
     * @param String[] $words
     * @return String
     */
    public function shortestCompletingWord(string $licensePlate, array $words): string
    {
        $res = '';
        $licensePlate = strtolower(preg_replace('/[\s\d]+/', '', $licensePlate));
        $licensePlateSym = array_count_values(str_split($licensePlate));
        $min = PHP_INT_MAX;
        foreach ($words as $word) {
            $wordSym = array_count_values(str_split(strtolower($word)));
            foreach ($licensePlateSym as $sym => $count) {
                if (!isset($wordSym[$sym]) || $count > $wordSym[$sym]){
                    continue(2);
                }
            }
            if (strlen($word) < $min){
                $res = $word;
                $min = strlen($word);
            }
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => ['GrC8950', ["measure","other","every","base","according","level","meeting","none","marriage","rest"]], 'output' => 'according'],
        ['input' => ['1s3 PSt', ["step", "steps", "stripe", "stepple"]], 'output' => 'steps'],
        ['input' => ['1s3 456', ["looks", "pest", "stew", "show"]], 'output' => 'pest'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->shortestCompletingWord($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();