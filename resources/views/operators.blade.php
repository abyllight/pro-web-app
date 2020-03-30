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
                <div class="form-inline">
                    <div class="form-group">
                        <h3>Операторы</h3>
                    </div>
                    <div class="form-group mx-sm-3">
                        <a class="btn btn-primary" href="{{ route('operator-create') }}" role="button">Добавить оператора</a>
                    </div>
                </div>
                <hr>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ф.И.О</th>
                        <th scope="col">Логин</th>
                        <th scope="col">Дата создания</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                                <td scope="row">{{ $key+1 }}</td>
                            <td>{{ $user->getFullName() }}</td>
                            <td>{{ $user->login }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('operator-edit', $user->id),'/edit' }}" role="button">Редактировать</a>
                                <button type="button" class="btn btn-danger btn-sm d" id="{{ $user->id }}">Удалить</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $( document ).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".d").on('click', function () {
                var x = confirm("Вы уверены?");
                if(x){
                    $.ajax({
                        type: "POST",
                        url: '{{ route('operator-delete') }}',
                        data: {
                            id: this.id
                        },
                        success: function (data) {
                            location.reload();
                        },
                        error: function (data) {
                            var errors = data.responseJSON;
                            console.log(errors);
                        }
                    });
                }
            });
        });
    </script>
@endsection
