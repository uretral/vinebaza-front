<template>
    <div class="root">

         <Row :space="10" type="flex" align="middle">
             <Cell>Донор: <Button color="primary" icon="h-icon-left" @click="startParse()">START</Button> </Cell>
             <Cell>
                 <Select v-model="donor" :datas="donors" keyName="id" titleName="name"></Select>
             </Cell>
             <Cell>Категория:</Cell>
             <Cell>
                 <Select v-if="donor" v-model="category"
                         :datas="donors[donor].links" keyName="id" titleName="name"/>
             </Cell>
             <Cell>Всего страниц:</Cell>
             <Cell v-if="category">
                 <input type="text" v-model="pagesCount">
             </Cell>
             <Cell>Следующая страница:</Cell>
             <Cell v-if="category">
                 <input type="text" v-model="pagesCurrent">
             </Cell>
             <Cell v-if="pagesCount">
                 <Button :color="pause ? '' : 'primary'" icon="h-icon-right" @click="startParse(),pause = false">Старт</Button>
             </Cell>
             <Cell v-if="pagesCount">
                 <Button :color="pause ? 'primary' : ''" icon="h-icon-down" @click="pause = true">Пауза</Button>
             </Cell>

             <Cell>Proxy:</Cell>
             <Cell><input style="width:200px;" width="150" type="text" v-model="proxy"></Cell>


          </Row>

         <Row :space="10" type="flex" align="middle">
             <Cell>Текущее действие: </Cell>

          </Row>
        <template v-for="item in history">
            <Row :space="10">
                <Cell><span class="h-tag " :class="'h-tag-'+item.type">{{item.action}} </span><span class="h-tag " :class="'h-tag-'+item.type">{{item.link}} </span>
                <template v-for="product in item.products">
                    <template v-if="product.type === 'red'">
                        <span  class="product-error h-tag " :class="'h-tag-'+product.type" @click="fixProduct(product)">{{product.action}}</span>
                    </template>
                    <template>
                        <span  class="h-tag " :class="'h-tag-'+product.type">{{product.action}}</span>
                    </template>
                </template>
                </Cell>
            </Row>
        </template>

    </div>
</template>

<script>
    import {mapState, mapMutations, mapActions, mapGetters} from 'vuex';
    export default {
        // name: 'parser-container',
        props: ['donors'],
        data(){
            return {
                pause: true,
                currentAction: '',
                history: [],
                errPages: [],
                errCatalog: [],
            }
        },
        computed: {
            donor: {
                get (){
                    return this.$store.getters.donor;
                },
                set(value){
                    this.$store.commit('donor',value);
                }
            },
            category: {
                get (){
                    return this.$store.getters.category;
                },
                set(value){
                    this.$store.commit('category',value);
                }
            },
            pagesCount: {
                get (){
                    return this.$store.getters.pagesCount;
                },
                set(value){
                    this.$store.commit('pagesCount',value);
                }
            },
            pagesCurrent: {
                get (){
                    return this.$store.getters.pagesCurrent;
                },
                set(value){
                    this.$store.commit('pagesCurrent',value);
                }
            },
            proxy: {
                get (){
                    return this.$store.getters.proxy;
                },
                set(value){
                    let replaced = value.trim().split('	');
                    replaced = replaced.join(':');
                    console.log(replaced);
                    this.$store.commit('proxy',replaced);
                }
            },
        },

        watch: {
            pagesCurrent(){
                if(Number(this.pagesCurrent) <= Number(this.pagesCount)) {
                    this.startParse()
                } else {
                    this.pause = true;
                }
            }
        },
        methods: {


            startParse(){
                this.catalogPage(this.donors[this.donor].links[this.category].link);
            },
            async catalogPage(link,repeatedKey = null){

                if(!this.pause){

                    this.history.unshift({
                        'id': this.pagesCurrent,
                        'role': 'catalog',
                        'products': {},
                        'type': 'gray',
                        'action': 'Парсим каталог' + this.pagesCurrent,
                        'link': link + String(this.pagesCurrent),
                        'date': new Date().toISOString()
                    });

                    try {
                        let response = await window.axios.post('/parse/catcatcat',{
                            'link' : link + String(this.pagesCurrent),
                            'donor_id' : Number(this.donor),
                            'category_id' : Number(this.category),
                            'proxy': this.proxy
                        });
                        if(await response.data){
                            let index = await this.history.findIndex(i => Number(i.id) === Number(this.pagesCurrent));
                            if(index !== null ){
                               await this.$set(this.history[index],'type','green')
                            }
                            await this.productPages(response.data);
                        }
                    } catch (error) {
                        let index = await this.history.findIndex(i => Number(i.id) === Number(this.pagesCurrent));
                        if(index){
                            await this.$set(this.history[index],'type','red');
                            this.errCatalog.push({
                                'id': this.history[index].id,
                                'link' : link + String(this.pagesCurrent),
                                'donor_id' : Number(this.donor),
                                'category_id' : Number(this.category),
                            });
                        }
                    }
                }
            },


            async productPages(result){
                let res = result.result.product_created;
                for(let item in await res){
                    await this.productPage(res[item]);
                }

                // for(let catalogKey in this.errCatalog){
                //    await this.catalogPage(this.errCatalog[catalogKey],catalogKey)
                // }
                //
                // for(let pageKey in this.errPages){
                //    await this.productPage(this.errPages[pageKey],pageKey)
                // }
                await this.$store.commit('pagesCurrent', Number(this.pagesCurrent)+1);
            },
            async productPage(res,repeatedKey = null){
                let index = await this.history.findIndex(i => i.id);
                this.$set(this.history[index].products,res.id,{
                    'id': res.id,
                    'role': 'product',
                    'parent': this.pagesCurrent,
                    'type': 'gray',
                    'action': 'id: '+ res.id,
                    'link':res.winestyle_link,
                    'date': new Date().toISOString()
                });
                try {
                    let response = await window.axios.post('/parse/prodprodprod',{
                        'link': this.donors[this.donor].url + res.winestyle_link,
                        'product_id' : res.id,
                        'ses_id' : '99',
                        'proxy': this.proxy
                    });
                    if(response.data){
                        this.$set(this.history[index].products[res.id],'type','blue');
                    }
                } catch (error) {
                    this.$set(this.history[index].products[res.id],'type','red');
                    // this.history[index].products[res.id].type = 'red';
                    this.errPages.push({
                        'id': res.id,
                        'parent': this.pagesCurrent,
                        'role': 'product',
                        'link': res.winestyle_link,
                        'date': new Date().toISOString()
                    });
                }
            },
            fixProduct(product){

            },
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
    [type="text"] {
        width: 50px;
    }
    .product-error {
        cursor: pointer;
    }
    .root {
        max-width: unset;
        width: 100%;
    }
</style>
