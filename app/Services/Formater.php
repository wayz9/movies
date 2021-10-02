<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class Formater
{
    public function format(Collection $data): Collection
    {
        return $data
            ->sortByDesc('vote_average')
            ->map(function($item) {
                return collect($item)->merge([
                    'release_date' => $this->date($item['release_date'] ?? $item['first_air_date']),
                    'vote_average' => $this->roundAndCalc($item['vote_average']),
                    'poster' => $this->image($item['poster_path']),
                    'backdrop' => $this->image($item['backdrop_path']),
                ]);
            });
    }

    public function actor(Collection $data): Collection
    {
        return $data
            ->sortByDesc('popularity')
            ->map(function($actor) {
                return collect($actor)->merge([
                    'gender' => $this->gender($actor['gender']),
                    'picture' => $this->image($actor['profile_path']),
                    'known_for' => $this->flatAndImplode($actor['known_for'])
                ]);
            });
    }

    public function flatAndImplode(array $arr): string
    {
        return collect($arr)->pluck('title')->implode(', ');
    }

    public function gender(int $gender): string
    {
        switch ($gender) {
            case 1:
                return 'Female';
                break;

            case 2:
                return 'Male';
                break;

            default:
                return 'Not Specified';
                break;
        }
    }

    public function image($file): string
    {
        return "https://image.tmdb.org/t/p/w780{$file}";
    }

    public function date($date): Carbon
    {
        return Carbon::parse($date);
    }

    public function roundAndCalc(int $val): int
    {
        return intval(round($val)) * 10;
    }
}
