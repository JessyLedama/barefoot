<template id="safari-saved-item-template">
    <div class="safari clearfix">

        <a :href="safari.url" class="safari-cover-link pull-left">
            <div class="before">
                <i class="fas fa-baby"></i>
            </div>

            <img :src="safari.coverUrl" :alt="safari.name" class="safari-cover">
        </a>

        <div class="pull-left safari-info">
            <h4 class="safari-name">@{{ safari.name }}</h4>

            <p class="safari-price">
                <span class="sale-price">
                    Ksh.@{{ parseInt(safari.resident_price) }}
                </span>
                <span class="sale-price-from">
                    Ksh.@{{ parseInt(safari.non_resident_price) }}
                </span>
                
                <span class="sale-price-to">
                    Ksh.@{{ parseInt(safari.price_from) }}
                </span>
            </p>

            <div class="safari-additions clearfix">
                <a class="safari-likes pull-left">
                    <i :class="favourite ? 'lni-heart-filled' : 'lni-heart'" @click="likeSafari"></i>
                    <span :class="'count' + (favourite ? ' liked' : '')">@{{ likes }} Loving it</span>
                </a>

                <a class="view-safari pull-right" :href="safari.url">
                    View
                </a>
            </div>
        </div>

        <div class="pull-right manage-safari">
            <span @click="remove">

                <i class="lnr lnr-trash"></i> Remove

            </span>
        </div>

    </div>
</template>
    
@push('script')
    <script> 
        Vue.component('safari-saved-item', {
            template: '#safari-saved-item-template',
            props: ['safari'],
            computed: {
                likes() {
                    return this.safari.totalLikes;
                },
                user() {
                    return store.getters.currentUser;
                },
                favourite() {
                    return this.safari.customerFavourite;
                }
            },
            methods: {
                likeSafari() {

                    if (this.user) {
                        
                        if (this.favourite) {
                            axios.delete("{{ route('safari.unlike') }}", {
                                data: {
                                    id: this.safari.id
                                }
                            })
                            .then(() => {
                                this.safari.totalLikes = this.safari.totalLikes - 1;
                                this.safari.customerFavourite = false;
                            })
                            .catch(console.error);
                        }
                        else {
                            axios.post("{{ route('safari.like') }}", {
                                id: this.safari.id
                            })
                            .then(() => {
                                alert('Thank you for liking this safari');
                                this.safari.totalLikes = this.safari.totalLikes + 1;
                                this.safari.customerFavourite = true;
                            })
                            .catch(console.error);
                        }
                        
                    }
                    else window.location.href = "{{ route('login') }}";
                },
                remove() {
                    this.$emit('remove', this.safari.id);
                }
            }
        })
    </script>
@endpush