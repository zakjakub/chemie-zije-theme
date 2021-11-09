<?php

namespace Zakjakub\ChemieZijeTheme\Post;

use Timber\Post;

class ChemicalIndustryMaterialPost extends Post
{
    final public function references(): array
    {
        return carbon_get_the_post_meta('references') ?? [];
    }
}
