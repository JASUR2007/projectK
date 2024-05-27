// Компонент продукта
Vue.component('ProductItem', {
    props: ['product'],
    template: `
        <tr>
            <td>{{ product.good_id }}</td>
            <td>{{ product.good }}</td>
            <td>{{ product.brand }}</td>
            <td>{{ product.price }}</td>
            <td>{{ product.rating }}</td>
        </tr>
    `
});


// Экземпляр vue
var app = new Vue({
    el: '#app',
    data: {        
        products: [],
        categories: [
            { id: 1, category: 'Ноутбуки' },
            { id: 2, category: 'Смартфоны' },
            { id: 3, category: 'Видеокарты' }
        ],
        brands: [],
        sortRules: [
            { key :'good_id:asc', title: 'По порядку' },
            { key :'rating:desc', title: 'По рейтингу' },
            { key :'price:asc', title: 'По цене, сначала дешевые' },
            { key :'price:desc', title: 'По цене, сначала дорогие' }
        ],
        inputSearch: '',
        selectCategory: 0,
        selectBrand: 0,
        minPrice: 0,
        maxPrice: 0,
        selectSort: 'good_id:asc'
    },
    computed: {     
        filteredProducts: function() {
            // Фильтруем товары
            var filtered = this.products
                // По категории
                .filter(product => {
                    return this.selectCategory == 0 || product.category_id == this.selectCategory;
                })

                // По брендам
                .filter(product => {
                    return this.selectBrand == 0 || product.brand == this.selectBrand;
                })
                // По ценам
                .filter(product => {
                    return Number(product.price) >= this.minPrice && Number(product.price) <= this.maxPrice;
                })

                // По полю поиска
                .filter(product => {
                    return this.inputSearch == '' || product.good.toLowerCase().indexOf(this.inputSearch.toLowerCase()) !== -1;
                });

            // Сортируем
            var sorted = _.sortBy(filtered, product => {
                return Number(product[this.sortKey]);
            });

            // При необходимости сортируем в обратном направлении
            if (this.sortDir === 'desc') {
                sorted = sorted.reverse();
            }

            return sorted;
        },
        sortKey: function() {
            return this.selectSort.split(':')[0];
        },
        sortDir: function() {
            return this.selectSort.split(':')[1];
        }
    },
    mounted: function() {
        axios
            .get('/scripts/catalog.php?needs_data=brands')
            .then(response => {
                this.products = response.data.data.goods;
                this.brands = response.data.data.brands;
                this.minPrice = this.getMinPrice();
                this.maxPrice = this.getMaxPrice();
            });
    },
    methods: {
        getMinPrice: function() {
            return Number(_.minBy(this.products, 'price').price);
        },
        getMaxPrice: function() {
            return Number(_.maxBy(this.products, 'price').price);
        },
        clear: function() {
            this.inputSearch = '';
            this.selectCategory = 0;
            this.selectBrand = 0;
            this.minPrice = this.getMinPrice();
            this.maxPrice = this.getMaxPrice();
            this.selectSort = 'good_id:asc';
        }
    }
});