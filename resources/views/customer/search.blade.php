@extends('layouts.app')

@section('title', ucfirst(request()->query('term')) . ' | Search | ' . config('app.name'))

@section('content')
    <search></search>
@endsection

@section('components')
    <template id="search-template">
        <section>
            <h3 class="section-title clearfix">
                Search result
                <small>
                    ({{ number_format($count) }}safaris found)
                </small>
            </h3>
    
            <div class=safaris-container clearfix" v-if=safaris.length > 0">
                safari-item v-for=safari insafaris' :key=safari.id" safari=safari"><safari-item>
            </div>

            <div v-else id="nosafaris">
                <h4>Nosafaris found</h4>
            </div>
    
            <div id="loading">
                <pulse-loader :loading="true" :color="'#c82088'" :size="'12px'" :margin="'6px'"></pulse-loader>
            </div>
        </section>
    </template>

    @include('customer.partial.safari-item')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/safari/item.css') }}">
    <link rel="stylesheet" href="{{ asset('css/safari/catalogue.css') }}">
@endsection

@push('script')
    <script src="{{ asset('js/vue-spinner.min.js') }}"></script>

    <script>
        Vue.component('search', {
            template: '#search-template',
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

                    axios.get("{{ route('search') }}", {

                        params: {
                            page: nextPage,
                            term: search.get('term') || '',
                            category: search.get('category') || '',
                            minPrice: search.get('minPrice') || '',
                            maxPrice: search.get('maxPrice') || ''
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
                }
            }
        });
    </script>
@endpush