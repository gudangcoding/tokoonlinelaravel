@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            {!! Form::open(['url'=>'orders', 'method'=>'get', 'class'=>'form-inline']) !!}
            <div class="form-group {{ $errors->has('q') ? 'has-errot' : '' }}">
            {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder'=>'Order ID/Customer...']) !!}
            {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {!! $errors->has('status')  ? 'has-error' : '' !!}">
            {!! Form::select('status', [''=>'Semua Status']+App\Order::statusList(), isset($status) ? $status : null, ['class'=>'form-control']) !!}
            {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
            </div>
            {!! Form::submit('Cari', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Order #</td>
                            <td>Customer</td>
                            <td>Status</td>
                            <td>Pembayaran</td>
                            <td>Update Terakhir</td>
                        </tr>
                    </thead>
                    @forelse($orders as $order)
                    <tbody>
                        <tr>
                            <td><a href="{{ route('orders.edit', $order->id) }}">{{ $order->padded_id }}</a></td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->human_status }}</td>
                            <td>
                                Total : <strong>{{ number_format($order->total_payment) }}</strong><br>
                                Transfer ke : {{ config('bank-accounts')[$order->bank]['bank'] }} <br>
                                Dari : {{ $order->sender }}
                            </td>
                            <td>{{ $order->updated_at }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">Tidak Ada Order Yang ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {!! $orders->appends(compact('status', 'q'))->links() !!}
            </div>
        </div>
    </div>
@endsection
