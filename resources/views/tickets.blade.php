@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
                <div class="alert {{session('alert') ?? 'alert-info'}}">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('message') }}
                </div>
            @endif
            <h3>Заявки</h3>
            <hr>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ф.И.О</th>
                    <th scope="col">Надзор</th>
                    <th scope="col">Оператор</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Дата создания</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $key => $ticket)
                        <tr class="@if($ticket->status == 'На рассмотрении') table-danger @endif">
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $ticket->full_name }}</td>
                            <td>{{ $ticket->supervision }}</td>
                            @if($ticket->user)
                                <td>{{ $ticket->user->getFullName() }}</td>
                            @else
                                <td></td>
                            @endif
                            <td>{{ $ticket->status }}</td>
                            <td>{{ $ticket->created_at }}</td>
                            <td><a class="btn btn-primary btn-sm" href="{{ route('ticket-show', $ticket->id) }}" role="button">Подробнее</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
