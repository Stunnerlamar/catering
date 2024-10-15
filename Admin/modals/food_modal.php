 <!-- Edit Food Modal -->


<div class="modal fade" id="editFoodModal" tabindex="-1" role="dialog" aria-labelledby="editFoodModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editFoodModalLabel">Edit Food</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editFoodForm" action="./query/update_food.php" method="post">
            <div class="form-group">
                <label for="editFoodName">Food Name</label>
                <input type="text" class="form-control" id="editFoodName" name="editFoodName" placeholder="Enter food name">
            </div>
            <div class="form-group">
                <label for="editFoodStars">Stars</label>
                <input type="number" class="form-control" id="editFoodStars" name="editFoodStars" min="0" max="5" step="0.1" placeholder="Enter stars">
            </div>
            <div class="form-group">
                <label for="editFoodPrice">Price</label>
                <input type="text" class="form-control" id="editFoodPrice" name="editFoodPrice" placeholder="Enter price">
            </div>
            <div class="form-group">
                <label for="editFoodRestaurant">Restaurant</label>
                <input type="text" class="form-control" id="editFoodRestaurant" name="editFoodRestaurant" placeholder="Enter restaurant">
            </div>
        </form>
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Food Modal -->
<div class="modal fade" id="deleteFoodModal" tabindex="-1" role="dialog" aria-labelledby="deleteFoodModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteFoodModalLabel">Delete Food</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this food item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        
        
        <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
      </div>
    </div>
  </div>
</div>