@props(['field', 'limit' => 20, 'style' => null, 'image' => null, 'imageStyle' => null])
<td scope="row" class="px-6 py-4 {{ $style }}">
    @if ($image)
        <img src="{{ $field }}" alt="" class="{{ $imageStyle }}">
    @else
        {{ Str::limit($field, $limit) }}
    @endif
</td>
