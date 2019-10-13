<nav class="app-nav">
    <a href="dashboard.html" class="app-nav__item {{ MenuHelper::marcaModulo(['dashboard']) }}"><i class="fas fa-home"></i>Inicio</a>
    <a href="{{ route('clientes.listar') }}" class="app-nav__item {{ MenuHelper::marcaModulo(['clientes']) }}"><i class="fas fa-users"></i>Clientes</a>
    <a href="{{ route('agendamentos.listar') }}" class="app-nav__item {{ MenuHelper::marcaModulo(['agendamentos']) }}"><i class="fas fa-calendar-alt"></i>Agenda</a>
    <a href="notifications.html" class="app-nav__item {{ MenuHelper::marcaModulo(['notificacoes']) }}"><i class="fas fa-bell"><span class="app-nav__item-new">2</span></i>Notificações</a>
    <a href="profile.html" class="app-nav__item {{ MenuHelper::marcaModulo(['perfil']) }}"><i class="fas fa-user"></i>Perfil</a>
</nav>

<!-- Script Project -->
<script src="{{ asset('ferrugine/dist/js/alldep.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('ferrugine/dist/js/scripts.js') }}" crossorigin="anonymous"></script>
</body>
</html>
