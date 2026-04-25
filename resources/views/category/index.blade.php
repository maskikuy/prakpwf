<x-app-layout>
    <div class="py-12">
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-slate-950/95 border border-slate-800 shadow-2xl rounded-[32px] overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Header --}}
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6 px-0 py-0 border-b border-slate-800 bg-slate-900/90">
                        <div>
                            <h2 class="text-2xl font-semibold text-white tracking-tight">
                                Category List
                            </h2>
                            <p class="text-sm text-slate-400 mt-1">
                                Manage your category with a clean layout.
                            </p>
                        </div>

                        <div class="flex items-center gap-3">
                            @can('manage-category')
                                <x-add-product :url="route('category.create')" name="Add Category" />
                            @endcan
                        </div>
                    </div>

                    {{-- Flash Message --}}
                    @if (session('success'))
                        <div class="mb-4 px-4 py-3 bg-emerald-900/70 border border-slate-800 text-emerald-200 rounded-lg text-sm">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="mb-4 px-4 py-3 bg-rose-900/70 border border-slate-800 text-rose-200 rounded-lg text-sm">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Table --}}
                    <div class="overflow-x-auto px-6 pb-6 pt-4">
                        <div class="min-w-full overflow-hidden rounded-3xl border border-slate-800 bg-slate-900 shadow-inner shadow-slate-950/20">
                            <table class="min-w-full divide-y divide-slate-700 text-sm">
                                <thead class="bg-slate-950 text-slate-300">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">
                                        #
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">
                                        Total Product
                                    </th>
                                    <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-slate-950 divide-y divide-slate-800">
                                @forelse ($categories as $category)
                                    <tr class="transition hover:bg-slate-900/75">
                                        <td class="px-6 py-4 text-slate-200">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="px-6 py-4 font-semibold text-white">
                                            {{ $category->name }}
                                        </td>

                                        <td class="px-6 py-4 text-slate-300">
                                            {{ $category->products_count }}
                                        </td>

                                        <td class="px-6 py-4 text-center">
                                            <div class="inline-flex items-center justify-center gap-3 text-base">
                                                <a href="{{ route('category.edit', $category) }}" class="text-amber-400 hover:text-amber-300">✏️</a>
                                                <form action="{{ route('category.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category?')" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-rose-400 hover:text-rose-300">🗑</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-10 text-center text-slate-400">
                                            No categories found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
