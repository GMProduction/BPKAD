@extends('base')

@section('content')
    <x-page-headerfaq>
        <a class="font-bold text-white  text-4xl">FAQ </a> <br>
        <a class="font-bold text-white">(Frequently Asked Questions / Tanya Jawab Umum)</a>
    </x-page-headerfaq>

    <x-panel-content title="FAQ">
        <div class="relative overflow-x-auto">
            <div id="accordion-collapse" data-accordion="collapses">
                @foreach ($data as $key => $d)
                    <h2 id="accordion-collapse-heading-{{ $key }}">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5  rtl:text-right text-gray-500 border border-b-0 border-gray-200 {{ $key == 0 ? 'rounded-t-xl' : '' }} focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-collapse-body-{{ $key }}" aria-expanded="true"
                            aria-controls="accordion-collapse-body-{{ $key }}">
                            <span style="font-size: 1rem">{{ $d->question }}</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-{{ $key }}" class="hidden"
                        aria-labelledby="accordion-collapse-heading-{{ $key }}">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <p class="mb-2 text-gray-400 dark:text-gray-400">{{ $d->answer }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-panel-content>
@endsection

@section('morejs')
    <script></script>
@endsection
