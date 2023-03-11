<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Illuminate\Database\Eloquent\Collection;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CategoriesQuery extends Query
{
    protected $attributes = [
        'name' => 'categories',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Category'));
    }

    public function resolve($root, $args): Collection
    {
        return Category::all();
    }
}
