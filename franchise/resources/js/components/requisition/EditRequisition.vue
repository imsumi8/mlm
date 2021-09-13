<template>
    <!-- Begin Page Content -->
    <div class="container-fluid pl-2 pr-2">
        <div class="row sell-pos">
            <div class="col-md-5 pr-0">
                <div class="card mb-2 rounded-0">
                    <div class="card-header bg-secondary rounded-0">
                        <div class="row text-right">
                            <div class="col-12 select-customer">
                                <v-select  :options="branches" v-model="branch" label="title" placeholder="Select Branch"></v-select>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body p-0 text-right">
                        <div class="cart-products pr-2 pt-2 scroll-bar pb-2" style="min-height: 70vh">
                            <div class="row bg-secondary text-white" v-if="carts.length > 0">
                                <div class="col-md-5 text-left pl-4">
                                    <span>{{lang.product_title}}</span>
                                </div>
                                <div class="col-md-7">
                                    <div class="float-left text-center w-90px">
                                        <span>{{lang.price}}</span>
                                    </div>
                                    <div class="float-left text-center w-90px">
                                        <span>{{lang.tax}}</span>
                                    </div>

                                    <div class="float-left text-center w-80px">
                                        {{lang.qty}}
                                    </div>

                                    <div class="float-right text-center pr-4">
                                        {{lang.total}}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="row sell-item border-top pt-2 pb-2" v-for="(cart, key) in carts">
                                <div class="col-md-5 pl-3 text-left">
                                    <span class="product-title">{{cart.title}} </span>
                                </div>

                                <div class="col-md-7">
                                    <div class="float-left w-90px">
                                        <input type="number" v-model.number="cart.original_price" step=".1" min=".1" value="10" class="form-control font-12 text-center">
                                    </div>

                                    <div class="float-left w-90px">
                                        <input type="number" v-model.number="cart.gst" step=".1" min=".1" value="10" class="form-control font-12 text-center" readonly>
                                    </div>

                                    <div class="float-left w-80px">
                                        <input type="number" v-model.number="cart.quantity" min="1" class="form-control font-12 text-center">
                                    </div>

                                    <div class="float-right">
                                        <input type="hidden" v-model.number="cart.dp">
                                        <span class="price font-12"> <b>{{appConfig('app_currency')}}{{cart.dp = Math.round(cart.quantity * (cart.original_price + cart.gst))}}</b></span>
                                        <a href="javascript:void(0)" class="mr-2 text-danger remove" @click="deleteProductFormCart(key)">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="cart-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table text-right  overflow-hidden">
                                        <tbody>
                                            <tr>
                                                <td>Total</td>
                                                <td width="30%"></td>
                                                <td width="30%" class="text-12">
                                                    <input type="number" v-model.number="summary.total = cartTotalPrice" class="form-control font-12" readonly>
                                                </td>
                                            </tr>

                                            <!-- <tr>
                                                <td>Grand Total</td>
                                                <td width="30%"></td>
                                                <td width="30%" class="text-12">
                                                    <input type="number" v-model.number="summary.grand_total = cartGrandTotalPrice" class="form-control font-12" readonly>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-12">
                                    <a href="javascript:void(0)" class="btn btn-primary btn-block btn-sm" @click="storeRequisition()">Save & Submit</a>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <a href="javascript:void(0)" class="btn btn-danger btn-block btn-sm" @click="clearAll()">Clear</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card mb-2 rounded-0">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header bg-secondary rounded-0">
                        <div class="row w-100">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" v-model="filter.search" v-on:keyup.enter="onEnterClick" class="form-control" :placeholder="lang.product_search_kye">
                                </div>
                            </div>
                            <div class="col-md-8 p-0">
                                <div class="filter-category">
                                    <a href="javascript:void(0)" class="btn btn-outline-warning rounded-0 mt-1 mb-1" v-on:click="filter.category_id = ''">{{lang.all}}</a>
                                    <a href="javascript:void(0)" class="btn btn-outline-warning rounded-0 mr-1 mt-1 mb-1" v-for="category in categories" @click="productFilterByCategory(category.id)">{{category.title}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body card-body-all-products scroll-bar">
                        <div class="row justify-content-center all-products">
                            <div class="col-md-2 p-1" v-for="(product, index) in filteredProduct">
                                <div class="single-product" @click="addToCart(product.id)">
                                    <div class="img">
                                        <img :src="'../../'+product.thumbnail" class="img-fluid" v-if="product.thumbnail != null">
                                        <img :src="'../../images/default.png'" class="img-fluid" v-if="product.thumbnail == null">
                                    </div>
                                    <div class="description">
                                        <p class="product-title"><strong>{{product.title}}</strong></p>
                                        <div class="d-flex sku-price">
                                            <div class="col-12 pl-0 pt-0">
                                                <span>{{product.sku}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price">Rs. {{product.dp}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="drawer shadow right" v-if="printInvoice" style="width: 1100px">
            <button class="btn btn-primary btn-close" @click="printInvoice = false">x</button>
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Invoice</h6>

                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a v-bind:href="'/export/requisition/print-invoice/id='+requisition.id+'/type={print}'" target="_blank" class="btn btn-warning rounded-0 btn-sm">
                            <i class="fa fa-print"></i> {{lang.print_invoice}}
                        </a>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row mb-4">

                        <div class="col-md-12 sell-invoice mb-4 border-bottom">
                            <div class="row text-center">
                                <div class="col-md-12 pb-2">
                                    <h2 class="company-name">{{appConfig('app_name')}}</h2>
                                    <p class="address">{{lang.address}}: {{appConfig('address')}}</p>
                                    <p class="vat">{{lang.var_reg_number}} : {{appConfig('vat_reg_no')}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <table class="table table-bordered table-sm text-center">
                                        <thead>
                                        <tr class="bg-secondary text-white">
                                            <th colspan="2">{{lang.requisition_form}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{lang.branch}}</td>
                                            <td>{{requisition.requisition_from.title}}</td>
                                        </tr>

                                        <tr>
                                            <td>{{lang.phone_number}}</td>
                                            <td>{{requisition.requisition_from.phone}}</td>
                                        </tr>

                                        <tr>
                                            <td>{{lang.address}}</td>
                                            <td>{{requisition.requisition_from.address}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-4"></div>


                                <div class="col-md-4">
                                    <table class="table table-bordered table-sm text-center">
                                        <thead>
                                        <tr class="bg-secondary text-white">
                                            <th colspan="2">{{lang.requisition_to}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{lang.branch}}</td>
                                            <td>{{requisition.requisition_to.title}}</td>
                                        </tr>

                                        <tr>
                                            <td>{{lang.phone_number}}</td>
                                            <td>{{requisition.requisition_to.phone}}</td>
                                        </tr>

                                        <tr>
                                            <td>{{lang.address}}</td>
                                            <td>{{requisition.requisition_to.address}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>




                        <div class="table-responsive">
                            <table class="table table-bordered text-center table-sm" width="100%" cellspacing="0">
                                <thead>
                                <tr class="bg-secondary text-white">
                                    <th>{{lang.sl}}</th>
                                    <th>{{lang.product}}</th>
                                    <th>{{lang.quantity}}</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr v-for="(requisition_product, index) in requisition.requisition_products">
                                    <td width="3%">{{index + 1}}</td>
                                    <td> {{requisition_product.product.title}} </td>
                                    <td>{{requisition_product.quantity}} </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</template>

<script>
    export default {
        name: "EditRequisition",
        props : {
            requisition : Object,
            all_categories : Array,
        },
        data() {
            return {
                lang: [],
                products: [],
                product: {},
                carts: [],
                categories: this.all_categories,
                category: {},
                branches: [],
                branch: {},
                filter: {
                    search: '',
                    category_id: '',
                },
                summary:{
                    'sub_total': 0,
                    'total':0,
                    'grand_total': 0,
                    'payment': 0,
                    'due_amount': 0,
                    'paid_amount': 0,
                    'change_amount': 0,
                    'payment_type': 1,
                    'card_information': '',
                },
                printInvoice:false
            }
        },

        methods: {
             productFilterByCategory:function(category_id){
                this.filter.category_id = category_id;
            },

            onEnterClick: function() {
                this.products.forEach((product) => {
                    if (product.sku.toLowerCase() == this.filter.search.toLowerCase()){
                        this.addToCart(product.id);
                        this.filter.search = '';
                    }
                });
            },

            addToCart: function(product_id){
                if (this.isAlreadyInCart(product_id)) {
                    this.carts.forEach((cart) => {
                        if (cart.id == product_id) {
                            cart.quantity = cart.quantity + 1;
                            cart.original_price += cart.original_price;
                            cart.gst += cart.gst;
                            cart.dp += cart.dp;
                            summary.total +=cart.dp;
                        }
                    });
                }else {
                    this.products.forEach((product) => {
                        if (product.id == product_id) {
                            this.product = product;
                            this.product.quantity = 1;
                            this.carts.unshift(this.product);
                            console.log("myNewCart-",this.carts);
                            summary.total +=this.product.dp;
                            
                        }
                    });
                }
            },

            isAlreadyInCart: function (product_id) {
                let result = false;
                this.carts.forEach((element) => {
                    if (element.id == product_id) {
                        result = true
                    }
                });
                return result;
            },

            deleteProductFormCart: function (key) {
                this.carts.splice(key, 1)
            },

             


            storeRequisition:function(){
                if (this.requisitionStoreValidation()){
                    if (this.carts.length != 0){
                        axios.post('../../vue/api/update-requisition', 
                        {carts: JSON.parse(JSON.stringify(this.carts)), branch: JSON.parse(JSON.stringify(this.branch)),
                         requisition_id: this.requisition.id}).then((response) => {
                            this.requisition = response.data;
                            // this.printInvoice = true;
                            window.location ="../../requisition";
                        }).catch((error) =>{
                            console.error(error);
                        });
                    }else {
                        alert('!Empty Cart')
                    }
                }
            },

            clearAll:function(){
                this.branch = {};
                this.carts = [];
                this.summary.total=0;
                this.summary.sub_total = 0;
                this.summary.grand_total = 0;
                this.summary.payment = 0;
                this.filter.search = '';
            },

            requisitionStoreValidation:function () {
                if (this.branch.id != null){
                    return true;
                }else{
                    alert('Please select a Branch');
                    return false;
                }
            },

            appConfig: function (option_key) {
                let result;
                this.configs.forEach((element) => {
                    if (element.option_key == option_key) {
                        result = element.option_value;
                        return false;
                    }
                });

                return result;
            }
        },

        computed: {
            subTotalotalCartsValue(){
                this.carts.forEach((element, key) => {
                    axios.get('../../vue/api/product-available-stock-qty/' + element.id).then((response) => {
                        if (response.data == 0){
                            this.carts.splice(key, 1)
                        };
                        if (element.quantity > response.data) {
                            toastr["error"]("This quantity is not available");
                            element.quantity = response.data;
                        }
                    });
                });

                let total = 0;
                this.carts.forEach((cart) => {
                    total += cart.dp;
                });
                return total;
            },

            cartTotalPrice: function(){
                 let total = 0;
                this.carts.forEach((cart) => {
                    total += parseInt(cart.dp);
                });
                return total;
            },
            //  cartGrandTotalPrice: function(){
            //      let grandTotal = 0;
            //     this.carts.forEach((cart) => {
            //         grandTotal += parseInt(cart.total_amount);
            //     });
            //     return grandTotal;
            // },

           
            grandTotalotalCartsValue(){
                let grand_total = parseInt(this.subTotalotalCartsValue)  - parseInt(this.summary.discount);
                return grand_total;
            },

            currentDue(){
                if(this.summary.paid_amount > this.grandTotalotalCartsValue){
                    this.summary.change_amount = parseInt(this.summary.paid_amount) - parseInt(this.grandTotalotalCartsValue);
                    return  0;
                }else{
                    this.summary.change_amount = 0;
                    return  parseInt(this.grandTotalotalCartsValue) - parseInt(this.summary.paid_amount);
                }
            },

            filteredProduct: function () {
                if (this.filter.category_id != ''){
                    return this.products.filter((product) => {
                        return product.category_id == (this.filter.category_id)
                            && (product.sku.toLowerCase().match(this.filter.search.toLowerCase()) || product.title.toLowerCase().match(this.filter.search.toLowerCase()));

                    });
                }

                if (this.filter.search != '') {
                    return this.products.filter((product) => {
                        return product.title.toLowerCase().match(this.filter.search.toLowerCase())
                            || product.sku.toLowerCase().match(this.filter.search.toLowerCase());

                    });
                }

                return this.products;
            },
        },

        beforeMount() {
            axios.get('../../vue/api/products').then((response) => {
                this.products = response.data;
            });



            axios.get('../../vue/api/requisition-details/' + this.requisition.id).then((response) => {
                this.branch = response.data.requisition_to;
                response.data.requisition_products.forEach((requisition_product) => {
                    requisition_product.title = requisition_product.product.title;
                    requisition_product.id = requisition_product.product.id;
                    requisition_product.original_price = requisition_product.price;
                    requisition_product.gst = requisition_product.gst;
                    requisition_product.dp = requisition_product.total_amount;
                    requisition_product.quantity = requisition_product.quantity;
                    this.carts.push(requisition_product);
                });
            });

            axios.get('../../vue/api/get-local-lang').then((response) => {
                this.lang = response.data;
            });

            axios.get('../../vue/api/branches').then((response) => {
                this.branches = response.data;
            });

            axios.get('../../vue/api/get-app-configs').then((response) => {
                this.configs = response.data;
            });
        }
    }
</script>
