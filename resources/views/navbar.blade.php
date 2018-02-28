<div class="card" style="width: 20rem; background-color: black">
    <div class="card-body">
        <nav class="nav flex-column navbar-dark bg-dark pr-5 pb-5 pl-4 position-relative h-100">

            <img class="card-img" src="https://pbs.twimg.com/profile_images/1656812200/gestigym_400x400.png" alt="Card image cap">

            <div class="text-center" style="padding-top: 2%">
                <button class="btn-lg w-100" type="button">
                    <a class="nav-link disabled" href="/">
                        <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/home-7.png" width="30" height="30" alt=""></span>
                        Inicio
                    </a>
                </button>
            </div>

            <div class="text-center" style="padding-top: 2%">
                <button class="btn-lg w-100" type="button">
                    <a class="nav-link disabled" href="{{route('user.perfil', array('user' => Auth::user()->username))}}">
                        <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
                        Perfil
                    </a>
                </button>
            </div>

            <div class="text-center" style="padding-top: 2%">
                <button class="btn-lg w-100" type="button">
                    <a class="nav-link disabled" href="{{route('gimnasios.show', array('user' => Auth::user()->username))}}">
                        <span class="button-group-addon" ><img src="https://image.flaticon.com/icons/svg/34/34907.svg" width="30" height="30" alt=""></span>
                        Gimnasios
                    </a>
                </button>
            </div>
            <div class="dropdown-divider"></div>
            <a class="nav-link" href="#">Salir</a>
        </nav>
    </div>
</div>