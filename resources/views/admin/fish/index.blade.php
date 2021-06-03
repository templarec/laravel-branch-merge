@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <a href="{{route('admin.fish.create')}}">
          <button class="btn btn-primary" type="button" name="button">
            Inserisci nuovo abitante marino
          </button>

        </a>
      </div>
    </div>
    <div class="row justify-content-center">
      @foreach ($fish as $pesce)

        <div class="col-md-3">
          <div class="card mt-3">
            <div class="card-header">
                {{ $pesce->name }}
              {{-- <a class="mr-5 text-capitalize" href="{{route('admin.fish.show', ['fish' => $pesce->id])}}">
                {{ $pesce->name }}
              </a> --}}
            </div>

            <div class="card-body">
              <div class="">
                {{$pesce->price}}
              </div>
              <div class="">
                {{$pesce->weight}}
              </div>
              <div class="">
                {{$pesce->race}}
              </div>

              {{-- <div class="row justify-content-center flex-wrap mt-5">
                <a class="mr-5" href="{{route('admin.fish.edit', ['pesce' => $pesce->id])}}">
                  <button class="btn btn-primary" type="button" name="button">Modifica</button>
                </a>
                <form class="" action="{{route('admin.fish.destroy', ['pesce' => $pesce->id])}}" method="pesce">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-primary" name="button">Cancella</button>
                </form>
              </div> --}}
            </div>
          </div>
        </div>


      @endforeach
    </div>
    </div>
</div>
@endsection
