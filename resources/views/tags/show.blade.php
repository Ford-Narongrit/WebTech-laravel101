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
        <table class="w-full shadow-lg">
            <thead>
                <tr class="text-md font-semibold text-left text-gray-900 bg-gray-300 uppercase border-b border">
                    <th class="px-4 py-3">หัวข้องาน</th>
                    <th class="px-4 py-3">วันสิ้นสุด</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tag->tasks as $task)
                    <tr>
                        <td class="px-4 py-3 border">
                            @if ($task->is_urgent)
                                <span></span>
                            @endif
                            <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="hover:underline">
                                {{ $task->title }}
                            </a>
                        </td>
                        <td class="px-4 py-3 border @if ($task->is_past) text-gray-300 @endif">
                            {{ $task->due_date->format('j M y') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
