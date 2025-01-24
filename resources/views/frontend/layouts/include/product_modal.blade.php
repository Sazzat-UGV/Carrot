<div class="modal fade quickview-modal" id="quickview" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered cr-modal-dialog">
        <div class="modal-content">
            <button type="button" class="cr-close-model btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <form action="{{ route('card') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="zoom-image-hover modal-border-image">
                                <img src="#" alt="product-tab-2" class="product-image" id="modal_image">
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="cr-size-and-weight-contain">
                                <h2 class="heading" id="modal_product_name"></h2>
                                <p id="modal_product_description"></p>
                            </div>
                            <div class="cr-size-and-weight">
                                <div class="cr-review-star">
                                    <div class="cr-star" id="modal_product_rating">

                                    </div>
                                    <p id="modal_reviewCount"></p>
                                </div>
                                <div class="cr-product-price">
                                    <span class="new-price" id="modal_product_selling_price"></span>
                                    <span class="old-price" id="modal_product_discount_price"></span>
                                </div>
                                <div class="cr-size-weight">
                                    <h5><span id="sizeText"></span></h5>
                                    <div class="cr-kg">
                                        <ul id="sizeOptions"></ul>
                                    </div>
                                </div>
                                <div class="cr-size-weight">
                                    <h5><span id="colorText"></span></h5>
                                    <div class="cr-kg color">
                                        <ul id="colorOptions"></ul>
                                    </div>
                                </div>
                                <input type="hidden" name="price" value="" class="modal_product_selling_price">
                                <input type="hidden" name="product_id" value="" class="product_id">
                                <div class="cr-add-card">
                                    <div class="cr-qty-main">
                                        <input type="text" placeholder="1" value="1" class="quantity"
                                            name="qty">
                                        <button type="button" id="add_model" class="plus">+</button>
                                        <button type="button" id="sub_model" class="minus">-</button>
                                    </div>
                                    <div class="cr-add-button">
                                        <button type="submit" class="cr-button">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
