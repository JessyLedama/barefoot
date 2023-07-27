@extends('layout.app')

@section('title', 'Cart | ' . config('app.name'))

@section('content')
    <cart></cart>
@endsection

@section('components')
    <template id="cart-template">
        <section>
            <template v-if="cart.length > 0">
                <a href="{{ route('home') }}" id="continue-shopping">
                    <i class="lni-arrow-left"></i>
                    Continue shopping
                </a>
                <h1 id="cart-page-title">My cart</h1>
                <div class="clearfix" id="cart-content">
                    <div id="cart-catalogue" class="pull-left">
                        <h5 class="card" id="safari-shipping">
                            <small>
                                Get it by @{{ shippingDate }}
                            </small>
                            &nbsp;
                            <small>
                                <span>
                                    <i class="lni-delivery"></i>
                                    5 working days shipping
                                </span>
                            </small>
                        </h5>
                        <div id="safari-list">
                            <div class="safari clearfix card" v-for="(safari, index) in catalogue" :key="index">
                                <div class="clearfix">
                                    <a :href="safari.url">
                                        <img :src="safari.coverUrl" :alt="safari.name" class="pull-left safari-cover">
                                    </a>

                                    <div class="safari-details pull-left">
                                        <a :href="safari.url" class="safari-name">
                                            @{{ safari.name }}
                                        </a>
                                        <a :href="safari.url" class="view-safari">
                                            <i class="lnr lnr-eye"></i>
                                            View
                                        </a>
                                    </div>
                                    
                                    <div class="pull-left safari-quantity">
                                        <label>Quantity</label>
                                        <div class="clearfix">
                                            <span class="decrement pull-left" @click="updateItemQuantity(safari.id, '-')">
                                                <i class="lni-minus"></i>
                                            </span>
                                            <input type="text" :value="safari.quantity" class="safari-quantity-input pull-left" :data-quantity-input="safari.id" readonly>
                                            <span class="increment pull-left" @click="updateItemQuantity(safari.id, '+')">
                                                <i class="lni-plus"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="pull-left safari-price">
                                        <h4>
                                            <span class="safari-sale-price">
                                                Ksh. @{{ safari.price * safari.quantity }}
                                            </span>
                                            <span class="safari-regular-price">
                                                Ksh. @{{ safari.regular_price * safari.quantity }}
                                            </span>
                                        </h4>
                                    </div>
                                </div>
                                <div class="save-and-remove">
                                    <span @click="saveToWishList(safari.id)" v-if="!savedItems.some(item => item == safari.id)">
                                        <i class="lnr lnr-file-add"></i>
                                        Save for later
                                    </span>
                                    <span v-else class="in-saved">
                                        Item in saved list
                                    </span>
                                    <span @click="removeFromCart(safari.id)">
                                        <i class="lnr lnr-trash"></i>
                                        Remove
                                    </span>
                                </div>
                            </div>

                            <pulse-loader :loading="catalogue.length == 0" :color="'#c82088'" :size="'12px'" :margin="'6px'"></pulse-loader>
                        </div>
                    </div>
                    <div id="cart-checkout" class="pull-right">
                        <div class="card">
                            <h4>
                                <i class="lni-delivery"></i>
                                Shipping within 5 working days
                            </h4>
                            <div class="cart-totals clearfix">
                                <span class="pull-left">
                                    Sub-total :
                                </span>
                                <span class="pull-right">
                                    Ksh @{{ subTotal }}
                                </span>
                            </div>
                            <div class="cart-totals clearfix">
                                <span class="pull-left">
                                    Shipping :
                                </span>
                                <span class="pull-right">
                                    Not yet included
                                </span>
                            </div>
                            <div class="cart-totals clearfix">
                                <span class="pull-left">
                                    VAT :
                                </span>
                                <span class="pull-right">
                                    Ksh 0
                                </span>
                            </div>
                            <div class="cart-totals clearfix">
                                <span class="pull-left">
                                    Total :
                                </span>
                                <span class="pull-right">
                                    Ksh @{{ subTotal }}
                                </span>
                            </div>
                            <p>
                                Shipping fees will be calculated on the next page
                            </p>
                        </div>
                        <a id="checkout-btn" href="{{ route('checkout') }}">
                            <i class="lni-lock"></i>
                            Proceed to checkout
                        </a>
                    </div>
                </div>
            </template>
            <div class="card" id="cart-empty" v-else>
                <h1>Cart is empty</h1>
                <a href="{{ route('home') }}" id="continue-shopping">
                    <i class="lni-arrow-left"></i>
                    Continue shopping
                </a>
            </div>
        </section>
    </template>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@push('script')
    <script src="{{ asset('js/vue-spinner.min.js') }}"></script>

    <script>
        Vue.component('cart', {
            template: '#cart-template',
            components: {
                PulseLoader: VueSpinner.PulseLoader
            },
            data: () => ({
                safaris: []
            }),
            computed: {
                cart() {
                    return store.getters.shoppingCart;
                },
                shippingDate() {
                    return "{{ Carbon\Carbon::now()->addDays(5)->format('F j, Y') }}";
                },
                subTotal() {
                    return this.catalogue.reduce((carrier, next) => carrier + (next.price * next.quantity), 0);
                },
                total() {
                    return this.subTotal;
                },
                catalogue () {
                    return this.safaris ? this.safaris.map(safari => {
                        safari.quantity = this.cart.find(item => item.id == safari.id).quantity;
                        return safari;
                    }) : [];
                },
                user() {
                    return store.getters.currentUser;
                },
                savedItems() {
                    return store.getters.savedItems;
                }
            },
            created() {
                if (this.cart.length > 0) this.getSafaris();
            },
            methods: {
                getSafaris() {
                    axios.get("{{ route('cart.safaris') }}", {
                        params: {
                            safaris: this.cart.map(item => item.id).join(',')
                        }
                    })
                    .then(({data}) => this.safaris = data)
                    .catch(console.error);
                },
                updateItemQuantity(id, operator) {
                    const index = this.safaris.findIndex(safari => safari.id == id);
                    let quantity = parseInt(
                        jQuery(`.safari-quantity-input[data-quantity-input="${id}"]`).val()
                    );

                    if (operator == '-') {
                        quantity = (quantity == 1 ? 1 : quantity -= 1);
                    }
                    else quantity++;

                    this.safaris[index].quantity = quantity;
                    store.commit('updateCart', {
                        id, quantity
                    });
                },
                saveToWishList(id) {
                    if (this.user) {
                        axios.post("{{ route('customer.wishlist.store') }}", {
                            id
                        })
                        .then(() => {
                            store.commit('addToWishList', id);
                            alert('Safari has been saved to wish list');
                            this.removeFromCart(id);
                        })
                        .catch(console.error);
                    }
                    else window.location.href = "{{ route('login') }}";
                },
                removeFromCart(id) {
                    const index = this.safaris.findIndex(safari => safari.id == id);
                    store.commit('removeFromCart', {id});
                    this.safaris.splice(index, 1);
                }
            }
        });
    </script>
@endpush