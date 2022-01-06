<?php

class Greedy
{
    private $languages = ['en', 'ar', 'es', 'jp', 'de', 'pr', 'ch', 'kr'];
    private $suitable_one = null;
    private $competitors = [];
    private $languages_covered = [];

    public function __construct()
    {
        $this->competitors['first'] = ['en', 'ar', 'es'];
        $this->competitors['second'] = ['es', 'jp'];
        $this->competitors['third'] = ['jp', 'de', 'pr', 'an'];
        $this->competitors['fourth'] = ['de', 'pr', 'ch', 'kr'];
        $this->competitors['fifth'] = ['de', 'pr', 'ch'];
    }

    public function search()
    {
        foreach ($this->competitors as $competitor => $his_languages) {
            $covered = [];
            $covered = array_intersect($his_languages, $this->languages);
            if (count($covered) > count($this->languages_covered)) {
                $this->languages_covered = $covered;
                $this->suitable_one = $competitor;
            }
        }

        return $this->suitable_one;
    }
}

$testing = new Greedy();

echo $testing->search();
