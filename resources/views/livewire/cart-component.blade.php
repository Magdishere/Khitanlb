

    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="text-center">Product</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Cart::instance('cart')->content() as $item)
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="img/shopping-cart/cart-1.jpg" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{$item->model->name}}</h6>
                                            <h5>{{$item->regular_price}}</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity text-center">
                                            <div class="pro-qty-2">
                                                <a href="#" class="fa fa-angle-left inc qtybtn" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"><i class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val">{{$item->qty}}</span>
                                                <a href="#" class="fa fa-angle-right inc qtybtn" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product__cart__item">
                                        <img src="{{ asset('../admin-assets/uploads/images/products/' . $item->model->image) }}">
                                    </td>
                                    <td class="cart__price text-center">${{ $item->price }}</td>
                                    <td class="action cart__close" data-title="Remove"><a href="#" class="text-muted" wire:click.prevent="removeFromCart('{{$item->rowId}}')"><i class="fa fa-close"></i></a></td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="/shop">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Total <span>${{Cart::subtotal()}}</span></li>
                        </ul>
                        <div class="continue__btn update__btn">
                            <a href="#" style="font-size:13px;"></i>Proceed To Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

