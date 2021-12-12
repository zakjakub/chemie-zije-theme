<?php

namespace Zakjakub\ChemieZijeTheme\Post;

use Timber\Post;

class TeachMaterialPost extends Post
{
    final public function documents(): array
    {
        return array_merge(
            $this->presentations(),
            $this->handouts(),
        );
    }

    final public function presentations(): array
    {
        return carbon_get_the_post_meta('presentations') ?? [];
    }

    final public function handouts(): array
    {
        return carbon_get_the_post_meta('handouts') ?? [];
    }

    final public function safetySymbols(): array
    {
        return carbon_get_the_post_meta('safety_symbols') ?? [];
    }

    final public function difficultySymbols(): array
    {
        return carbon_get_the_post_meta('difficulty_symbols') ?? [];
    }

    final public function tabs(): array
    {
        return carbon_get_the_post_meta('tabs') ?? [];
    }
}
