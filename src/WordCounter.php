<?php

declare(strict_types=1);

namespace ESBobkov\WordCounter;

final class WordCounter
{
    /**
     * @param string $text
     * @param int $topCount
     *
     * @param bool $ignoreCase
     * @return array<string, int>
     */
    public function getTopWords(string $text, int $topCount, bool $ignoreCase): array
    {
        $words = \preg_split( '/\s+/', $text);
        if($ignoreCase) {
            $words = \array_map('mb_strtolower', $words);
        }
        $wordCounts = \array_count_values($words);
        \arsort($wordCounts);

        return \array_slice($wordCounts, 0, $topCount);
    }
}