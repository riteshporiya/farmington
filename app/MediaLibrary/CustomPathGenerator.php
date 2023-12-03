<?php

namespace App\MediaLibrary;

use App\Models\Garden;
use App\Models\GardenTypes;
use App\Models\Plant;
use App\Models\PlantType;
use App\Models\PlantUse;
use App\Models\Post;
use App\Models\Scheme;
use App\Models\Seed;
use App\Models\SeedType;
use App\Models\Testimonial;
use App\Models\User;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\PathGenerator\PathGenerator;

/**
 * Class CustomPathGenerator
 * @package App\MediaLibrary
 */
class CustomPathGenerator implements PathGenerator
{
    /**
     * @param  Media  $media
     *
     * @return string
     */
    public function getPath(Media $media): string
    {
        $path = '{PARENT_DIR}'.DIRECTORY_SEPARATOR.$media->id.DIRECTORY_SEPARATOR;

        switch ($media->collection_name) {
            case User::PROFILE:
                return str_replace('{PARENT_DIR}', User::PROFILE, $path);
            case User::PATH:
                return str_replace('{PARENT_DIR}', User::PATH, $path);
            case Plant::PATH:
                return str_replace('{PARENT_DIR}', Plant::PATH, $path);
            case Seed::PATH:
                return str_replace('{PARENT_DIR}', Seed::PATH, $path);
            case Garden::PATH:
                return str_replace('{PARENT_DIR}', Garden::PATH, $path);
            case Post::PATH:
                return str_replace('{PARENT_DIR}',  Post::PATH, $path);
            case Testimonial::PATH:
                return str_replace('{PARENT_DIR}',  Testimonial::PATH, $path);
            case Scheme::PATH:
                return str_replace('{PARENT_DIR}',  Scheme::PATH, $path);
            case PlantType::PATH:
                return str_replace('{PARENT_DIR}',  PlantType::PATH, $path);
            case PlantUse::PATH:
                return str_replace('{PARENT_DIR}',  PlantUse::PATH, $path);
            case SeedType::PATH:
                return str_replace('{PARENT_DIR}',  SeedType::PATH, $path);
            case GardenTypes::PATH:
                return str_replace('{PARENT_DIR}',  GardenTypes::PATH, $path);
            case 'default' :
                return '';
        }
    }

    /**
     * @param  Media  $media
     *
     * @return string
     */
    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media).'thumbnails/';
    }

    /**
     * @param  Media  $media
     *
     * @return string
     */
    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media).'rs-images/';
    }
}
