<x-mail::message>
    # Monthly Bills Created

    New bills have been created for **Flat: {{ $flat->number }} ({{ $flat->building->name }})**
    **Month:** {{ \Carbon\Carbon::parse($bills->first()->month)->format('F Y') }}

    <x-mail::table>
        | # | Category        | Amount     | Paid       | Due        | Status   |
        |--:|-----------------|-----------:|-----------:|-----------:|----------|
        @foreach($bills as $index => $bill)
            | {{ $index + 1 }} | {{ $bill->category->name }} |
            {{ number_format($bill->amount, 2) }} |
            {{ number_format($bill->paid_total, 2) }} |
            {{ number_format($bill->due_amount, 2) }} |
            {{ $bill->status->label() }} |
        @endforeach
    </x-mail::table>

    **Total Amount:** {{ number_format($bills->sum('amount'), 2) }}
    **Total Due:** {{ number_format($bills->sum('due_amount'), 2) }}

    Thanks,
    {{ config('app.name') }}
</x-mail::message>
