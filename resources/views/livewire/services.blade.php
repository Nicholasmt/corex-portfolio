<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="card-body">
        <h4 class="text-center">Manage Services</h4>
         <div class="table-responsive mt-3">
            <table class="table table-dark table-hover">
                <div class="float-end mt-3">
                    <button type="button" class="btn btn-light mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <i class="bi bi-plus"></i>
                    </button>
                 </div>
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Descriptions</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                </tbody>
              </table>
        </div>
           <!-- Modal -->
            <div class="modal  fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Add New Services</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <div class="form-group">
                        <label for="title" class="text-black">Title </label>
                        <input type="text" wire:model="title" class="form-control">
                     </div>
                     <div class="form-group mt-2">
                        <label for="descriptions" class="text-black">Descriptions</label>
                        <input type="text" wire:model="descriptions" class="form-control">
                     </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
                </div>
            </div>
      </div>
</div>
