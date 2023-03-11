<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Closure;
use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateCategoryMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createCategory',
        'description' => 'Creates a category',
    ];

    public function type(): Type
    {
        return GraphQL::type('Category');
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields): Category
    {
        $category = new Category();
        $category->fill($args);
        $category->save();

        return $category;
    }

    public function args(): array
    {
        return [
            'title' => [
                'name' => 'title',
                'type' => Type::nonNull(Type::string()),
            ],
        ];
    }
}
