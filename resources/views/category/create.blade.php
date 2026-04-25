<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-950/95 border border-slate-800 shadow-2xl rounded-[32px] overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Header --}}
                    <div class="flex items-center gap-3 mb-6">
                        <a href="{{ route('category.index') }}"
                           class="p-1.5 rounded-md text-gray-400 hover:text-gray-200 hover:bg-slate-800 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 19l-7-7 7-7"/>
                            </svg>
                        </a>

                        <div>
                            <h2 class="text-xl font-bold text-white">
                                Add Category
                            </h2>
                            <p class="text-sm text-slate-400">
                                Fill in the details to add a new category
                            </p>
                        </div>
                    </div>

                    {{-- Form --}}
                    <form action="{{ route('category.store') }}" method="POST" class="space-y-5">
                        @csrf

                        {{-- Name --}}
                        <div>
                            <label class="block text-sm font-medium mb-1 text-slate-300">
                                Category <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   placeholder="Electronic"
                                   class="w-full px-4 py-2.5 rounded-lg border text-sm
                                   {{ $errors->has('name')
                                        ? 'border-rose-400 bg-rose-500/10'
                                        : 'border-slate-700 bg-slate-900 text-white' }}
                                   focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                            @error('name')
                                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Actions --}}
                        <div class="flex justify-end gap-3 pt-2">
                            <a href="{{ route('category.index') }}"
                               class="px-4 py-2 rounded-lg border border-slate-700 text-sm text-slate-300 hover:bg-slate-800 transition">
                                Cancel
                            </a>

                            <button type="submit"
                                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow-lg shadow-indigo-500/20 transition">
                                Save Category
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
