@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h3>Nuovo pesce</h3>
      </div>
    </div>


    <div class="row justify-content-center">

        <div class="col-md-8">
          <form class="" action="{{route('admin.fish.store')}}" method="post">
            @csrf
            @method('POST')


            <div class="form-group">
              <label for="name">Nome</label>
              <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{old('name')}}">
              @error('name')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="price">Prezzo</label>
              <input class="form-control @error('name') is-invalid @enderror" type="number" id="price" name="price" value="{{old('price')}}" step="0.01">
              @error('price')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="weight">Peso (Hg)</label>
              <input class="form-control @error('weight') is-invalid @enderror" type="number" id="weight" name="weight" value="{{old('weight')}}" step="0.01" min="0">
              @error('weight')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="race">Razza</label>
              <input class="form-control @error('race') is-invalid @enderror" type="text" id="race" name="race" value="{{old('race')}}">
              @error('race')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>


            <button type="submit" class="btn btn-primary" name="button">Salva</button>

          </form>
        </div>

    </div>
  </div>

@endsection
