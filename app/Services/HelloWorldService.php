<?php

namespace App\Services;

class HelloWorldService
{
    public static function generate(int $n): array
    {
        $result = [];

        for ($i = 1; $i <= $n; $i++) {
            if ($i % 4 === 0 && $i % 5 === 0) {
                $result[] = 'helloworld';
            } elseif ($i % 4 === 0) {
                $result[] = 'hello';
            } elseif ($i % 5 === 0) {
                $result[] = 'world';
            } else {
                $result[] = $i;
            }
        }

        return $result;
    }
}
