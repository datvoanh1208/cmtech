<?php

namespace App;
use Ghanem\Rating\Contracts\Ratingable;
use Ghanem\Rating\Traits\Ratingable as Rating;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Rating
{
    use Rating;
}