<!-- Main Content -->
<x-layouts.main>
    <x-slot:title>
        История
    </x-slot:title>
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <div class="col-2">
                            <h4>История</h4>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-4">
                            <form class="form-inline mr-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
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
                                    <th scope="col">Сумма</th>
                                    <th scope="col">Дата</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($histories as $history)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{$history->name}}</td>
                                    <td>{{$history->phone}}</td>
                                    @if($history->summa > 0)
                                    <td style="color: green;">{{$history->summa}}</td>
                                    @else
                                    <td style="color: red;">{{$history->summa}}</td>
                                    @endif
                                    <td>{{$history->date}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                       {{$histories->links()}}
                    </div>
                </div>
            </div>
    </div>
</x-layouts.main>