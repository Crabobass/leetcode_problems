<?php

class Solution
{
    /**
     * @param String[] $emails
     * @return Integer
     */
    public function numUniqueEmails(array $emails): int
    {
        $res = [];
        foreach ($emails as $email) {
            [$local, $domain] = explode('@', $email);
            $p = mb_stripos($local, '+');
            if ($p !== false) {
                $localClean = str_replace('.', '', substr($local, 0, $p));
            } else {
                $localClean = str_replace('.', '', $local);
            }
            $res[$localClean . '@' . $domain] = 1;
        }
        return count($res);
    }
}

function test()
{
    $cases = [
        ['input' => ["fg.r.u.uzj+o.pw@kziczvh.com","fg.r.u.uzj+o.f.d@kziczvh.com","fg.r.u.uzj+lp.k@kziczvh.com","r.cyo.g+d.h+b.ja@tgsg.z.com","r.cyo.g+ng.r.iq@tgsg.z.com","r.cyo.g+n.h.e+n.g@tgsg.z.com","fg.r.u.uzj+k+p.j@kziczvh.com","fg.r.u.uzj+w.y+b@kziczvh.com","r.cyo.g+x+d.c+f.t@tgsg.z.com","r.cyo.g+x+t.y.l.i@tgsg.z.com","r.cyo.g+brxxi@tgsg.z.com","r.cyo.g+z+dr.k.u@tgsg.z.com","r.cyo.g+d+l.c.n+g@tgsg.z.com","fg.r.u.uzj+vq.o@kziczvh.com","fg.r.u.uzj+uzq@kziczvh.com","fg.r.u.uzj+mvz@kziczvh.com","fg.r.u.uzj+taj@kziczvh.com","fg.r.u.uzj+fek@kziczvh.com"], 'output' => 2],
        ['input' => ["test.email+alex@leetcode.com", "test.email@leetcode.com"], 'output' => 1],
        ['input' => ["a@leetcode.com", "b@leetcode.com", "c@leetcode.com"], 'output' => 3],
        ['input' => ["test.email+alex@leetcode.com", "test.e.mail+bob.cathy@leetcode.com", "testemail+david@lee.tcode.com"], 'output' => 2],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->numUniqueEmails($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();