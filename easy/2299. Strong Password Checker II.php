<?php

class Solution
{
    /**
     * @param String $password
     * @return Boolean
     */
    public function strongPasswordCheckerII(string $password): bool
    {
        $l = strlen($password);
        $symUpper = false;
        $symLower = false;
        $symNum = false;
        $symSpec = false;
        $symSpecMap = array_flip(str_split('!@#$%^&*()-+'));
        if ($l < 8){
            return false;
        }
        for ($i = 0; $i < $l; $i++) {
            $sym = $password[$i];
            if ($i > 0 && $sym === $password[$i-1]){
                return false;
            }
            if ($symSpec === false && isset($symSpecMap[$sym])){
                $symSpec = true;
            }
            if ($symUpper === false && ord($sym) >= 65 && ord($sym) <= 90){
                $symUpper = true;
            }
            if ($symLower === false && ord($sym) >= 97 && ord($sym) <= 122){
                $symLower = true;
            }
            if ($symNum === false && ord($sym) >= 48 && ord($sym) <= 57){
                $symNum = true;
            }
        }

        return $symNum && $symLower && $symUpper && $symSpec;
    }
}

function test()
{
    $cases = [
        ['input' => 'XrVIVr-L)CtyZ7xyo!TiHr859lCIHJ$CYHnCQ$kVafJ-15lKjkXLoW5zQnWa3jlGjH9+QKF&^Jvy1$WajBF9VL3^2Okns63LvMZX', 'output' => true],
        ['input' => 'IloveLe3tcode!', 'output' => true],
        ['input' => 'Me+You--IsMyDream', 'output' => false],
        ['input' => '1aB!', 'output' => false],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->strongPasswordCheckerII($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();