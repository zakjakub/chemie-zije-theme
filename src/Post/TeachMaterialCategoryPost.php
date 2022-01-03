<?php

namespace Zakjakub\ChemieZijeTheme\Post;

use Timber\Post;

class TeachMaterialCategoryPost extends Post
{
    final public function tabThumbnail(string $slug): mixed
    {
        $thumbnails = $this->tabThumbnails();
        $images = array_filter(
            $thumbnails,
            static function (array $tabThumbnail) use ($slug) {
                return $tabThumbnail['tab_slug'] === $slug;
            },
            ARRAY_FILTER_USE_BOTH,
        );

        error_log(var_export($images, true));

        $image = $images[0] ?? false;

        return false !== $image ? ($image['tab_thumbnail'] ?? null) : null;
    }

    final public function tabThumbnails(): array
    {
        return carbon_get_the_post_meta('tab_thumbnails') ?? [];
    }
}
