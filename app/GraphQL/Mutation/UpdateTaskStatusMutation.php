<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\Task;

class UpdateTaskStatusMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateTaskStatus'
    ];

    public function type()
    {
        return GraphQL::type('Task');
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['required'],
            ],
            'status' => [
                'name' => 'status',
                'type' => Type::nonNull(Type::boolean()),
                'rules' => ['required'],
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $task = Task::find($args['id']);

        if (!$task) {
            return null;
        }

        $task->is_completed = $args['status'];
        $task->save();

        return $task;
    }
}
