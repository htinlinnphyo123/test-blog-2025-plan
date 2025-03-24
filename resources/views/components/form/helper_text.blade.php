@props(['message'=>null])
@if($message)
    <p class="mt-1 text-xs text-gray-400 italic" id="file_input_help">{{ __('form_helper.'.$message) }}</p>
@endif