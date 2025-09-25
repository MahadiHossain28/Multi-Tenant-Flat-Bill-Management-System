@props([
    'headers' => [],
])
<table {{ $attributes->class(['table', 'table-striped','text-center',  'align-middle', 'table-bordered']) }}>
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
