@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-700 rounded bg-red-100">
            {{ __('Whoops! algo salio mal.') }}
            <ul class="ml-3 mt-3  mb-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
