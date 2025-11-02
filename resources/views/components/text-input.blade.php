@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-white dark:border-white dark:bg-gray-900 dark:text-white focus:border-white dark:focus:border-white focus:ring-white dark:focus:ring-white rounded-md shadow-sm']) }}>


