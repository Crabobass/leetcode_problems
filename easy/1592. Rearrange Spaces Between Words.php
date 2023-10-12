<?php

class Solution
{
    /**
     * @param String $text
     * @return String
     */
    public function reorderSpaces(string $text): string
    {
        $l      = strlen($text);
        $spaces = 0;
        $words  = [];
        $tmp    = '';
        for ($i = 0; $i < $l; $i++) {
            if ($text[$i] === ' ') {
                if (!empty($tmp)) {
                    $words[] = $tmp;
                }
                $spaces++;
                $tmp = '';
            } else {
                $tmp .= $text[$i];
            }
        }
        if (!empty($tmp)) {
            $words[] = $tmp;
        }
        if ($spaces === 0) {
            return $text;
        }
        if (count($words) === 1) {
            return $words[0] . str_repeat(' ', $spaces);
        }
        $wordsCount    = count($words);
        $spacesBetween = intdiv($spaces, $wordsCount - 1);
        $spacesLast    = $spaces - ($spacesBetween * ($wordsCount - 1));
        $res           = implode(str_repeat(' ', $spacesBetween), $words);
        $res           .= str_repeat(' ', $spacesLast);

        return $res;
    }

    /**
     * @param String $text
     * @return String
     */
    public function reorderSpaces2(string $text): string
    {
        $spaces     = substr_count($text, ' ');
        $words      = array_filter(explode(' ', $text));
        $wordsCount = count($words);

        if ($wordsCount > 1) {
            return implode(str_repeat(' ', $spaces / ($wordsCount - 1)), $words) . str_repeat(' ', $spaces % ($wordsCount - 1));
        }

        return trim($text) . str_repeat(' ', $spaces);
    }
}

function test()
{
    $cases = [
        ['input' => 'hello   world', 'output' => 'hello   world'],
        ['input' => '  hello', 'output' => 'hello  '],
        ['input' => '  this   is  a sentence ', 'output' => 'this   is   a   sentence'],
        ['input' => ' practice   makes   perfect', 'output' => 'practice   makes   perfect '],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->reorderSpaces2($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();