<x-layouts.main>
    <x-slot:title>
        О долгах
    </x-slot:title>
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <div class="col-1">
                            <a href="{{Route('clientsPage')}}" class="btn btn-warning">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                        <div class="col-2">
                            <h4>Долги</h4>
                        </div>
                        <div class="col-2">
                            <h4>Имя: {{ $single->name }}</h4>
                        </div>
                        <div class="col-3">
                            <h4>Телефон: {{ $single->phone}}</h4>
                        </div>
                        <div class="col-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1">Добавить
                      долго</button>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter2">Возврать
                      долго</button>
                        </div>
                    </div>

                    <div class="card-body">
                        <form class="form-inline mr-auto">
                            <div class="search-element">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                                <button class="btn" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form><br>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Сумма</th>
                                    <th scope="col">Дата</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($debts as $debt)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    @if ($debt->summa < '0' ) <td style="color: red;">
                                        <h6>{{ $debt->summa }}</h6>
                                        </td>
                                        <td>{{ $debt->date }}</td>
                                        @else
                                        <td style="color: green;">
                                            <h6>{{ $debt->summa }}</h6>
                                        </td>
                                        <td>{{ $debt->date }}</td>
                                        @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{$debts->links()}}
                    </div>
                </div>
               
              
            </div>
</section>
            <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Добавить долго</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                            <form method="post" action="{{Route('adddebt')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="client_id" value="{{$single->id}}">
                                        <label for="summa">Сумма</label>
                                        <input id="summa" type="text" class="form-control pwstrength" data-indicator="pwindicator" name="summa" value="{{old('phone')}}" tabindex="2">
                                        @error('summa')
                                        <li style="color:red">{{$message}}</li>
                                        @enderror
                                       
                                    </div>
                            </div>
                        <div class="modal-footer bg-whitesmoke br">
                    <input type="submit" value="Сохранить" class="btn btn-primary">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Возврать долго</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                            <form method="post" action="{{Route('subtdebt')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="client_id" value="{{$single->id}}">
                                        <label for="summa">Сумма</label>
                                        <input id="summa" type="text" class="form-control pwstrength" data-indicator="pwindicator" name="summa" value="{{old('phone')}}" tabindex="2">
                                        @error('summa')
                                        <li style="color:red">{{$message}}</li>
                                        @enderror
                                       
                                    </div>
                            </div>
                        <div class="modal-footer bg-whitesmoke br">
                    <input type="submit" value="Сохранить" class="btn btn-primary">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</x-layouts.main>