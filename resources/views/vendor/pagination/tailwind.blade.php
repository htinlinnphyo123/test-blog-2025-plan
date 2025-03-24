@if ($paginator->hasPages())
    @php
        $suffix = '';
        if (isset($keyword)) {
            foreach ($keyword as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $val) {
                        $suffix .= "&$key%5B%5D=$val";
                    }
                } else {
                    $suffix .= "&$key=$value";
                }
            }
        }
    @endphp
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between mt-2">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() . $suffix }}"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium bg-theme text-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() . $suffix }}"
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium bg-theme text-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-center">
            <div>
                <p class="text-sm text-gray-700 leading-5 me-10">
                    {{ __('messages.showing') }}
                    @if ($paginator->firstItem())
                        @php
                            $firstDigit = $paginator->firstItem();
                            $lastDigit = $paginator->lastItem();
                            $firstNumber = null;
                            $secondNumber = null;
                            $enNumber = range(0, 9);

                            $mmNumber = config('numbers.mm_no');
                            $khmerNumber = config('numbers.kh_no');
                            if (session()->get('locale') === 'mm') {
                                $firstNumber = str_ireplace($enNumber, $mmNumber, $firstDigit);
                                $secondNumber = str_ireplace($enNumber, $mmNumber, $lastDigit);
                            } elseif (session()->get('locale') === 'en') {
                                $firstNumber = str_ireplace($mmNumber, $enNumber, $firstDigit);
                                $secondNumber = str_ireplace($mmNumber, $enNumber, $lastDigit);
                            } elseif (session()->get('locale') === 'km') {
                                $firstNumber = str_ireplace($enNumber, $khmerNumber, $firstDigit);
                                $secondNumber = str_ireplace($enNumber, $khmerNumber, $lastDigit);
                            }
                        @endphp
                        <span class="font-medium">{{ $firstNumber }}</span>
                        {{ __('messages.to') }}
                        <span class="font-medium">{{ $secondNumber }}</span>
                    @else
                        @php
                            $countDigit = $paginator->firstItem();
                            $countNumber = null;
                            $enNumber = range(0, 9);

                            $mmNumber = config('numbers.mm_no');
                            $khmerNumber = config('numbers.kh_no');
                            if (session()->get('locale') === 'mm') {
                                $countNumber = str_ireplace($enNumber, $mmNumber, $countDigit);
                            } elseif (session()->get('locale') === 'en') {
                                $countNumber = str_ireplace($mmNumber, $enNumber, $countDigit);
                            } elseif (session()->get('locale') === 'km') {
                                $countNumber = str_ireplace($enNumber, $khmerNumber, $countDigit);
                            }
                        @endphp
                        {{ $countNumber }}
                    @endif
                    {{ __('messages.of') }}
                    @php
                        $totalDigit = $paginator->total();
                        $totalNumber = null;
                        $enNumber = range(0, 9);

                        $mmNumber = config('numbers.mm_no');
                        $khmerNumber = config('numbers.kh_no');
                        if (session()->get('locale') === 'mm') {
                            $totalNumber = str_ireplace($enNumber, $mmNumber, $totalDigit);
                        } elseif (session()->get('locale') === 'en') {
                            $totalNumber = str_ireplace($mmNumber, $enNumber, $totalDigit);
                        } elseif (session()->get('locale') === 'km') {
                            $totalNumber = str_ireplace($enNumber, $khmerNumber, $totalDigit);
                        }
                    @endphp
                    <span class="font-medium">{{ $totalNumber }}</span>
                    {{ __('messages.results') }}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    {{-- Previous Page --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span
                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5"
                                aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() . $suffix }}" rel="prev"
                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-theme bg-white border border-gray-300 rounded-l-md leading-5 hover:text-white hover:bg-theme focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                            aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif
                    {{-- Previous Page --}}

                    {{-- Page No --}}
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                            </span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @php
                                    $digits = $page;
                                    $number = null;
                                    $enNumber = range(0, 9);

                                    $mmNumber = config('numbers.mm_no');
                                    $khmerNumber = config('numbers.kh_no');
                                    if (session()->get('locale') === 'mm') {
                                        $number = str_ireplace($enNumber, $mmNumber, $digits);
                                    } elseif (session()->get('locale') === 'en') {
                                        $number = str_ireplace($mmNumber, $enNumber, $digits);
                                    } elseif (session()->get('locale') === 'km') {
                                        $number = str_ireplace($enNumber, $khmerNumber, $digits);
                                    }
                                @endphp

                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span
                                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-red-600 bg-theme border border-gray-300 cursor-default leading-5">{{ $number }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url . $suffix }}"
                                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-300 hover:bg-theme focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $number }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    {{-- Page No --}}

                    {{-- Next Page --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() . $suffix }}" rel="next"
                            class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-theme bg-white border border-gray-300 rounded-r-md leading-5 hover:text-white hover:bg-theme focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                            aria-label="{{ __('pagination.next') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span
                                class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5"
                                aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif
                    {{-- Next Page --}}
                </span>
            </div>
        </div>
    </nav>
@endif
