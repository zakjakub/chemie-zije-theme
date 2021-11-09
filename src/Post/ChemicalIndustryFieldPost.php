<?php

namespace Zakjakub\ChemieZijeTheme\Post;

use Timber\Post;

class ChemicalIndustryFieldPost extends Post
{
    final public function tabs(): array
    {
        return carbon_get_the_post_meta('tabs') ?? [];
    }
}
