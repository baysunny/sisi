<!-- <x-layout> -->

<form action="/dashboard/menu-levels" class="override form-floating mt-4" method="POST">
    @csrf
    <div class="override form-floating mb-3">
        <input type="text" class="form-control" id="floatingLevel" name="level" placeholder="Level">
        <label for="floatingLevel">Level</label>
        @error('level')
        <p class="text-danger px-1"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
        @enderror
    </div>

    <input type="text" class="d-none" name="created_by" value="{{auth()->user()->username}}">
    <button type="submit" class="btn btn-primary" onclick="submitForm(this);">Add</button>
</form>

<!-- </x-layout> -->