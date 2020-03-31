@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-4">Hello, world!</h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Подать заявление/жалобу</h5>
                        <p class="card-text text-secondary">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="{{ route('complaint-show') }}" class="btn btn-primary">Перейти</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Результат рассмотрения</h5>
                        <p class="card-text text-secondary">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary disabled">Перейти</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Запись на личный прием</h5>
                        <p class="card-text text-secondary">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary disabled">Перейти</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
