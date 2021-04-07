@extends('frontend.layout.master-layout')

@section('title')
    Checkout
    @endsection

@section('content')

        <!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        @if(session('message'))
            <div class="alert alert-{{ session('type') == 'success' ? 'success':'danger' }} alert-dismissible fade show" role="alert">
                <strong>{{ session('type') == 'success' ? 'Success':'Sorry' }} ! </strong> {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Category</span>
                    </div>
                    <ul>
                        @foreach($category as $cate)
                            <li><a style="line-height: 50px;" href="{{ route('catePro',$cate->id) }}">{{ ucfirst($cate->category_name) }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    @include('frontend.search.search')
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend')}}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Organi Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('home') }}">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="{{ route('orderStore') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>User Name<span>*</span></p>
                                        <input type="text" name="name" value="{{ $LoggedCustomerInfo->name }}">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <select name="country" class="form-control">
                                    <option value="">Select Country</option>
                                    <option value="bangladesh" {{ old('country') == 'bangladesh' ? 'selected':'' }}>Bangladesh</option>
                                    <option value="india" {{ old('country') == 'india' ? 'selected':'' }}>India</option>
                                    <option value="singapur" {{ old('country') == 'singapur' ? 'selected':'' }}>Singapur</option>
                                    <option value="usa" {{ old('country') == 'usa' ? 'selected':'' }}>USA</option>
                                    <option value="nepal" {{ old('country') == 'nepal' ? 'selected':'' }}>Nepal</option>
                                </select>
                                @error('country')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" name="address" value="{{ old('address') }}" class="checkout__input__add">
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="city" value="{{ old('city') }}">
                                @error('city')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="number" value="{{ old('number') }}" name="postcode">
                                @error('postcode')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="number" name="number" value="0{{ $LoggedCustomerInfo->number }}">
                                        @error('number')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" name="email" value="{{ $LoggedCustomerInfo->email }}">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @foreach($cart as $pro)
                                        <?php
                                        $total = $pro->quantity * $pro->price;
                                        ?>
                                    <li>{{ $pro->brand->brand }} ({{ $pro->quantity }}) <span>{{ number_format($total) }}&#2547;</span></li>
                                        @endforeach
                                </ul>
                                <?php
                                $total = \App\Models\Frontend\Cart::all()->where('user_ip',request()->ip())->sum(function($t){
                                    return $t->price * $t->quantity;
                                });
                                ?>
                                <div class="checkout__order__subtotal">Subtotal <span>{{ number_format($total) }}&#2547;</span></div>
                                <input type="hidden" name="subtotal" value="{{ $total }}">
                                @if(Session::has('coupon'))
                                    <?php
                                    $gtotal = $total * session()->get('coupon')['discount']/100;
                                    ?>
                                    <div class="checkout__order__subtotal">Discount <span>{{ session()->get('coupon')['discount'] }}% ( {{ number_format($gtotal) }}&#2547; )</span></div>
                                    <input type="hidden" name="discount" value="{{ session()->get('coupon')['discount'] }}">
                                    <div class="checkout__order__total">Total <span>{{ number_format($total - $gtotal) }}&#2547;</span></div>
                                    <input type="hidden" name="total" value="{{ $total - $gtotal }}">
                                @else
                                @endif
                               <h5>Payment Method</h5><br>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Cash on Delivery
                                        <input type="checkbox" id="paypal" name="payment" value="cash-on-delivery" {{ old('payment') == 'cash-on-delivery' ? 'checked':'' }}>
                                        <span class="checkmark"></span>
                                        <br>
                                        @error('payment')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection