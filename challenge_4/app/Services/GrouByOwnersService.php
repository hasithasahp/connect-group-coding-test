<?php

namespace App\Services;

class GroupByOwnersService {
    public function groupByOwners(array $data): array
    {
        if(!$this->isAssociativeArray($data))
            return [];

        $result = array();

        foreach ($data as $key => $value) {
            if(array_search($value, $result)) continue;
            $result[$value] = array_keys($data, $value);
        }

        return $result;
    }

    private function isAssociativeArray(array $arr): bool
    {
        if(array() == $arr) return false;

        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}