<div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
        <a href="{{route('admin.index')}}" class="simple-text">
            <h4>{{\Illuminate\Support\Facades\Auth::user()->name}}</h4>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="active">
                <a href="{{route('admin.index')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin.yayinevi.index')}}">
                    <i class="material-icons">person</i>
                    <p>Yayın Evleri</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin.yazar.index')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Yazarlar</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin.kitaplar.index')}}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Kitaplar</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin.kategoriler.index')}}">
                    <i class="material-icons">library_books</i>
                    <p>Kategoriler</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin.slider.index')}}">
                    <i class="material-icons">location_on</i>
                    <p>Slider</p>
                </a>
            </li>
            <li>
                <a href="./notifications.html">
                    <i class="material-icons text-gray">notifications</i>
                    <p>Notifications</p>
                </a>
            </li>
            <li>
                <a href="upgrade.html">
                    <i class="material-icons">person</i>
                    @auth
                        <div class="box">
                            <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{route('logout')}}">Çıkış Yap</a>
                            <form action="{{route('logout')}}" id="logout-form" method="POST">
                                @csrf
                            </form>
                        </div>
                    @endauth
                </a>
            </li>


        </ul>
    </div>
</div>
