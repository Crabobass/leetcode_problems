<?php

class Solution
{
    /**
     * @param Integer[] $arr
     * @return Integer
     */
    static function sumOddLengthSubarrays($arr)
    {
        $result = 0;
        $n = count($arr);
        $step = 1;

        while ($step <= $n) {
            $lim = $n - $step + 1;
            for ($i = 0; $i < $lim; $i++) {
                if ($step == 1) {
                    $result += $arr[$i];
                } else {
                    for ($j = $i; $j < $step + $i; $j++) {
                        $result += $arr[$j];
                    }
                }
                if (($i + 1 == $n && $step == 1) || ($i == $lim - 1))
                    $step += 2;
            }
        }

        return $result;
    }
}

// tests
$arTests = [
    ['test' => [[1, 4, 2, 5, 3]], 'result' => 58],
    ['test' => [[1, 2]], 'result' => 3],
    ['test' => [[10, 11, 12]], 'result' => 66],
];

foreach ($arTests as $testCase) {
    $result = Solution::sumOddLengthSubarrays($testCase['test'][0]);
    if ($result !== $testCase['result']) {
        print_r(Solution::sumOddLengthSubarrays($testCase['test'][0]));
        var_dump($result);
        die();
    }
}

echo 'success';