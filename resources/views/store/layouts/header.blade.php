<nav class="navbar navbar-expand-lg menu-header">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}"><img src="{{url('assets/imgs/logo-especializati.png')}}" alt="Loja Virtual com pag seguro" class="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
            <a class="nav-link" href="{{route('cart.list')}}">Carrinho<i class="bi bi-cart-fill"></i> <span class="badge bg-secondary">@if(isset( $totalCarrinho)) {{ $totalCarrinho}}  @endif</span> </a>
          </li>
          <li class="nav-item dropdown">
            @if(auth()->check())
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{auth()->user()->name}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{route('profile')}}">Meu Perfil</a></li>
              <li><a class="dropdown-item" href="{{route('password')}}">Minha Senha</a></li>
              <li><a class="dropdown-item" href="#">Meu Pedido</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{route('logout')}}">Sair</a></li>
            </ul>
            @else
            <li>
              <a class="log" href="{{route('login')}}" >Login</a>
            </li>
            @endif
          </li>
        </ul>
      </div>
    </div>
</nav>
