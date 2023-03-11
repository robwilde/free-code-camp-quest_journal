<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Quest;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type;
use Illuminate\Database\Eloquent\Collection;
use Rebing\GraphQL\Support\Facades\GraphQL;

class QuestsQuery extends Query
{
    protected $attributes = [
        'name' => 'quests',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Quest'));
    }

    public function resolve($root, $args): Collection
    {
        return Quest::all();
    }
}
