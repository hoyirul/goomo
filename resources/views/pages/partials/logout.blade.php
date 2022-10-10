<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content rad-8">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/logout" method="post">
        @csrf
        <div class="modal-body text-center fs-normal">
          Are you sure want to logout?
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger rad-8 fs-normal">Logout</button>
        </div>
      </form>
    </div>
  </div>
</div>