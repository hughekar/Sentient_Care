@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge([
        'class' =>
            'bg-transparent text-white border-white rounded-lg h-11 px-4
             focus:border-teal-600 focus:ring-teal-600 shadow-sm'
    ]) }}>
