<ul>
  <li class="menu-item {{ (request()->is('home')) ? 'active' : '' }}">
    <a href="/home"><i class="fas fa-home"></i>&nbsp;Home</a>
  </li>
  <li class="menu-item {{ (request()->is('posts*')) ? 'active' : '' }}">
    <a href="/posts"><i class="fas fa-address-card"></i>&nbsp;Posty</a>
  </li>
  <li class="menu-item {{ (request()->is('shops*')) ? 'active' : '' }}">
    <a href="/shops"><i class="fas fa-map-marker-alt"></i>&nbsp;Lista punktów</a>
  </li>
  <li class="menu-item {{ (request()->is('gallery*')) ? 'active' : '' }}">
    <a href="/gallery"><i class="fas fa-images"></i>&nbsp;Galeria</a>
  </li>
</ul>