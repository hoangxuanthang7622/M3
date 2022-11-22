<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('home')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('user.index')}}">
          <i class="bi bi-person"></i>
          <span>Nhân viên</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('product.index')}}">
          <i class="bi bi-question-circle"></i>
          <span>Sản phẩm</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('category.index')}}">
          <i class="bi bi-envelope"></i>
          <span>Danh mục sản phẩm</span>
        </a>
      </li><!-- End Contact Page Nav -->


    </ul>

  </aside>
