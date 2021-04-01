<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">

        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table>

            <div class="flex items-center px-6 py-4">
                {{-- <input type="text" wire:model="search"> --}}
                <x-jet-input class="flex-1 mr-4" placeholder="¿Que estas buscando?" type="text" wire:model="search" />

                @livewire('create-post')
            </div>
            @if($posts->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="w-24 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                wire:click="order('id')">
                                Id

                                {{-- SORT --}}
                                @if($row == 'id')
                                    @if ($direction == 'asc')
                                        <i class="float-right fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right fas fa-sort"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                wire:click="order('title')">
                                Title

                                {{-- SORT --}}
                                @if($row == 'title')
                                    @if ($direction == 'asc')
                                        <i class="float-right fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right fas fa-sort"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                wire:click="order('content')">
                                Content

                                {{-- SORT --}}
                                @if($row == 'content')
                                    @if ($direction == 'asc')
                                        <i class="float-right fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right fas fa-sort"></i>
                                @endif
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($posts as $post)

                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{$post->id}}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{$post->title}}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{$post->content}}</div>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-right">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No hay registros :(
                </div>
            @endif

        </x-table>

    </div>

</div>
