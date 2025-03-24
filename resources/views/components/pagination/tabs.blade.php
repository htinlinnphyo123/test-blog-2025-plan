@props(['meta'])
@php
    $links = $meta['links'];
    $queryString = '&' . http_build_query(request()->except('page'));
@endphp
<div class="container flex flex-wrap justify-between mx-auto mt-5 mb-5 pr-4">
    <div></div>
    <nav aria-label="Page navigation example">
        <ul class="inline-flex -space-x-px">
            @foreach ($links as $key => $link)
                @php
                    $digits = $link['label'];
                    $number = null;
                    $en_number = range(0, 9);

                    $mm_number = config('numbers.mm_no');
                    $kh_number = config('numbers.kh_no');

                    if (session()->get('locale') === 'mm') {
                        $number = str_ireplace($en_number, $mm_number, $digits);
                    } else if(session()->get('locale')==='km'){
                        $number = str_ireplace($en_number, $kh_number, $digits);
                    } else {
                        $number = str_ireplace($en_number, $en_number, $digits);
                    }
                @endphp
                <!-- Start Prev and Next -->    
                @if ($loop->first)
                    <li>
                        <a href="{{ $link['url'] ? $link['url'] . $queryString : $links[$key + 1]['url'] . $queryString }}"
                            class="{{ config('config.sampleForm.paginatePrevButton') }}">
                            {{ __('messages.previous') }}
                        </a>
                    </li>
                    @continue
                @endif
                @if ($loop->last)
                    <li>
                        <a href="{{ $link['url'] ? $link['url'] . $queryString : $links[$key - 1]['url'] . $queryString }}"
                            class="{{ config('config.sampleForm.paginateNextButton') }}">
                            {{ __('messages.next') }}
                        </a>
                    </li>
                    @continue
                @endif
                <!-- End Prev and Next -->
                @if (request()->page == $link['label'])
                    <li>
                        <a href="{{ $link['url'] . $queryString }}"
                            class="{{ config('config.sampleForm.paginateLabelSelected') }}">{{ $number }}</a>
                    </li>
                @else
                <li class="hidden lg:block">
                    <a href="{{ $link['url'] . $queryString }}" aria-current="page"
                        class="{{ config('config.sampleForm.paginateLabel') }}">{{ $number }}</a>
                </li>
                @endif

            @endforeach
        </ul>
    </nav>
</div>
