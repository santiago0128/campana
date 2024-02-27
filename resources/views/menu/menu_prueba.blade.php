<style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

    :root {
        --header-height: 3rem;
        --nav-width: 100px;
        --first-color: #c0c0c0;
        --first-color-light: #111111;
        --white-color: #1a4d3e;
        --body-font: 'Nunito', sans-serif;
        --normal-font-size: 1rem;
        --z-fixed: 100
    }

    *,
    ::before,
    ::after {
        box-sizing: border-box
    }

    body {
        position: relative;
        margin: var(--header-height) 0 0 0;
        padding: 0 1rem;
        font-family: var(--body-font);
        font-size: var(--normal-font-size);
        transition: .5s
    }

    a {
        text-decoration: none
    }

    .header {
        width: 100%;
        height: var(--header-height);
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1rem;
        transition: .5s
    }

    .header_toggle {
        color: var(--first-color);
        font-size: 1.5rem;
        cursor: pointer
    }

    .header_img {
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        border-radius: 50%;
        overflow: hidden
    }

    .header_img img {
        width: 40px
    }

    .l-navbar {
        position: fixed;
        top: 0;
        left: -30%;
        width: var(--nav-width);
        height: 100vh;
        background-color: var(--first-color);
        padding: .5rem 1rem 0 0;
        transition: .5s;
        z-index: var(--z-fixed)
    }

    .nav_menu {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden
    }

    .nav_logo,
    .nav_link {
        display: grid;
        grid-template-columns: max-content max-content;
        align-items: center;
        column-gap: 1rem;
        padding: .5rem 0 .5rem 2rem
    }

    .nav_logo {
        margin-bottom: 1rem
    }

    .nav_logo-icon {
        font-size: 1.15rem;
        color: var(--white-color)
    }

    .nav_logo-name {
        color: var(--white-color);
        font-weight: 700
    }

    .nav_link {
        position: relative;
        color: var(--first-color-light);
        margin-bottom: 1.5rem;
        transition: .3s
    }

    .nav_link:hover {
        color: var(--white-color)
    }

    .nav_icon {
        font-size: 1.25rem
    }

    .show_navbar {
        left: 0
    }

    .body-pd {
        padding-left: calc(var(--nav-width) + 1rem)
    }

    .active {
        color: var(--white-color)
    }

    .active::before {
        content: '';
        position: absolute;
        left: 0;
        width: 2px;
        height: 32px;
        background-color: var(--white-color)
    }

    .background_section {
        background-color: #EFEDED;
        padding: 10px;
        border-radius: 10px;
    }

    .height-100 {
        height: 100vh
    }

    .nav_name {
        padding-left: 20px;
        font-size: 20px;
    }

    .action {
        position: fixed;
        top: 20px;
        right: 30px;
    }

    .action2 {
        position: fixed;
        top: 20px;
        left: 20%;
        z-index: 1;

    }

    .action .profile {
        position: relative;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
    }

    .action .profile img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .action .menu {
        position: absolute;
        top: 120px;
        right: -10px;
        padding: 10px 10px;
        background: #c0c0c0;
        width: 250px;
        box-sizing: 0 5px 25px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        transition: 0.5s;
        visibility: hidden;
        opacity: 0;
    }

    .action2 .report {
        position: absolute;
        top: 120px;
        padding: 10px;
        background: #c0c0c0;
        width: 1200px;
        border-radius: 15px;
        transition: 0.5s;
        visibility: hidden;
        opacity: 0;
    }

    .action .menu.active {
        top: 50px;
        visibility: visible;
        opacity: 1;
    }

    .action2 .report.active {
        top: 50px;
        visibility: visible;
        opacity: 1;
    }



    .action .menu h3 {
        width: 100%;
        text-align: center;
        font-size: 18px;
        padding: 20px 0;
        font-weight: 500;
        color: #555;
        line-height: 1.5em;
    }

    .action2 .report h3 {
        width: 100%;
        text-align: center;
        font-size: 18px;
        padding: 20px 0;
        font-weight: 500;
        color: #555;
        line-height: 1.5em;
    }

    .action .menu h3 span {
        font-size: 14px;
        color: #cecece;
        font-weight: 300;
    }

    .action .menu ul li {
        list-style: none;
        padding: 16px 0;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: center;
    }

    .action .menu ul li img {
        max-width: 20px;
        margin-right: 10px;
        opacity: 0.5;
        transition: 0.5s;
    }

    .action .menu ul li:hover img {
        opacity: 1;
    }

    .action .menu ul li a {
        display: inline-block;
        text-decoration: none;
        color: #555;
        font-weight: 500;
        transition: 0.5s;
    }

    .action .menu ul li:hover a {
        color: gray;
    }

    .circle {
        width: 15px;
        height: 15px;
        border-radius: 50%;
        margin-bottom: 20px;
    }

    .circle_alert {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        margin-bottom: 20px;
    }

    .icon_prod {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        margin-bottom: 20px;
    }

    .green {
        background-color: green;
    }

    .red {
        background-color: red;
    }

    .yellow {
        background-color: #FACC2E;
    }

    .menu_content {
        background-color: #fff;
        border-radius: 5px;
        padding: 1px;
    }

    .report_content {
        background-color: #fff;
        border-radius: 5px;
        padding: 1px;
    }

    .circle-with-text {
        display: inline-block;
        vertical-align: top;
        margin-right: 20px;
    }

    .square {
        width: 130px;
        height: 35px;
        border: 2px solid #c0c0c0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 20px;
    }

    @media screen and (min-width: 768px) {
        body {
            margin: calc(var(--header-height) + 1rem) 0 0 0;
            padding-left: calc(var(--nav-width) + 2rem)
        }

        .header {
            height: calc(var(--header-height) + 1rem);
            padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
        }

        .header_img {
            width: 40px;
            height: 40px
        }

        .header_img img {
            width: 45px
        }

        .l-navbar {
            left: 0;
            padding: 1rem 1rem 0 0
        }

        .show_navbar {
            width: calc(var(--nav-width) + 156px)
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 188px)
        }
    }
