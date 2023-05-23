<template id="safari-item-template">
    <div class="safari pull-left">
        <a :href="safari.url" class="safari-cover-link">
            <div class="before">
                <i class="fas fa-baby"></i>
            </div>
            <img :src="safari.coverUrl" :alt="safari.name" class="safari-cover">
        </a>
        <h4 class="safari-name">
            @{{ safari.name }}
        </h4>

        <p  class="safari-price">
            <span id="salePrice" class="price_from">
                Ksh.@{{ parseInt(safari.price_from) }}
            </span>
            <span id="saleFrom" class="sale-price-from">
                Ksh.@{{ parseInt(safari.residents_price ) }}
            </span> 
            <span id class="dast">-</span>
            <span id="saleTo" class="sale-price-to">
                Ksh.@{{ parseInt(safari.non_residents_price) }}
            </span>
        </p>
    </div>
</template>
