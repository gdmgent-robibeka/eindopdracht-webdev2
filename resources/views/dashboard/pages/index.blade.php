<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard / Pages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <table class="table table-auto">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Pagina</th>
                        <th class="px-4 py-2"></th>
                    </tr>

                    @foreach ($pages as $page)
                        <tr>
                            <td class="px-4 py-2">{{ $page->id }}</td>
                            <td class="px-4 py-2">{{ $page->title }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('dashboard.pages.edit', $page->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2">
                                    Bewerk
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
