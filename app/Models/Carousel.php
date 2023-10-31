<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    function imageProcessing($req)
    {
        $image = $req->file('cimage');
        $imageName = $image->getClientOriginalName();
        $dir = "carousel-image/";
        $image->move($dir, $imageName);
        return $dir . $imageName;
    }

    function createCarousel($data)
    {
        $carousel = new Carousel();
        $carousel->carousel_image = $carousel->imageProcessing($data);
        $carousel->carousel_sd = $data->csd;
        $carousel->save();
    }
}
