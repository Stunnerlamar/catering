
<style>

form input[type='text'], form select, form input[type='password']{
    height: 80px;
    font-size: 22px;
    display: block;
    box-shadow: 0px 2px 2px 2px rgb(163, 168, 244);
    border: none;
}


form label{
    font-weight: 600;
    font-size: 22px;
}
</style>
<!-- Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Shipment and payment method form -->
                <form id="checkoutForm" action="mpesa_push.php" method="post">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter your address" required>
                    </div>
                    <div class="form-group">
                        <label for="mpesaNumber">M-Pesa Number</label>
                        <input type="text" class="form-control" id="mpesaNumber" name="number" placeholder="Enter your M-Pesa number" required>
                    </div>
                    <div class="form-group">
                        <label for="zipCode">Zip Code</label>
                        <input type="text" class="form-control" id="zipCode" placeholder="Enter your zip code" required>
                    </div>

                    <input type="text" name="amount" id="" value="<?php echo $_SESSION['total_price']; ?>" hidden>
                    <h2 class="text-primary">Amount: $<?php echo $_SESSION['total_price']; ?></h2>
                    <button type="submit" class="btn btn-primary px-5">Submit</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary px-5" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Congrats Modal -->
<div class="modal fade" id="congratsModal" tabindex="-1" role="dialog" aria-labelledby="congratsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="congratsModalLabel">Congratulations!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Your order has been successfully placed. Thank you for shopping with us!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




<!-- Delete Account Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAccountModalLabel">Delete Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete your account? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete Account</button>
            </div>
        </div>
    </div>
</div>