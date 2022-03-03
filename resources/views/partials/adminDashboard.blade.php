<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-4">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active ps-0" href="{{route('admin.home')}}">
            <i class="bi bi-house-door"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link ps-0" href="{{route('admin.posts.index')}}">  
            <i class="bi bi-file-earmark"></i> Tutti i post
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link ps-0" href="{{route('admin.my_posts.index')}}">  
            <i class="bi bi-file-earmark-arrow-up"></i> I miei post
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link ps-0" href="{{route('admin.users.index')}}">  
            <i class="bi bi-people"></i> Utenti
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link ps-0" href="{{route('admin.categories.index')}}">
            <i class="bi bi-layers"></i> Categorie
          </a>
        </li>
      </ul>

   </div>
</nav>