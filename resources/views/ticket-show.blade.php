@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Заявка № {{ $ticket->id }}</div>
                <div class="card-body">
                    <h5 class="mb-4 font-weight-bold">Личные данные</h5>
                    <hr>
                    <div class="form-group row">
                        <label class="col-md-4 font-weight-bold text-black-50">Ф.И.О</label>

                        <div class="col-md-6">
                            {{ $ticket->full_name }}
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label class="col-md-4 font-weight-bold text-black-50">Адрес</label>

                        <div class="col-md-6">
                            {{ $ticket->address }}
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label class="col-md-4 font-weight-bold text-black-50">Контакты</label>

                        <div class="col-md-4">
                            {{ $ticket->phone }}
                        </div>

                        <div class="col-md-4">
                            {{ $ticket->email }}
                        </div>
                    </div>

                    <br>
                    <h5 class="mb-4 font-weight-bold">Данные заявки</h5>
                    <hr>
                    <div class="form-group row">
                        <label class="col-md-4 font-weight-bold text-black-50">Надзор</label>

                        <div class="col-md-6">
                            {{ $ticket->supervision }}
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label class="col-md-4 font-weight-bold text-black-50">Номер уголовного дела</label>

                        <div class="col-md-6">
                            {{ $ticket->case_number }}
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label class="col-md-4 font-weight-bold text-black-50">Орган в производстве, которого находятся материалы</label>

                        <div class="col-md-6">
                            {{ $ticket->authority }}
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label class="col-md-4 font-weight-bold text-black-50">Не согласен с</label>

                        <div class="col-md-6">
                            {{ $ticket->agree }}
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label class="col-md-4 font-weight-bold text-black-50">Какие меры просите принять?</label>

                        <div class="col-md-6">
                            {{ $ticket->action }}
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label class="col-md-4 font-weight-bold text-black-50">Обращались ли Вы в иные организации или суды для решения указанных вопросов?</label>

                        <div class="col-md-6">
                            {{ $ticket->solve }}
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-4 font-weight-bold text-black-50">Прикрепленные файлы</label>

                        <div class="col-md-6">
                            @foreach($ticket->files as $file)
                                <a href="{{ route('ticket-download', $file->uuid) }}" target="_blank">{{ $file->title }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    @if($is_admin)
                        <form action="{{ route('ticket-set-operator-or-status', $ticket->id) }}" method="post">
                            @csrf
                            <h5 class="mb-3 font-weight-bold">Назначить оператора</h5>

                            <div class="form-group">
                                <select class="form-control" name="user">
                                    <option value="0">Не выбрано</option>
                                    @foreach($users as $user)
                                        @if($ticket->user_id)
                                            <option selected value="{{ $user->id }}">{{ $user->first_name }}</option>
                                        @else
                                            <option value="{{ $user->id }}">{{ $user->first_name }}</option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Назначить</button>
                        </form>
                    @else
                        <form action="{{ route('ticket-set-operator-or-status', $ticket->id) }}" method="post">
                            @csrf
                            <h5 class="mb-3 font-weight-bold">Назначить статус</h5>

                            <div class="form-group">
                                <select class="form-control" name="stat">
                                    @foreach($statuses as $status)
                                        @if($ticket->status == $status)
                                            <option selected value="{{ $status }}">{{ $status }}</option>
                                        @else
                                            <option value="{{ $status }}">{{ $status }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Назначить</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
