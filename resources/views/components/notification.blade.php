@if(session()->has('message'))
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header bg-info">
      <!-- <img src="..." class="rounded me-2" alt="..."> -->
      <strong class="me-auto bg-info">Notification</strong>
      <small>0 seconds ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      <strong>{{session('message')}}</strong>
    </div>
  </div>
</div>
@endif

@if(session()->has('error'))
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header bg-danger">
      <!-- <img src="..." class="rounded me-2" alt="..."> -->
      <strong class="me-auto">Notification</strong>
      <small>0 seconds ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      {{session('error')}}
    </div>
  </div>
</div>
@endif