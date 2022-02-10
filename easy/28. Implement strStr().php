<?php

class Solution
{
    /**
     * @param string $haystack
     * @param string $needle
     * @return int
     */
    static function strStr(string $haystack, string $needle): int
    {
        $result = -1;

        $lenHaystack = strlen($haystack) - 1;
        $lenNeedle = strlen($needle) - 1;

        if ($lenHaystack < $lenNeedle) {
            return -1;
        }

        if ($lenNeedle == -1) {
            return 0;
        }

        for ($i = 0; $i <= $lenHaystack; $i++) {
            if ($haystack[$i] == $needle[0] && $needle[$lenNeedle] == $haystack[$i + $lenNeedle]) {
                $tmp = 0;
                for ($j = 0; $j <= $lenNeedle; $j++) {
                    if ($haystack[$i + $tmp] == $needle[$j]) {
                        $result = $i;
                        $tmp++;
                    } else {
                        $result = -1;
                        break;
                    }

                    if ($j == $lenNeedle && $result !== -1){
                        return $result;
                    }
                }
            }
        }

        return $result;
    }
}


// tests
$arTests = [
    ['test' => ['hello', 'll'], 'result' => 2],
    ['test' => ['ABCDEFG', 'DEF'], 'result' => 3],
    ['test' => ['aaaaa', 'bba'], 'result' => -1],
    ['test' => ['', ''], 'result' => 0],
    ['test' => ['aaa', 'aa'], 'result' => 0],
    ['test' => ['aaaa', 'aaab'], 'result' => -1],
    ['test' => ['mississippi', 'issip'], 'result' => 4],
    ['test' => ['mississippi', 'pi'], 'result' => 9],
    ['test' => ['mississippi', 'issipi'], 'result' => -1],
    ['test' => ['mississippi', 'issipi'], 'result' => -1],
    ['test' => ['aabaaabaaac', 'aabaaac'], 'result' => 4],
    ['test' => ['aabaaabaaac', 'aabaaac'], 'result' => 4],
    ['test' => ['mississippi', 'issipi'], 'result' => -1],
];

foreach ($arTests as $testCase) {
    if ($testCase['run'] !== false) {
        $result = Solution::strStr($testCase['test'][0], $testCase['test'][1]);
        if ($result !== $testCase['result']) {
            Solution::strStr($testCase['test'][0], $testCase['test'][1]);
            print_r($testCase['test']);
            var_dump($result);
            die();
        }
    }
}

echo 'success';