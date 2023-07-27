@extends('layouts/app-pages')

@section('title', 'Saved Items | ' . config('app.name'))

@section('content')
    <section class="clearfix">
        @include('customer.dashboard.menu')

        <wishlist-catalogue></wishlist-catalogue>
    </section>
@endsection

@section('components')
    <template id="wishlist-template">
        <article class="card pull-right">

            <h3 class="section-title desktop">
                My saved items
            </h3>

            <h3 class="mobile section-title" id="card-header">
                <a href="{{ route('customer.profile.menu') }}" id="back-to-menu">
                    <i class="lnr lnr-arrow-left"></i>
                </a>

                My saved items
            </h3>
    
            <div id="safaris-container" v-if="safaris.length > 0">
                <safari-saved-item v-for='safari in safaris' :key="safari.id" :safari="safari" @remove="removeFromWishlist"></safari-saved-item>
            </div>

            <div v-else id="no-safaris">
                <h4>No safaris in saved items</h4>
            </div>

            <div id="loading">
                <pulse-loader :loading="true" :color="'#c82088'" :size="'12px'" :margin="'6px'"></pulse-loader>
            </div>

        </article>
    </template>

    @include('customer.partial.safari-saved-item')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/customer/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/wishlist.css') }}">
@endsection

@push('script')
    <script src="{{ asset('js/vue-spinner.min.js') }}"></script>

    <script>
        Vue.component('wishlist-catalogue', {
            template: '#wishlist-template',
            components: {
                PulseLoader: VueSpinner.PulseLoader
            },
            data: () => ({
                safaris: @json($safaris->items()),
                currentPage: {{ $safaris->currentPage() }},
                lastPage: {{ $safaris->lastPage() }}
            }),
            created() {

                jQuery(window).on('scroll', () => {

                    const parentWindow = jQuery(window);
                    const safarisContainer = jQuery('section .safaris-container');
                    
                    if (parentWindow.scrollTop() >= safarisContainer.offset().top + safarisContainer.outerHeight() - parentWindow.innerHeight() && this.currentPage < this.lastPage && jQuery('#loading').css('display') == 'none') {

                        jQuery('#loading').css('display', 'block');

                        this.lazyLoadSafaris();
                    }
                });
            },
            methods: {
                lazyLoadSafaris() {

                    const nextPage =  this.currentPage + 1;
                    const search = new URL(window.location.href).searchParams;

                    axios.get("{{ route('customer.wishlist') }}", {

                        params: {
                            page: nextPage
                        },

                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(({data}) => {

                        this.safaris = this.safaris.concat(data);
                        this.currentPage = nextPage;

                        jQuery('#loading').css('display', 'none');
                    })
                    .catch(console.error);
                },
                removeFromWishlist(id) {

                    if (confirm('Are you sure to remove safari from saved items')) {

                        let url = "{{ route('customer.wishlist.destroy', ':id') }}";

                        axios.delete(url.replace(':id', id), {

                            data: {id}
                        })
                        .then(() => {

                            alert('Safari has been removed from saved items');

                            store.commit('removeFromWishList', id);

                            this.safaris = this.safaris.filter(safari => safari.id != id);
                        })
                        .catch(console.error);
                    }
                }
            }
        });
    </script>
@endpush