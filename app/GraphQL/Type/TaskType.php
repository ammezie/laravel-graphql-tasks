<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class TaskType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Task',
        'description' => 'A task'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of a task'
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'The title of a task'
            ],
            'is_completed' => [
                'type' => Type::nonNull(Type::boolean()),
                'description' => 'The status of a task'
            ],
        ];
    }
}
