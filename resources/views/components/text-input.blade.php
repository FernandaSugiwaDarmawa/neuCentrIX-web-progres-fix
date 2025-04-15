@props(['disabled' => false])

<input @disabled($disabled) 
    {{ $attributes->merge([
        'class' => 'bg-blue-50 text-black border border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 rounded-md shadow-sm'
    ]) }} />
