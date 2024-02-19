<table class="table table-striped table-hover clone-data-table">
  	<thead>
	    <tr>
	        @foreach($headers as $header)
	        <th scope="col">{{$header}}</th>
	        @endforeach
	    </tr>
	</thead>
	<tbody>
	    @foreach($menus as $menu)
	    <tr>
	        <!-- <th scope="row">1</th> -->
	        <td>{{$menu->menu_id}}</td>
	        <td>{{$menu->menuLevel->level}}</td>
	        <td>{{$menu->menu_name}}</td>
	        <td>{{$menu->menu_link}}</td>
	        <td>{{$menu->menu_icon}}</td>
	        <td>{{$menu->parent_id}}</td>
	        <td>
	            <button data-id="{{$menu->menu_id}}" class="btn-edit-menu btn btn-sm btn-link text-success">Edit</button>
	        </td>
	        <td>
	            <button data-id="{{$menu->menu_id}}" class="btn-delete-menu btn btn-sm btn-link text-danger">Delete</button>
	        </td>
	    </tr>
	    @endforeach
	</tbody>

</table>