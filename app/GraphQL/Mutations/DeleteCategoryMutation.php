<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteCategoryMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteCategory',
        'description' => 'deletes a category',
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required'],
            ],
        ];
    }

    public function resolve($root, $args): bool
    {
        $category = Category::findOrFail($args['id']);

        return (bool)$category->delete();
    }
}
