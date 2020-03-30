@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if(session()->has('message'))
                    <div class="alert {{session('alert') ?? 'alert-info'}}">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('message') }}
                    </div>
                @endif
                <form action="{{ route('save') }}" method="post" name="myForm" enctype="multipart/form-data">
                    @csrf
                    <h2 class="mb-3">1. Личная информация</h2>
                    <div class="form-group">
                        <label for="inputFullName" class="col-form-label col-form-label-lg">Ф.И.О</label>
                        <input type="text" class="form-control form-control-lg"
                               id="inputFullName" name="fullName"
                               placeholder="Касымов Адильбек Асылбекович"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="inputCity" class="col-form-label col-form-label-lg">Город</label>
                        <select id="inputCity" class="form-control form-control-lg" name="city" disabled>
                            <option selected value="0">Нур-Султан</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress" class="col-form-label col-form-label-lg">Адрес</label>
                        <input type="text" class="form-control form-control-lg" id="inputAddress" name="address"
                               placeholder="Укажите улицу и номер дома" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPhone" class="col-form-label col-form-label-lg">Мобильный телефон</label>
                            <input type="text" class="form-control form-control-lg" id="inputPhone" name="phone"
                                   placeholder="+7 (000) 000-00-00" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail" class="col-form-label col-form-label-lg">Электронная почта</label>
                            <input type="email" class="form-control form-control-lg" id="inputEmail" name="email"
                                   placeholder="Электронная почта" required>
                        </div>
                    </div>
                    <hr>
                    <h2 class="mb-3 mt-5">2. Заявление</h2>
                    <div class="form-group">
                        <label for="inputSupervision" class="col-form-label col-form-label-lg">Выберите надзор</label>
                        <select id="inputSupervision" class="form-control form-control-lg" name="supervision" required>
                            <option selected>Не выбрано</option>
                            <option>Досудебное производство</option>
                            <option>Уголовное судопроизводство</option>
                            <option>Гражданское судопроизводство</option>
                            <option>Административное судопроизводство</option>
                            <option>Исполнительное судопроизводство</option>
                            <option>Социально-экономические вопросы</option>
                            <option>Исполнение приговора</option>
                            <option>Иные</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputCaseNumber" class="col-form-label col-form-label-lg">Номер уголовного дела (Не обязательно)</label>
                        <input type="text" class="form-control form-control-lg" id="inputCaseNumber" name="caseNumber"
                               placeholder="12345678">
                    </div>

                    <div class="form-group">
                        <label for="inputAuthority" class="col-form-label col-form-label-lg">Орган в производстве, которого находятся материалы</label>
                        <input type="text" class="form-control form-control-lg" id="inputAuthority" name="authority"
                               placeholder="МВД РК" required>
                    </div>

                    <div class="form-group">
                        <label for="inputAgree" class="col-form-label col-form-label-lg">Не согласен с</label>
                        <textarea class="form-control form-control-lg" id="inputAgree" name="agree" rows="5"
                                  placeholder="Прекращением уголовного дела в отношении Иванова И." required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputAction" class="col-form-label col-form-label-lg">Какие меры просите принять?</label>
                        <textarea class="form-control form-control-lg" id="inputAction" name="action" rows="5"
                                  placeholder="Прошу отменить принятое решение и направить дело в суд" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputSolve" class="col-form-label col-form-label-lg">
                            Обращались ли Вы в иные организации или суды для решения указанных вопросов?
                        </label>
                        <textarea class="form-control form-control-lg" id="inputSolve" name="solve" rows="5" required></textarea>
                    </div>
                    {{--<div class="form-group">
                        <label for="file" class="col-form-label col-form-label-lg">Прикрепите файлы</label>
                        <input type="file" class="form-control-file @error('file') is-invalid @enderror" id="file" name="file">
                        @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>--}}
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
