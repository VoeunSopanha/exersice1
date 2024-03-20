
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Product Registration</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  method="post">
            <input type="hidden" id="id" name="_id">
            <label for="name">Name</label>
            <input id="name"  type="text" name="_name" class="form-control">
            <label for="name">Categories</label>
            <select id="category" name="_category" class="form-select" >
                <option value=""></option>

                <option value="Drink">Drink</option>
                <option value="Clothes">Clothes</option>
                <option value="Accessories">Accessories</option>
                <option value="Eatery">Eatery</option>
            </select>
            <label for="name">Price</label>
            <input id="price" type="text" name="_price" class="form-control">
      </div>
            <div class="modal-footer">
                <button name="btn_cancel" type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <input id="accept_add" name="btn_add"  value="Add" type="submit" class="btn btn-success"/>
                <button id="accept_update" type="submit" name="btn_update" class="btn btn-warning">Edit</button>
            </div>
        </form>
    </div>
  </div>
</div>
