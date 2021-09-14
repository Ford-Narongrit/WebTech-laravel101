@extends('layouts.main')

@section('content')
    <div class="space-y-5">
        <div class="text=2xl font-bold text-gray-900 sm:text-3xl text-center">
            Tags
        </div>
        <table class="shadow-lg mx-auto w-4/5">
            <thead>
                <tr class="text-md font-semibold text-left text-gray-900 bg-gray-300 uppercase border-b border">
                    <th class="px-4 py-3">Tag name</th>
                    <th class="px-4 py-3">Number of tasks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td class="px-4 py-3 border">
                            <a href="{{ route('tags.slug', ['slug' => $tag->name]) }}" class="hover:underline">
                                {{ $tag->name }}
                            </a>
                        </td>
                        <td class="px-4 py-3 border">
                            {{ $tag->tasks()->count() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
