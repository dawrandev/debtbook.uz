<x-layouts.main>
    <x-slot:title>
        Клиенты
    </x-slot:title>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <div class="col-2">
                            <h4>Клиенты</h4>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-4">
                            <form action="{{Route('searchClient')}}" class="form-inline mr-auto" method="POST">
                                @csrf
                                <div class="search-element">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input name="search" class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Имя</th>
                                    <th scope="col">Телефон</th>
                                    <th scope="col">Общая сумма</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <form action="{{Route('addclient')}}" class="form-inline" method="POST">
                                        @csrf
                                    <th>#</th>
                                    <th><input type="name" name="name" class="form-control mb-2 mr-sm-2" placeholder="Имя" value="{{old('name')}}">
                                    @error('name')
                                        <li style="color:red">{{$message}}</li>
                                        @enderror
                                        </th>
                                    <th><input type="phone" name="phone" class="form-control mb-2 mr-sm-2" placeholder="Телефон" value="{{old('phone')}}">
                                    @error('phone')
                                        <li style="color:red">{{$message}}</li>
                                        @enderror
                                        </th>
                                    <th><input type="summa" name="summa" class="form-control mb-2 mr-sm-2" placeholder="сумма" value="{{old('summa')}}">
                                    @error('summa')
                                        <li style="color:red">{{$message}}</li>
                                        @enderror
                                        </th>
                                    <th><input type="submit" value="Добавить" class="btn btn-primary"></th>
                                    </form>
                                </tr>
                                @if($clients != 'Null')
                                @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td><a href="{{route('single', [$client['id']])}}">{{ $client->name }}</a></td>
                                    <td>{{ $client['phone'] }}</td>
                                    <td>{{ summa($client['id']) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$clients->links()}}
                        @endif

                    </div>
                </div>
                
            </div>
</section>

    
</x-layouts.main>