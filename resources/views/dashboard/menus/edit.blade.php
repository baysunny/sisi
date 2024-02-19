<form action="/dashboard/menus/{{$menu->menu_id}}" class="override form-floating mt-4" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="override form-floating mb-3">
        <input type="text" class="form-control" id="floatingName" name="menu_name" value="{{ $menu->menu_name }}" placeholder="Enter menu name">
        <label for="floatingName">Name</label>
        @error('menu_name')
            <p class="text-danger px-1"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
        @enderror
    </div>

    <div class="override form-floating mb-3">
        <select name="id_level" class="form-select" id="id_level" placeholder="Select menu level">
            @foreach($menuLevels as $menuLevel)
                <option value="{{ $menuLevel->id_level }}" {{ $menuLevel->id_level === $menu->id_level ? 'selected' : '' }}>
                    {{ $menuLevel->level }}
                </option>
            @endforeach
        </select>
        <label for="id_level">Level</label>
        @error('id_level')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    
    <div class="override form-floating mb-3">
        <input type="text" class="form-control" id="floatingLink" name="menu_link" value="{{ $menu->menu_link }}" placeholder="Enter menu link">
        <label for="floatingLink">Link</label>
        @error('menu_link')
            <p class="text-danger px-1"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
        @enderror
    </div>

    <div class="card" style="width: 4rem; height: 4rem;">
        <img id="iconPreview"  src="{{$menu->menu_icon ? asset('storage/'.$menu->menu_icon) : asset('icons/default-icon.png')}}" class="card-img-top s-icon-preview" alt="...">
    </div>
    <div class="override form-floating mb-3">
        <input type="file" class="form-control " id="floatingIcon" name="menu_icon" placeholder="Choose menu icon" value="{{old('menu_icon')}}" accept="image/*">
        <label for="floatingIcon">Icon</label>
        @error('menu_icon')
        <p class="text-danger px-1"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
        @enderror
    </div>

    <div class="override form-floating mb-3">
        <select name="parent_id" class="form-select" id="floatingParent" placeholder="Select parent menu">
            <option value="0">Main Menu(Menu Utama)</option>
            @foreach($menus as $parentMenu)
                <option value="{{ $parentMenu->menu_id }}" {{ $parentMenu->menu_id === $menu->parent_id ? 'selected' : '' }}>
                    {{ $parentMenu->menu_name }}
                </option>
            @endforeach
        </select>
        <label for="floatingParent">Parent ID</label>
        @error('menu_name')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <input type="text" class="d-none" name="updated_by" value="{{auth()->user()->username}}">
    <button type="submit" class="btn btn-success" onclick="submitForm(this);">Update</button>
</form>
