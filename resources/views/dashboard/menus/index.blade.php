<x-authenticated-layout>
	@if(auth()->user()->id_jenis_user == 1)
		<button class="btn-add-menu btn btn-secondary"><i class="fa fa-add"></i>  Add Menu</button>
		@if(count($menus)!=0)
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
				    @foreach($menus as $menu)
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
			{{ $menus->links() }}
		</div>
		<x-modal/>
		@else
		<h1>
			There is no menu
		</h1>
		@endif
	@endif
	
	<x-modal/>
</x-authenticated-layout>