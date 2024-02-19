<x-authenticated-layout>
	
@if(auth()->user()->id_jenis_user==1)
	<button class="btn btn-secondary btn-add-menuUser mb-2"><i class="fa fa-plus fa-xs"></i> <i class="fa fa-user"></i></button>
	<br/>
	<img src="{{$menu->menu_icon ? asset('storage/'.$menu->menu_icon) : asset('icons/default-icon.png')}}" class="s-icon" alt="...">
	<strong class="icon-title">{{$menu->menu_name}}</strong>

	@if(count($subMenus)!=0)
	<div class="table-responsive-lg">
		<table class="table table-striped table-hover clone-data-table">
			 <thead>
			    <tr>
			        <!-- <th scope="col">#</th> -->
			        <th scope="col">ID</th>
			        <th scope="col">Level</th>
			        <th scope="col">Menu Name</th>
			        <th scope="col">Link</th>
			        <th scope="col">Icon</th>
			        <th scope="col">Parent ID</th>
			        <th scope="col" colspan="2">Actions</th>
			    </tr>
			</thead>
			<tbody class="table-group-divider">
			    @foreach($subMenus as $menu)
			    <tr>
			        <!-- <th scope="row">1</th> -->
			        <td>{{$menu->menu_id}}</td>
			        <td>{{$menu->menuLevel->level}}</td>
			        <td>{{$menu->menu_name}}</td>
			        <td><a href="/dashboard/menus/{{$menu->menu_id}}"><i class="fa fa-share-square"></i></a></td>
			        <td>
			        	<div class="card card-icon">
					        <img src="{{$menu->menu_icon ? asset('storage/'.$menu->menu_icon) : asset('icons/default-icon.png')}}" class="card-img-top s-icon" alt="...">
					    </div>
					</td>
			        <td>{{$menu->parent_id}}</td>
			        <td>
			            <button data-id="{{$menu->menu_id}}" class="btn-edit-menu btn btn-sm btn-link text-success">
			            	<i class="fa fa-edit"></i>
			            </button>
			        </td>
			        <td>
			            <button data-id="{{$menu->menu_id}}" class="btn-delete-menu btn btn-sm btn-link text-danger">
			            	<i class="fa fa-trash"></i>
			            </button>
			        </td>
			    </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
	<div class="d-flex">
		{{ $subMenus->links() }}
	</div>
	@else
	<h5 class="text-danger"><i class="fa fa-exclamation-triangle"></i> No Menu in {{$menu->menu_name}}</h5>
	@endif

	<i class="fa fa-users mt-5"></i>
	<strong class="icon-title">Users access</strong>
	@if(count($menuUsers)!=0)
	<div class="table-responsive-lg">
		<table class="table table-striped table-hover clone-data-table">
			<thead>
			    <tr>
			        <!-- <th scope="col">#</th> -->
			        <th scope="col">ID</th>
			        <th scope="col">Name</th>
			        <th scope="col">Username</th>
			        
			        <th scope="col" colspan="2">Actions</th>
			    </tr>
			</thead>
			<tbody class="table-group-divider">
			    @foreach($menuUsers as $menuUser)
			    <tr>
			        <!-- <th scope="row">1</th> -->
			        <td>{{$menuUser->no_setting}}</td>
			        <td>{{$menuUser->user->nama_user}}</td>
			        <td>{{$menuUser->user->username}}</td>
			        <td>
			            <button data-id="{{$menuUser->no_setting}}" class="btn-edit-menuUser btn btn-sm btn-link text-success">
							<i class="fa fa-edit"></i>
			            </button>
			        </td>
			        <td>
			            <button data-id="{{$menuUser->no_setting}}" class="btn-delete-menuUser btn btn-sm btn-link text-danger">
			            	<i class="fa fa-trash"></i>
			            </button>
			        </td>
			    </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
	<div class="d-flex">
		{{ $menuUsers->links() }}
	</div>
	@else
	<h5 class="text-danger"><i class="fa fa-exclamation-triangle"></i> No User can access {{$menu->menu_name}}</h5>
	@endif
	<x-modal/>
@else
	@if(count($subMenus)!=0)
		@foreach($subMenus as $subMenu)
			<h1>{{$subMenu->menu_name}}</h1>
		@endforeach
	@endif
@endif
</x-authenticated-layout>