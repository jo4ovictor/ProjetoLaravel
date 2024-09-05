@extends('layouts.main')

@section('title', 'EventosHub')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
        <h2>Buscando por: {{$search}}</h2>
    @else
        <h2>Próximos Eventos</h2>
        <p class="subtitle">Veja os Eventos dos próximos dias</p>
    @endif
    
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div class="card col-md-3">
            <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
            <div class="card-body">
                <p class="card-date">{{ $event->date->format('d/m/Y') }}</p>
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-participants">{{ count($event->users) }} Participantes</p>
                <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber Mais</a>
            </div>
        </div>
        @endforeach
        @if(count($events) == 0 && $search)
            <p>Não há eventos com {{$search}}! <a href="/">Ver Eventos!</a></p>
        @elseif(count($events) == 0)
            <p>Não há eventos</p>
        @endif
    </div>
</div>

@endsection