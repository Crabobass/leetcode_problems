<?php

class Solution
{

    /**
     * @param array $digits
     * @return array
     */
    static function plusOne(array $digits): array
    {
        $lenDigits = count($digits) - 1;
        $digits[$lenDigits]++;

        if ($digits[$lenDigits] == 10) {
            if ($lenDigits == 0){
                return [1, 0];
            }

            for ($i = $lenDigits; $i >= 0; $i--) {
                if ($digits[$i] == 10){
                    $digits[$i] = 0;
                    // last check
                    if ($i == 0){
                        array_unshift($digits, 1);
                    }else{
                        $digits[$i-1]++;
                    }
                }else{
                    return $digits;
                }
            }
        } else {
            return $digits;
        }

        return $digits;
    }
}

// tests
$arTests = [
    ['test' => [1, 2, 3], 'result' => [1, 2, 4]],
    ['test' => [4, 3, 2, 1], 'result' => [4, 3, 2, 2]],
    ['test' => [9], 'result' => [1, 0]],
    ['test' => [9,9], 'result' => [1, 0, 0]],
];

foreach ($arTests as $testCase) {
    $result = Solution::plusOne($testCase['test']);
    if ($result !== $testCase['result']) {
        print_r($testCase['test']);
        print_r(Solution::plusOne($testCase['test']));
        var_dump($result);
        die();
    }
}

echo 'success';