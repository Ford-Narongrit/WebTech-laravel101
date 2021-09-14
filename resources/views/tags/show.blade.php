@extends('layouts.main')

@section('content')
    <div class="space-y-5">
        <h2 class="text-2xl font-bold text-gray-900">
            <div class="flex items-center space-x-3">
                <div class="inline-block">
                    Tag:
                </div>
                <div class="bg-gray-300 p-2 rounded-xl">
                    <a href="{{ route('tags.slug', ['slug' => $tag->name]) }}" class="hover:underline">
                        {{ $tag->name }}
                    </a>
                </div>
            </div>
        </h2>
        <table class="shadow-lg mx-auto w-4/5">
            <thead>
                <tr class="text-md font-semibold text-left text-gray-900 bg-gray-300 uppercase border-b border">
                    <th class="px-4 py-3">No.</th>
                    <th class="px-4 py-3">task title</th>
                    <th class="px-4 py-3">tags</th>
                    <th class="px-4 py-3">task detail</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tag->tasks as $task)
                    <tr>
                        <td class="px-4 py-3 border">
                            {{ $loop->index + 1 }}
                        </td>
                        <td class="px-4 py-3 border">
                            <a href="{{ route('tasks.show', ['task' => $task->id]) }}">
                                @if ($task->is_urgent)
                                    <span class="bg-red-400 py-1 px-4 rounded-xl">ด่วน</span>
                                @endif
                                <span class="hover:underline">
                                    {{ $task->title }}
                                </span>
                            </a>
                        </td>
                        <td class="px-4 py-3 border space-x-1">
                            @foreach ($task->tags as $tag)
                                <span class="bg-gray-300 p-2 rounded-xl">
                                    <a href="{{ route('tags.slug', ['slug' => $tag->name]) }}" class="hover:underline">
                                        {{ $tag->name }}
                                    </a>
                                </span>
                            @endforeach
                        </td>
                        <td class="px-4 py-3 border">
                            {{ $task->detail }}
                        </td>
                        <td class="px-4 py-3 border text-center">
                            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
                                class="bg-gray-400 rounded-xl p-2 hover:bg-gray-300 uppercase">EDIT TASK</a>
                            <a href="{{ route('tasks.destroy', ['task' => $task->id]) }}"
                                class="bg-red-400 rounded-xl p-2 hover:bg-red-300 uppercase">delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
