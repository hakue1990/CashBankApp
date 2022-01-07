@if ($message = Session::get('success'))
        <p>{{ $message }}</p>
@endif
<br><a href="{{ route('transactions.create') }}"><button>Dodaj transakcje</button> </a>
<table class="table" border=1>
    <tr>
        <th>Id</th>
        <th>Type</th>
        <th>amount</th>
        <th>sender</th>
        <th>recipient</th>
    </tr>
    @foreach ($transactions as $transaction)
        <tr>
            <td>{{ $transaction->id }}</td>
            <td>{{ $transaction->type }}</td>
            <td>{{ $transaction->amount }}</td>
            <td>{{ $transaction->sender }}</td>
            <td>{{ $transaction->recipient }}</td>
        </tr>
    @endforeach
</table>
{!! $transactions->links() !!}

