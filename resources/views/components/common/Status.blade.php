@if ($attributes['status'] == config('config.status.active'))
    <div class="w-20 text-center text-white bg-green-400  px-3 py-0.5  mx-auto ">
        Active
    </div>
@else
    <div class="w-20 text-center text-white bg-red-400  px-3 py-0.5  mx-auto">
        Inactive
    </div>
@endif
