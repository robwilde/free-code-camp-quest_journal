<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UpdateCategoryMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateCategory',
        'description' => 'Updates a category',
    ];

    public function type(): Type
    {
        return GraphQL::type('Category');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
            ],
            'title' => [
                'name' => 'title',
                'type' => Type::nonNull(Type::string()),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $category = Category::findOrFail($args['id']);
        $category->fill($args);
        $category->save();

        return $category;
    }
}