</style>

<body id="body-pd">
    <div id="menu">
        <header class="header" id="header" style="background-color: #fff; z-index: 1;">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i></div>
            <div class="action row">
                <div style="width: 50px;"></div>
                <div v-if="data.rol == 1" class="icon_prod">
                    <a @click="reportToggle()">
                        <i class='bx bxs-bell-ring bx-md' style="color: #c0c0c0;"></i>
                    </a>
                </div>
                <div style="width: 50px;"></div>
                <div v-if="data.estado == 1" class="circle_alert green"></div>
                <div v-if="data.estado == 2" class="circle_alert red"></div>
                <div v-if="data.estado == 3" class="circle_alert yellow"></div>
                &nbsp;
                <div class="square">
                    <span v-if="data.estado == 1">Disponible</span>
                    <span v-if="data.estado == 2">No Disponible</span>
                    <span v-if="data.estado == 3">Espera</span>
                </div>
                <div style="width: 50px;"></div>
                <div class="profile col-6" @click="menuToggle();">
                    <img src="{{ asset('img/user.png')}}" style="width: 35px; height: 35px;" />
                </div>
                <div class="menu">
                    <div class="menu_content">
                        <div class="row">
                            <div class="col-2" style="display: inline;">
                                <div class="circle green"></div>
                            </div>
                            <div class="col-10" style="text-align: center;">
                                <a style="cursor: pointer" @click="estado('1')"><span>Disponible</span></a>
                            </div>
                            <div class="col-2">
                                <div class="circle red"></div>
                            </div>
                            <div class="col-10" style="text-align: center;">
                                <a style="cursor: pointer" @click="estado('2')"><span>No Disponible</span></a>
                            </div>
                            <div class="col-2">
                                <div class="circle yellow"></div>
                            </div>
                            <div class="col-10" style="text-align: center;">
                                <a style="cursor: pointer" @click="estado('3')"><span>Espera</span></a>
                            </div>
                            <div class="col-2">
                                <div class="circle yellow"></div>
                            </div>
                            <div class="col-10" style="text-align: center;">
                                <a style="cursor: pointer" @click="estado('4')"><span>Baño</span></a>
                            </div>
                            <div class="col-2">
                                <div class="circle yellow"></div>
                            </div>
                            <div class="col-10" style="text-align: center;">
                                <a style="cursor: pointer" @click="estado('5')"><span>Capacitacion</span></a>
                            </div>
                            <div class="col-2">
                                <div class="circle yellow"></div>
                            </div>
                            <div class="col-10" style="text-align: center;">
                                <a style="cursor: pointer" @click="estado('6')"><span>Retroalimentación</span></a>
                            </div>
                            <div class="col-2">
                                <div class="circle yellow"></div>
                            </div>
                            <div class="col-10" style="text-align: center;">
                                <a style="cursor: pointer" @click="estado('7')"><span>Almuerzo</span></a>
                            </div>
                            <div class="col-2">
                                <div class="circle yellow"></div>
                            </div>
                            <div class="col-10" style="text-align: center;">
                                <a style="cursor: pointer" @click="estado('8')"><span>Preturno</span></a>
                            </div>
                            <div class="col-2">
                                <div class="circle yellow"></div>
                            </div>
                            <div class="col-10" style="text-align: center;">
                                <a style="cursor: pointer" @click="estado('8')"><span>Proceso de Venta</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav_menu">
                <div>
                    <a href="{{ url('/') }}" class="nav_logo"><img style="width: 120px; " src="{{ asset('img/xion.png')}}" alt="Mplify Logo" class="img-responsive logo">
                        <div class="nav_list">
                            <a href="{{ url('/?idUsuario='.session('idUsuario'))}}" class="nav_link active">
                                <i class='bx bx-grid-alt nav_icon'></i><span class="nav_name">Inicio</span>
                            </a>
                            <a type="button" href="{{url('/portafolio?procesos')}}" class="nav_link">
                                <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Procesos</span>
                            </a>
                            <a href="{{url('/gestion?calendario')}}" class="nav_link">
                                <i class='bx bx-calendar nav_icon'></i><span class="nav_name">Agenda</span>
                            </a>
                            <a href="{{url('/gestion?tareas')}}" class="nav_link">
                                <i class='bx bx-message-square-detail nav_icon'></i><span class="nav_name">Gestion</span>
                            </a>
                            <a href="{{url('/administracion?gestion')}}" class="nav_link">
                                <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Administracion</span>
                            </a>
                            <a href="{{url('/reportes?reportes')}}" class="nav_link">
                                <i class='bx bx-bar-chart-alt-2 nav_icon'></i><span class="nav_name">Reportes</span>
                            </a>
                        </div>
                </div>
                <div>
                    <a class="nav_link" @click="salirCampana()">
                        <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Salir</span>
                    </a>
                </div>
            </nav>
        </div>
        <div class="action2">
            <div class="report">
                <div class="report_content">
                    <div class=" text-center">
                        <h4>Ranking de productividad</h4>
                    </div>
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Cantidad Gestion</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for=" item in ranking">
                                    <td>@{{item.login}}</td>
                                    <td>@{{item.count}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script>
    var app = new Vue({
        el: '#menu',
        data: {
            data: {},
            ranking: {},
        },
        mounted() {
            this.getData()
            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)

                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        nav.classList.toggle('show_navbar')
                        toggle.classList.toggle('bx-x')
                        bodypd.classList.toggle('body-pd')
                        headerpd.classList.toggle('body-pd')
                    })
                }
            }
            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')
            const linkColor = document.querySelectorAll('.nav_link')

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink))
            setInterval(() => {
                this.getRanking();
            }, 50000);
        },
        methods: {
            binding(data) {
                this.data = data
            },
            async getData() {

                const response = await fetch("/getDataUsuarios", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Content-Type": "application/json",
                    },
                });
                const data = await response.json();
                this.binding(data[0]);
            },
            async estado(item) {

                fetch("/updateEstadoUsuarios?estado=" + item, {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Content-Type": "application/json",
                    },
                });
                this.getData()
                location.reload()
            },
            menuToggle() {
                const toggleMenu = document.querySelector(".menu");
                toggleMenu.classList.toggle("active");
            },
            reportToggle() {
                const toggleReport = document.querySelector(".report");
                toggleReport.classList.toggle("active");
            },
            async getRanking() {
                const response = await fetch("/getranking");
                const data = await response.json();
                this.ranking = data;
            },
            async salirCampana() {
                const response = await fetch("/salirCampana");
                const data = await response.json();
                if (response.status == 200) {
                    window.close()
                }
            }
        }
    });
</script>