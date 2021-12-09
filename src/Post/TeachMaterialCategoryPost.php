<?php

namespace Zakjakub\ChemieZijeTheme\Post;

use Timber\Post;

class TeachMaterialCategoryPost extends Post
{
    final public function tabThumbnail(string $slug): mixed
    {
        $thumbnails = $this->tabThumbnails();
//        error_log('ALL: ');
//        error_log(var_export($thumbnails, true));
        $imageKeys = array_filter(
            $thumbnails,
            static fn(array $tabThumbnail) => $tabThumbnail['tab_slug'] === $slug,
            ARRAY_FILTER_USE_BOTH,
        );
        error_log($imageKeys);
        return;

        $imageKey = $imageKeys[0] ?? false;
        error_log("KEY for $slug: '$imageKey'");

        return false !== $imageKey ? ($thumbnails[$imageKey] ?? null) : null;
    }

    final public function tabThumbnails(): array
    {
        return carbon_get_the_post_meta('tab_thumbnails') ?? [];
    }
}
