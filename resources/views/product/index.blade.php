<x-app-layout>
    <div class="py-12">
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-slate-950/95 border border-slate-800 shadow-2xl rounded-[32px] overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Header --}}
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6 px-0 py-0 border-b border-slate-800 bg-slate-900/90">
                        <div>
                            <h2 class="text-2xl font-semibold text-white tracking-tight">
                                Product List
                            </h2>
                            <p class="text-sm text-slate-400 mt-1">
                                Manage your product inventory with a clean, full-width layout.
                            </p>
                        </div>

                        <a href="{{ route('product.create') }}"
                           class="inline-flex items-center gap-2 rounded-full bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-lg shadow-indigo-500/20 transition hover:bg-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 4v16m8-8H4"/>
                            </svg>
                            Add Product
                        </a>
                    </div>

                    {{-- Flash Message --}}
                    @if (session('success'))
                        <div class="mb-4 px-4 py-3 bg-emerald-900/70 border border-slate-800 text-emerald-200 rounded-lg text-sm">
                            {{ session('success') }}
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
                                        Quantity
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">
                                        Price
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">
                                        User
                                    </th>
                                    <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-slate-950 divide-y divide-slate-800">
                                @forelse ($products as $product)
                                    <tr class="transition hover:bg-slate-900/75">
                                        <td class="px-6 py-4 text-slate-200">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="px-6 py-4 font-semibold text-white">
                                            {{ $product->name }}
                                        </td>

                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold uppercase tracking-wide {{ $product->quantity > 10 ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                                                {{ $product->quantity }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-4 text-slate-200">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </td>

                                        <td class="px-6 py-4 text-slate-300">
                                            {{ $product->user->name ?? '-' }}
                                        </td>

                                        <td class="px-6 py-4 text-center">
                                            <div class="inline-flex items-center justify-center gap-3 text-base">
                                                <a href="{{ route('product.show', $product->id) }}" class="text-sky-400 hover:text-sky-300">👁</a>
                                                <a href="{{ route('product.edit', $product) }}" class="text-amber-400 hover:text-amber-300">✏️</a>
                                                <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?')" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-rose-400 hover:text-rose-300">🗑</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-10 text-center text-slate-400">
                                            No products found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    @if(method_exists($products, 'links'))
                        <div class="mt-4">
                            {{ $products->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>