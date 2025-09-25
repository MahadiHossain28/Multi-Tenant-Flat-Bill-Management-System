@props([
    'headers' => [],
])
<table {{ $attributes->class(['table', 'text-center',  'align-middle']) }}>
    <thead>
        <tr>
            @foreach($headers as $header)
                <th>{{ $header }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>
