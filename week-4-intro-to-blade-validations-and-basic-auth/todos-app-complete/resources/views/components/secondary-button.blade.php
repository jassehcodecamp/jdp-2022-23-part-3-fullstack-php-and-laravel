@props([
  'href' => '',
  'as' => 'button'
])

@if($as == 'link')
<a 
  href="{{$href}}" class="text-gray-50 bg-gray-500 py-1.5 px-2 text-xs rounded">{{ $slot }}
</a>
@else
<button
  class="text-gray-50 bg-gray-500 py-1.5 px-2 text-xs rounded">{{ $slot }}
</button>
@endif