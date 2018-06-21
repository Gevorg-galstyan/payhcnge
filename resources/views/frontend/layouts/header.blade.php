<header>
    <div class="container">
        <div class="row align-items-center header-mob">
            <div class="col ">
                <div class="row">
                    <div class="col-lg-6 top-menu-contacts px-0">
                        <a href="tel:+37499444408"><span class="tel"><i class="fas fa-mobile-alt"></i></span> &nbsp;
                            <span>{{$contacts->where('name', 'mobile')->first()->value}}</span></a>

                    </div>
                    <div class="col-lg-6 top-menu-contacts pl-0">
                        <a href="viber://add?number=37499444408"><span class="tel"><i class="fab fa-viber"></i></span>
                            &nbsp; <span>{{$contacts->where('name', 'viber')->first()->value}}</span></a>
                    </div>
                </div>


            </div>
            <div class="col text-center">
                <ul class="head-soc">
                    <li><span class="soc "><i class="fab fa-facebook-f"></i></span></li>
                    <li><span class="soc "><i class="fab fa-skype"></i></span></li>
                    <li><span class="soc "><i class="fab fa-instagram"></i></span></li>
                    <li><span class="soc "><i class="fab fa-vk"></i></span></li>
                </ul>
            </div>
            <div class="col-sm text-right">
                <button class="btn btn-sign " type="button" id="dropdownMenu3"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{$translations->where('key', (setting('site.active') ? 'admin_activ' : 'admin_inactive'))->first()->translate()->name}}
                    </button>

            </div>
        </div>
    </div>
</header>