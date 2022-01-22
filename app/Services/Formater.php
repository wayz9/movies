<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class Formater
{
    public function format(Collection $data): Collection
    {
        return $data
            ->sortByDesc('vote_average')
            ->map(function($item) {
                return collect($item)->merge([
                    'title' => $item['title'] ?? $item['name'],
                    'release_date' => $this->date($item['release_date'] ?? $item['first_air_date'] ?? ''),
                    'vote_average' => $this->roundAndCalc($item['vote_average']),
                    'poster' => $this->image($item['poster_path']),
                    'backdrop' => $this->image($item['backdrop_path']),
                    'url' => $this->getUrl($item['media_type'] ?? '', $item['id']),
                ]);
            });
    }

    public function actors(Collection $data): Collection
    {
        return $data
            ->sortByDesc('popularity')
            ->map(function($actor) {
                return collect($actor)->merge([
                    'gender' => $this->gender($actor['gender']),
                    'picture' => $this->image($actor['profile_path']),
                    'known_for' => $this->flatAndImplode($actor['known_for']),
                ]);
            });
    }

    public function person(Collection $person): Collection
    {
        return $person->merge([
            'picture' => $this->image($person['profile_path']),
            'gender' => $this->gender($person['gender']),
            'birthday' => $this->date($person['birthday']),
        ]);
    }

    public function media(Collection $item): Collection
    {
        return $item->merge([
            'title' => $item['title'] ?? $item['name'],
            'background' => $this->image($item['backdrop_path'], 'original'),
            'poster' => $this->image($item['poster_path']),
            'release_date' => $this->date($item['release_date'] ?? $item['first_air_date']),
            'budget' => $this->money($item['budget'] ?? NULL),
            'revenue' => $this->money($item['revenue'] ?? NULL),
            'genre' => $this->getGenres($item['genres']),
            'languages' => $this->flatAndImplode($item['spoken_languages']),
            'keywords' => isset($item['keywords']['keywords']) ? collect($item['keywords']['keywords'])->take(5) : '',
            'cast' => $this->getCredits($item['credits']['cast']),
            'crew' => collect($item['credits']['crew'])->take(4),
            'runtime' => $this->convertRuntime($item['runtime']),
            'videos' => $this->video($item['videos']['results']),
            'reviews' => $this->getReviews(collect($item['reviews']['results'])->take(1))
        ])->except('credits');
    }

    public function getCredits(array $arr): Collection
    {
        return collect($arr)
            ->sortByDesc('popularity')
            ->map(function($person) {
                return collect($person)->merge([
                    'picture' => $this->image($person['profile_path']),
                ]);
            })->take(4);

            // *Replace take(4) with more when slider arrives!
    }

    public function money(int|null $value): string
    {
        if(!is_int($value)){
            return '—';
        }

        return '$' . number_format($value, 2);
    }

    public function convertRuntime(int|null $minutes): string
    {
        return Str::runtime($minutes);
    }

    public function getGenres(array $arr): string
    {
        if(empty($arr)){
            return 'No genre found!';
        }

        return collect($arr)->pluck('name')->implode(', ');
    }

    public function getReviews(Collection $reviews): Collection
    {
        return $reviews->map(function($review){
            return collect($review)->merge([
                'created_at' => $this->date($review['created_at']),
                'updated_at' => $this->date($review['created_at']),
                'author_details' => [
                    'name' => $review['author_details']['name'],
                    'username' => $review['author_details']['username'],
                    'avatar' => $this->image($review['author_details']['avatar_path']),
                    'rating' => number_format($review['author_details']['rating'], 1)
                ],
            ]);
        });
    }

    public function video(array $videos): Collection
    {
        return collect($videos)->where('site', 'YouTube')->map(function($video){
            return collect($video)->merge([
                'url' => "https://www.youtube.com/embed/{$video['key']}",
            ]);
        });
    }

    public function flatAndImplode(array $arr): string
    {
        return collect($arr)->map(function($item){
            return [
                'title' => (Arr::has($item, 'title')) ? $item['title'] : $item['name']
            ];
        })->pluck('title')->implode(', ');
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

    public function image($path, $quality = 'w780'): string
    {
        if(Str::contains($path, 'gravatar')){
            return Str::substr($path, 1);
        }

        if(!$path){
            return asset('placeholder/404.png');
        }

        return "https://image.tmdb.org/t/p/{$quality}{$path}";
    }

    public function date(string $date): Carbon
    {
        if($date == ''){
            return now();
        }

        return Carbon::parse($date);
    }

    public function roundAndCalc($val): int
    {
        return round($val * 10);
    }

    public function getUrl($type, $id)
    {
        switch ($type) {
            case 'movie':
                return route('movie.show', $id);
                break;

            default:
            return route('tv.show', $id);
                break;
        }
    }
}
