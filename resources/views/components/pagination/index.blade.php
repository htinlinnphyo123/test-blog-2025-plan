@props(['meta','route'])
<x-pagination.wrapper>
    <x-pagination.number :route="$route" />
    <x-pagination.tabs :meta="$meta"></x-pagination.tabs>
</x-pagination.wrapper>