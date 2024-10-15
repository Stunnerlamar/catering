

<div class="modal fade" id="editOrderModal" tabindex="-1" aria-labelledby="editOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="editOrderModalLabel"><b>Edit Order</b></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for editing order details -->
                <form id="editOrderForm"  action="./query/update_order.php" method="post">
                    <div class="form-group">
                        <label for="editOrderID">Order ID</label>
                        <input type="text" id="editOrderID" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editUserID">User ID</label>
                        <input type="text" id="editUserID" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="editOrderDate">Order Date</label>
                        <input type="date" id="editOrderDate" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="editStatus">Status</label>
                        <select id="editStatus" class="form-control">
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                            <!-- Add more options if needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editName">Name</label>
                        <input type="text" id="editName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="editPhoneNumber">Phone Number</label>
                        <input type="tel" id="editPhoneNumber" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="editFoodName">Food Name</label>
                        <input type="text" id="editFoodName" class="form-control">
                    </div>
                    <!-- Add more fields for editing other details such as extra food, quantity, delivery datetime, venue, message, etc. -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary px-4 py-3" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Delete Order Modal -->
<div class="modal fade" id="deleteOrderModal" tabindex="-1" aria-labelledby="deleteOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteOrderModalLabel">Delete Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this order?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href='#' type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</a>
            </div>
        </div>
    </div>
</div>