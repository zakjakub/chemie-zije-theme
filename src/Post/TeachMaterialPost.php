<?php

namespace Zakjakub\ChemieZijeTheme\Post;

use Timber\Post;

class TeachMaterialPost extends Post
{
    final public function documents(): array
    {
        return carbon_get_the_post_meta('documents') ?? [];
    }
}
