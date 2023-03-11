<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Quest;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteQuestMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteQuest',
        'description' => 'Deletes a quest',
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
                'type' => Type::nonNull(Type::int()),
                'rules' => ['exists:quests'],
            ],
        ];
    }

    public function resolve($root, $args): bool
    {
        $category = Quest::findOrFail($args['id']);

        return (bool)$category->delete();
    }
}
