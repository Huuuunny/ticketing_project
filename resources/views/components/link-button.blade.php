<td class="px-2 py-2">
    <a role="button" {{ $attributes->merge(['class' => 'inline-flex item-2 py-1.5 px-2 bg-gray-800 bos-center pxrder border-1 rounded-lg font-semibold text-xs text-white uppercase tracking-widest transition delay-150 duration-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ']) }}>
        {{ $slot }}
    </a>
</td>