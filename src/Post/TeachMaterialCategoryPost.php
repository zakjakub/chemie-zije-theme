<?php

namespace Zakjakub\ChemieZijeTheme\Post;

use Timber\Post;

class TeachMaterialCategoryPost extends Post
{
    final public function tabThumbnail(string $slug): mixed
    {
        $thumbnails = $this->tabThumbnails();
        error_log('ALL: ');
        error_log($thumbnails);
        $imageKey = array_search(
            static fn(array $tabThumbnail) => $tabThumbnail['tab_slug'] === $slug,
            $thumbnails,
            true,
        );

        return false !== $imageKey ? ($thumbnails[$imageKey] ?? null) : null;
    }

    final public function tabThumbnails(): array
    {
        return carbon_get_the_post_meta('tab_thumbnails') ?? [];
    }
}
