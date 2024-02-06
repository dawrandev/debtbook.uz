<x-layouts.main>
    <x-slot:title>
        Профиль
    </x-slot:title>
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="card author-box">
                            <div class="card-body">
                                <div class="author-box-center">
                                    <div class="author-box-name">
                                        <a href="#">{{Auth::user()->name}} {{Auth::user()->surname}}</a>
                                    </div>
                                    <img alt="image" src="assets\img\users\{{Auth::user()->photo}}" class="rounded-circle author-box-picture">
                                    <div class="clearfix">
                                        <form action="{{Route('image')}}" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <label class="input-file">
                                                <input type="hidden" name="user_id" class="btn btn-icon icon-left" value="{{Auth::user()->id}}">
                                                <input type="file" name="image">
                                                <span class="input-file-btn">Выберите Фото</span>
                                            </label>
                                            <button value="Сохранить" class="btn btn-icon btn-success"><i class="fas fa-check"></i></button>
                                        </form>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="py-4">
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Фамилия
                                            </span>
                                            <span class="float-right text-muted">
                                                {{Auth::user()->surname}}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Имя
                                            </span>
                                            <span class="float-right text-muted">
                                                {{Auth::user()->name}}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Телефон </span>
                                            <span class="float-right text-muted">
                                                {{Auth::user()->phone}}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Локация
                                            </span>
                                            <span class="float-right text-muted">
                                                {{Auth::user()->location}}
                                            </span>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    
                </div>
            </div>
</x-layouts.main>