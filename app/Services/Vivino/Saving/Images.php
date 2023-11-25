<?php

namespace App\Services\Vivino\Saving;

use Intervention\Image\Facades\Image;


class Images
{

    public static function save($httpPath): ?string
    {
        $localPath = self::localPath($httpPath);
        $path = $localPath ? '/vivino/' . $localPath : null;
        $content = self::getContent($httpPath);
        if ($content && $localPath && $path) {
            \Storage::disk('public')->put($path, $content);
        }
        return $path;
    }

    public static function localPath($httpPath): ?string
    {
        return explode('images.vivino.com/', $httpPath)[1] ?? null;
    }

    public static function getContent($httpPath): bool|string
    {
        for ($item = 1; $item <= 3; $item++) {
            $content = self::attempt($httpPath);
            if ($content) {
                break;
            }
        }

        return $content;
    }

    public static function attempt($httpPath): bool|string
    {
        try {
            return file_get_contents('https:' . $httpPath);
        } catch (\Exception $e) {
            \Log::info(self::class . '  -- ' . $e->getMessage());
            return false;
        }
    }
}
