
<!DOCTYPE html>
<html lang="en">


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title> Админь</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='/img/favicon.ico' />
    <style>
        .input-file {
            position: relative;
            display: inline-block;
        }

        .input-file-btn {
            position: relative;
            display: inline-block;
            cursor: pointer;
            outline: none;
            text-decoration: none;
            font-size: 12px;
            vertical-align: middle;
            color: rgb(255 255 255);
            text-align: center;
            border-radius: 4px;
            background-color: #6610f2;
            line-height: 20px;
            height: 35px;
            padding: 10px 20px;
            box-sizing: border-box;
            border: none;
            margin: 0;
            transition: background-color 0.2s;
        }

        .input-file-text {
            padding: 0 10px;
            line-height: 40px;
            display: inline-block;
        }

        .input-file input[type=file] {
            position: absolute;
            z-index: -1;
            opacity: 0;
            display: block;
            width: 0;
            height: 0;
        }

        /* Focus */
        .input-file input[type=file]:focus+.input-file-btn {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }

        /* Hover/active */
        .input-file:hover .input-file-btn {
            background-color: #6610f2;
        }

        .input-file:active .input-file-btn {
            background-color: #6610f2;
        }

        /* Disabled */
        .input-file input[type=file]:disabled+.input-file-btn {
            background-color: #eee;
        }
    </style>
</head>

<body>

    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                        <li>

                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">

                <a href="{{Route('logout')}}" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                                    Logout
                                </a>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{Route('adminPage')}}"> <img alt="image" src="assets/img/logo.png" class="header-logo" />
                            <span class="logo-name">DEBT.UZ</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Главная</li>
                        <li class="dropdown">
                            <a href="#" class="nav-link"><i class="fas fa-home"></i><span>Админь Панель</span></a>
                        </li>
                </aside>
            </div>
            <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <div class="col-2">
                            <h4>Админь</h4>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-4">
                            <form action="{{Route('searchUser')}}" class="form-inline mr-auto" method="post">
                                @csrf
                                <div class="search-element">
                                    <input name="search" class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <form action="{{Route('addUser')}}" method="post">
                                @csrf
                            <thead>
                                <tr>
                                    <td><input type="text" name="surname" id="" placeholder="Фамилия" class="form form-control"></td>
                                    @error('surname')
                                        <li style="color:red">{{$message}}</li>
                                    @enderror
                                    <td><input type="text" name="name" id="" placeholder="Имя" class="form form-control"></td>
                                    @error('name')
                                        <li style="color:red">{{$message}}</li>
                                    @enderror
                                    <td><input type="text" name="phone" id="" placeholder="Телефон" class="form form-control"></td>
                                    @error('phone')
                                        <li style="color:red">{{$message}}</li>
                                    @enderror
                                    <td><input type="text" name="location" id="" placeholder="Локация" class="form form-control"></td>
                                    @error('location')
                                        <li style="color:red">{{$message}}</li>
                                    @enderror
                                    <td><input type="text" name="login" id="" placeholder="Логин" class="form form-control"></td>
                                    @error('login')
                                        <li style="color:red">{{$message}}</li>
                                    @enderror
                                    <td><input type="text" name="password" id="" placeholder="Пароль" class="form form-control"></td>
                                    @error('password')
                                        <li style="color:red">{{$message}}</li>
                                    @enderror
                                    <td><input type="submit" value="Добавить" class="btn btn-primary"></td>
                                </tr>
                            </thead>
                            </form>
                        </table>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Фото</th>
                                    <th scope="col">Фамилия</th>
                                    <th scope="col">Имя</th>
                                    <th scope="col">Телефон</th>
                                    <th scope="col">Локация</th>
                                    <th scope="col">Логин</th>
                                    <th scope="col">Пароль</th>
                                    <th scope="col">Изменить</th>
                                    <th scope="col">Удалить</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <td><img alt="image" src="assets/img/users/{{$user->photo}}" width="55" class="rounded-circle"></td>
                                    <td><input type="text" name="surname" id="" value="{{$user->surname}}" class="form form-control"></td>
                                    <td><input type="text" name="name" id="" value="{{$user->name}}" class="form form-control"></td>
                                    <td><input type="text" name="phone" id="" value="{{$user->phone}}" class="form form-control"></td>
                                    <td><input type="text" name="location" id="" value="{{$user->location}}" class="form form-control"></td>
                                    <td><input type="text" name="login" id="" value="{{$user->login}}" class="form form-control"></td>
                                    <td><input type="text" name="password" id="" value="{{$user->password}}" class="form form-control"></td>
                                    <form action="{{Route('updateUser')}}" method="post">
                                 @csrf
                                    <td><input type="submit" value="Изменить" class="btn btn-warning"></td>
                                     </form>   
                                     <form action="{{Route('deleteUser')}}" method="Post">   
                                        @csrf               
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                    <td><input type="submit" value="Удалить" class="btn btn-danger"></td>
                                </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        {{$users->links()}}

                    </div>
                </div>
                
            </div>
    </div>
            </section>
             <!-- basic modal -->
        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Content goes here..
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
            <div class="settingSidebar">
                <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                </a>
                <div class="settingSidebar-body ps-container ps-theme-default">
                    <div class=" fade show active">
                        <div class="setting-panel-header">Setting Panel
                        </div>
                        <div class="p-15 border-bottom">
                            <h6 class="font-medium m-b-10">Select Layout</h6>
                            <div class="selectgroup layout-color w-50">
                                <label class="selectgroup-item">
                                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                                    <span class="selectgroup-button">Light</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                                    <span class="selectgroup-button">Dark</span>
                                </label>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <h6 class="font-medium m-b-10">Sidebar Color</h6>
                            <div class="selectgroup selectgroup-pills sidebar-color">
                                <label class="selectgroup-item">
                                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <h6 class="font-medium m-b-10">Color Theme</h6>
                            <div class="theme-setting-options">
                                <ul class="choose-theme list-unstyled mb-0">
                                    <li title="white" class="active">
                                        <div class="white"></div>
                                    </li>
                                    <li title="cyan">
                                        <div class="cyan"></div>
                                    </li>
                                    <li title="black">
                                        <div class="black"></div>
                                    </li>
                                    <li title="purple">
                                        <div class="purple"></div>
                                    </li>
                                    <li title="orange">
                                        <div class="orange"></div>
                                    </li>
                                    <li title="green">
                                        <div class="green"></div>
                                    </li>
                                    <li title="red">
                                        <div class="red"></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <div class="theme-setting-options">
                                <label class="m-b-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="mini_sidebar_setting">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="control-label p-l-10">Mini Sidebar</span>
                                </label>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <div class="theme-setting-options">
                                <label class="m-b-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="sticky_header_setting">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="control-label p-l-10">Sticky Header</span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                            <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                <i class="fas fa-undo"></i> Restore Default
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="main-footer">

            <div class="footer-right">
            </div>
        </footer>
    </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="{{ URL::asset('assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ URL::asset('assets/js/custom.js') }}"></script>
</body>


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->

</html>