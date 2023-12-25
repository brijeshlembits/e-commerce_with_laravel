<?php $baseUrl = "http://localhost/e-commerce/public/";?>
<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{$baseUrl}}admin/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Brijesh Fotariya </h1>
            <p>Full Stack Developer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="{{route('redirect')}}"> <i class="icon-home"></i>Home </a></li>
                <li><a href="{{route('admin/user')}}"> <i class="icon-user"></i>Users </a></li>
                <li><a href="{{route('admin/category')}}"> <i class="fa fa-bar-chart"></i>Category </a></li>
                <li><a href="{{route('admin/product')}}"> <i class="icon-box"></i>Products </a></li>
                <li><a href="{{route('admin/orders')}}"> <i class="fa fa-shopping-cart"></i>Orders </a></li>
               
                <li><a href="login.html"> <i class="icon-logout"></i>Login page </a></li>
        </ul><span class="heading">Extras</span>
        <ul class="list-unstyled">
          <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
          <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
          <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
        </ul>
      </nav>