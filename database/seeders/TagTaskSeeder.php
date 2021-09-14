<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\TagTask;
use App\Models\Task;
use Illuminate\Database\Seeder;

class TagTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = Task::get();

        foreach ($tasks as $task) {
            $tag = Tag::all()->random();
            TagTask::firstOrCreate([
                'task_id' => $task->id,
                'tag_id' => $tag->id
            ]);
        }
    }
}
