<?php

namespace Zakjakub\ChemieZijeTheme\Post;

use Timber\Post;

class MapCompanyPost extends Post
{
    final public function documents(): array
    {
        return carbon_get_the_post_meta('documents') ?? [];
    }

    final public function locations(): array
    {
        return carbon_get_the_post_meta('locations') ?? [];
    }

    final public function activities(): array
    {
        return carbon_get_the_post_meta('activities') ?? [];
    }
}
