<?php

namespace Zakjakub\ChemieZijeTheme\Post;

use Timber\Post;

class MapCompanyPost extends Post
{
    final public function activities(): array
    {
        return carbon_get_the_post_meta('_activities') ?? [];
    }
}
