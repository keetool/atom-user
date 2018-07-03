<?php
namespace App\Repositories;

use App\Image;

class ImageRepository extends Repository implements ImageRepositoryInterface {

    public function __construct(){
        parent::__construct(new Image());
    }

}
