
    <div class="col-lg-4">
        <form class="mb-3" action="">
            <div class="input-group">
                <input type="text" class="form-control p-4" placeholder="Coupon Code">
                <div class="input-group-append">
                    <button class="btn btn-primary">Apply Coupon</button>
                </div>
            </div>
        </form>
        <div class="card border-secondary mb-5">
            <div class="card-header bg-secondary border-0">
                <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3 pt-1">
                    <h6 class="font-weight-medium">Subtotal</h6>
                    <h6 class="font-weight-medium">Rp{{ number_format($subtotal) }}</h6>
                </div>
                <div class="d-flex justify-content-between">
                    <h6 class="font-weight-medium">Shipping</h6>
                    <h6 class="font-weight-medium">Rp{{ number_format($shipping) }}</h6>
                </div>
            </div>
            <div class="card-footer border-secondary bg-transparent">
                <div class="d-flex justify-content-between mt-2">
                    <h5 class="font-weight-bold">Total</h5>
                    <h5 class="font-weight-bold">Rp{{ number_format($totalall) }}</h5>
                </div>
                <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
            </div>
        </div>
    </div>
