<?php

namespace Harman\FilamentNavSort;

use Cache;

trait HasNavSort
{
    public static function getNavigationSort(): ?int
    {
        $collection = Cache::store('array')
            ->remember('nav_sort_cases_collection', 10, function () {
                $enumClass = config('filament-nav-sort-config.enum.0') ?? false;
                if (empty($enumClass)) {
                    return false;
                }
                $collectionOfCases = collect($enumClass::cases())->pluck('name');
                return $collectionOfCases->isEmpty() ? false : $collectionOfCases;
            });

        if (!$collection) {
            return null;
        }

        $result = $collection->search(class_basename(static::class));
        /*if class name is not found in enum cases, return null*/
        return $result === false ? null : $result + 1;
    }
}
