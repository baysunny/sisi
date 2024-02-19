<x-authenticated-layout>
	@if(auth()->user()->id_jenis_user == 1)
		<button class="btn-add-menuLevel btn btn-secondary"><i class="fa fa-add"></i>  Add Menu Level</button>


		@if(count($menuLevels)!=0)
		<div class="table-responsive-lg">
			<table class="table table-striped table-hover clone-data-table">
			  	<thead>
			    	<tr>
				      	<th scope="col">ID</th>
				      	<th scope="col">Level</th>
				      	<th scope="col">Menu</th>
				      	<th scope="col" colspan="2">Actions</th>
			    	</tr>
			  	</thead>
			  	<tbody class="table-group-divider">
			  		@foreach($menuLevels as $menuLevel)
			    	<tr>
				      	<td>{{$menuLevel->id_level}}</td>
				      	<td>{{$menuLevel->level}}</td>
				      	<td>{{count($menuLevel->menus)}}</td>
				      	<td>
				      		<button data-id="{{$menuLevel->id_level}}" class="btn-edit-menuLevel btn btn-sm btn-link text-success">
				      			<i class="fa fa-edit"></i>
				      		</button>
				      	</td>
				      	<td>
				      		<button data-id="{{$menuLevel->id_level}}" class="btn-delete-menuLevel btn btn-sm btn-link text-danger">
				      			<i class="fa fa-trash"></i>
				      		</button>
			           	</td>
				    </tr>
				@endforeach
			  	</tbody>
			</table>
		</div>
		<div class="d-flex">
			{{ $menuLevels->links() }}
		</div>
		<x-modal/>
		@else
		<h1>
			There is no menu level
		</h1>
		@endif
	@endif
	
	<x-modal/>
</x-authenticated-layout>