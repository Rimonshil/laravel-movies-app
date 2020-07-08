<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel
{
    public $popularTv;
    public $topRatedTv;
    public $genres;

    public function __construct($popularTv, $topRatedTv, $genres)
    {
        $this->popularTv = $popularTv;
        $this->topRatedTv = $topRatedTv;
        $this->genres = $genres;
    }

    public function popularTv()
    {
        return $this->formatTv($this->popularTv);

    }

    public function topRatedTv()
    {
        return $this->formatTv($this->topRatedTv);
    }

    public function formatTv($tv)
    {
        return collect($tv)->map(function($show) {
            return collect($show)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w400/'.$show['poster_path'],
                'vote_average' => $show['vote_average'] * 10 .'%',
                'first_air_date' => \Carbon\Carbon::parse($show['first_air_date'])->format('M d, Y')
            ]);
        });

    }

    public function genres()
    {
        return $this->genres;
    }
}
