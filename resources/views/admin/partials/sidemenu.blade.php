<aside class="main-sidebar"> 
    <!-- sidebar -->
    <div class="sidebar"> 
      <!-- Sidebar user panel -->
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree" style="text-transform: capitalize;">
        @if($modules) 
          @foreach ($modules as $module)
          <li class="treeview"> <a href="#"> <i class="fa-light {{ $module->icon }}"></i> <span>{{ $module->module}}</span> <span class="pull-right-container"> <i class="fa-light fa-angle-left pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              @foreach ($submodules as $submodule)
              @if($module->id == $submodule->mod_id)
              <li><a href="{{route($submodule->link)}}"><i class="fa-light fa-angle-right"></i> {{$submodule->submodule}}</a></li>
              @endif
              @endforeach
            </ul>
          </li>
          @endforeach
        @endif
      </ul>
    </div>
    <!-- /.sidebar --> 
  </aside>