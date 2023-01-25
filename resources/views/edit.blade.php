<div class="modal fade" id="editcharacter" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      {{ Form::open(['route' => 'edit/character', 'method' => 'post']) }}
        <div class="modal-header">
          <h6 class="mb-0">Name:</h6>
          <input class="form-control" placeholder="Name" id="nameedit" required name="name">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body row">
          <section class="col-12 col-md-4">
            <h6>Status:</h6>
            <input type="text" class="form-control" placeholder="Status" id="statusedit" required name="status">
          </section>
          <section class="col-12 col-md-4">
            <h6>Species:</h6>
            <input type="text" class="form-control" placeholder="Species" id="speciesedit" required name="species">
          </section>
          <section class="col-12 col-md-4">
            <h6>Image:</h6>
            <input type="text" class="form-control" placeholder="Image" id="imageedit" required name="image" onkeyup="validate_url(this)">
          </section>
          <section class="col-12 col-md-4 my-2">
            <h6 class="mb-0">Type:</h6>
            <input type="text" class="form-control" placeholder="Type" id="typeedit" required name="type">
          </section>
          <section class="col-12 col-md-4 my-2">
            <h6 class="mb-0">Gender:</h6>
            <input type="text" class="form-control" placeholder="Gender" id="genderedit" required name="gender">
          </section>
          <section class="col-12 col-md-4 my-2">
            <h6 class="mb-0">Origin Name:</h6>
            <input type="text" class="form-control" placeholder="Origin Name" id="name_originedit" required name="name_origin">
          </section>
          <section class="col-12 col-md-4 my-2">
            <h6 class="mb-0">Origin Url:</h6>
            <input type="text" class="form-control" placeholder="Origin Url" id="url_originedit" required name="url_origin" onkeyup="validate_url(this)">
          </section>
        </div>
        <div class="modal-footer row">
          <section class="col-12 text-center">
            <input type="hidden" name="id" id="idedit">
            <input type="hidden" name="api_id" id="api_idedit">
            <button class="btn btn-sm btn-success">Guardar</button>
          </section>
        </div>
      {{ Form::close() }}
    </div>
  </div>
</div>