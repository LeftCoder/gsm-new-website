<nav class="navbar navbar-expand-xl">
  <div class="half-circle">
    <a class="navbar-brand" href="/">
      <img src="{{ asset('images/main-logo.png') }}" alt="Logo">
    </a>
  </div>
  <button 
    class="navbar-toggler" 
    type="button" 
    data-toggle="collapse" 
    data-target="#navbarNavAltMarkup" 
    aria-controls="navbarNavAltMarkup" 
    aria-expanded="false" 
    aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
  </button>
  <a class="hidden-logo-link" href="/"><div class="hidden-logo"></div></a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
       <div class="left-side">
          <a class="nav-item nav-link" href="/aktualnosci">Aktualności</a>
          <a class="nav-item nav-link" href="/nasze-sklepy">Nasze sklepy</a>
          <a class="nav-item nav-link" href="/galeria">Galeria</a>
        </div>
        <div class="right-side">
          <a class="nav-item nav-link" href="/serwis">Serwis</a>
          <a class="nav-item nav-link" href="/sprzedaj-smartfona">Sprzedaj Smartfona</a>
          <span class="nav-item nav-link"><contact-button modal-name="navbar-modal"></contact-button></span>
        </div>
      </div>
  </div>
</nav>
