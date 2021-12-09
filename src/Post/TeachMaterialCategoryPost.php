<?php

namespace Zakjakub\ChemieZijeTheme\Post;

use Timber\Post;

class TeachMaterialCategoryPost extends Post
{
    final public function tabThumbnail(string $slug): mixed
    {
        $thumbnails = $this->tabThumbnails();
        $image = array_filter(
            $thumbnails,
            static fn(array $tabThumbnail) => $tabThumbnail['tab_slug'] === $slug,
            ARRAY_FILTER_USE_BOTH,
        )[0] ?? false;

        $result =  false !== $image ? ($image['tab_thumbnail'] ?? null) : null;

        error_log('RESULT: ');
        error_log($result);

        return $result;
    }

    final public function tabThumbnails(): array
    {
        return carbon_get_the_post_meta('tab_thumbnails') ?? [];
    }
}
