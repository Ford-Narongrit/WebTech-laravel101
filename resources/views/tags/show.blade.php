@extends('layouts.main')

@section('content')
<h2 class="text-2xl font-bold text-gray-900">
    <div class="flex">
        <div class="border pl-6 pr-1 inline-block">
            Tag
        </div>
        <div class="border px-2 inline-block w-full">
            {{$tag->name}}
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
            @foreach($tag->tasks as $task)
            <tr>
                <td class="px-4 py-3 border">
                    @if($task->is_urgent)
                    <span></span>
                    @endif
                    <a href="{{route('tasks.show', ['task' => $task->id ]) }}" class="hover:underline">
                        {{$task->title}}
                    </a>
                </td>
                <td class="px-4 py-3 border @if($task->is_past) text-gray-300 @endif">
                    {{$task->due_date->format('j M y')}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection