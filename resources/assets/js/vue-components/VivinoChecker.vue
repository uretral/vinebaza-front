<template>
    <div>
        <div class="console" v-if="loading">
            <Cell v-if="currentAction.length" style="margin: 21px 5px; padding: 11px 21px; width: 100%; background: #d2d6de63;">Текущее действие:
                <span v-for="(action,key) in currentAction">
                    {{action.text}}
                    <template v-if="action.val === 'loading'"><i class="h-icon-loading"></i></template>
                    <template v-else-if="action.val === 'success'"><i class="h-icon-success"></i></template>
                    <template v-else-if="action.val=== false"><span class="h-tag h-tag-red">null</span></template>
                    <template v-else><span class="h-tag h-tag-green">{{action.val}}</span></template>
                </span>
            </Cell>
            <p v-for="(td,trKey) in tableData">
                <span>{{table[trKey]}}</span> <span>-</span> <span>{{td}}</span>
            </p>
        </div>
        <Loading text="Работаю!" :loading="loading" style="position: fixed; height:100vh;"/>
CHECKER
        <Row :space="10" type="flex" align="middle">

            <Cell>Стартовый ID:</Cell>
            <Cell>
                <input type="text" v-model="comparisonStart">
            </Cell>
            <Cell>Товаров за сеанс:</Cell>
            <Cell>
                <input type="text" v-model="comparisonLimit">
            </Cell>
            <Cell v-if="vivinoPause">
                <Button :color="vivinoPause ? '' : 'primary'" icon="h-icon-right"
                        @click="loadComparison()">Старт
                </Button>
            </Cell>
            <Cell v-if="!vivinoPause">
                <Button :color="vivinoPause ? 'primary' : ''" icon="h-icon-down" @click="vivinoPause = true">Пауза
                </Button>
            </Cell>
        </Row>
        <!--
        <Row :space="10" v-if="showParsing" type="flex" align="middle" >
            <Cell style="margin: 21px 5px; padding: 11px 21px; width: 100%; background: #d2d6de63;">Текущее действие:
                <span v-for="(action,key) in currentAction">
                    {{action.text}}
                    <template v-if="action.val === 'loading'"><i class="h-icon-loading"></i></template>
                    <template v-else-if="action.val === 'success'"><i class="h-icon-success"></i></template>
                    <template v-else-if="action.val=== false"><span class="h-tag h-tag-red">null</span></template>
                    <template v-else><span class="h-tag h-tag-green">{{action.val}}</span></template>
                </span>
            </Cell>
            <div style="width: 100%; overflow-x: auto">

            <table class="table">

                <thead>
                <tr>
                    <th v-for="th in table">
                        <div class="vertical"><span class="vertical-inner">{{th}}</span></div>
                    </th>
                </tr>
                </thead>

                <tbody>
                <tr v-for="(td,trKey) in tableData">
                    <td v-for="(t,key) in td">
                        <template v-if="key === 'image'">
                            <span v-if="t" class="h-tag h-tag-blue">true</span>
                            <span v-else-if="t === null" class="h-tag h-tag-gray">null</span>
                            <span v-else class="h-tag h-tag-red">false</span>
                        </template>
                        <template v-else>
                            <span v-if="t" class="h-tag h-tag-blue">{{t}}</span>
                            <span v-else-if="t === null" class="h-tag h-tag-gray">null</span>
                            <span v-else class="h-tag h-tag-red">false</span>
                        </template>

                    </td>
                </tr>
                </tbody>

            </table>

            </div>
        </Row>
-->
        <div style="display: flex; flex-wrap: wrap; width: 100%; justify-content: space-between; align-items: flex-start;">
            <div style="display: inline-block; width: 600px;" v-for="(item,key) in items">
                <table class="table bbb" >
                    <thead>
                    <tr>
                        <td>p_id: {{item.item.product_id}} // v_id {{item.item.id}}</td>
                        <td>Vintage {{item.item.vintage_id}}</td>
                        <td>Wine {{item.item.wine_id}}</td>
                    </tr>
                    <tr>
                        <th>
                            <div style="display: flex; justify-content: space-between;">
                                <Poptip content="Продукт пометится как ПРАВИЛЬНЫЙ!!! Продолжить?" @confirm="isChecked(item.item.id,'check', item.imgFromWinstyle)">
                                    <Button color="primary" size="s" icon="h-icon-left">OK</Button>
                                </Poptip>

                                <Poptip content="Продукт будет отвязан от ассоциации с Vivino!!! Продолжить?" @confirm="isChecked(item.item.id,'resolve', null)">
                                    <Button color="yellow" size="s"  icon="h-icon-minus">Исключить</Button>
                                </Poptip>
                            </div>

                        </th>
                        <th colspan="2">

                            <input type="text" v-model="item.item.vintage_id" style="width: 120px" placeholder="vintage id" @change="showChanged(key)">
                            <Poptip v-if="key === keyToChange" content="Будет проведена замена!!! Продолжить?" @confirm="resolveProduct(item)">
                                <Button color="red" size="s" icon="h-icon-right" style="margin-top: 3px;">Замена</Button>
                            </Poptip>
<!--                            3104351-->
                        </th>
                    </tr>
                    <tr>
                        <th style="width: 33%">c vivno</th>
                        <th style="width: 33%"><a target="_blank" :href="'https://www.vivino.com/wines/'+item.item.vintage_id">vivino наш</a></th>
                        <th style="width: 33%">
                            <a target="_blank" :href="'https://winestyle.ru'+item.p.winestyle_link">winstyle</a>
                            <Checkbox v-model="item.imgFromWinstyle" trueValue="winstyle" :falseValue="null"/>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td style="height: 450px;">
                            <img :src="getImage(item)" alt=""/>
                        </td>
                        <td style="height: 450px;"><img :src="item.vSrc" alt=""/></td>
                        <td style="height: 450px;"><img :src="item.pSrc" alt=""/></td>
                    </tr>
                    <tr>
                        <td>
                            винтаж -
                            <span v-text="item.v.info.vintage ? item.v.info.vintage.name : ''"></span>
                            <br/>
                            вино - <span v-text="item.v.info.vintage && item.v.info.vintage.wine ? item.v.info.vintage.wine.name : ''"></span> <br/>
                        </td>
                        <td>
                            винтаж -
                            <span v-text="item.v.info.vintage ? item.v.info.vintage.name : ''"></span>
                            <br/>
                            вино - <span v-text="item.v.info.vintage && item.v.info.vintage.wine ? item.v.info.vintage.wine.name : ''"></span> <br/>
                        </td>
                        <td>
                            {{item.p.name}}
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>







    </div>
</template>



<script>
    import {mapState, mapMutations, mapActions, mapGetters} from 'vuex';

    import axios from 'axios'

    export default {
        name: 'VivinoChecker',
        props: ['donors'],
        data() {
            return {
                loading: false,
                keyToChange: null,


                start: 0,
                limit: 10,
                items: [],
                link: '',
                showParsing: false,
                currentID: null,
                currentItem: {},


                vivinoPause: true,
                vivinoCurrentAction: '',
                vivinoHistory: [],
                vivinoErrPages: [],
                vivinoErrCatalog: [],
                search: {
                    name: null
                },
                table: {

                    finished: 'Успех',
                    step: 'попытка',
                    p_id: 'ID',
                    p_code: 'Код продукта',
                    p_s_name: 'Имя WinStyle',
                    vivinoName: 'Имя Vivino ',
                    check: 'Сходство',
                    v_s_code: 'Винтаж ID',
                    v_w_code: 'Вино ID',
                    info: 'Основа',
                    tastes: 'Вкусы',
                    tastesReview: 'Отзывы вкус',
                    scoredReview: 'Отзывы оценка',
                    image: 'Изображения',
                    highlights: 'highlights',
                    recommended: 'Задачи +',
                    group: 'Группы',
                    keywords: 'Ключ. слова',
                    scoredReviews: 'Ревью',
                    reviewsTastes: 'Ревью +',

                    foods: 'Кухня',
                    grapes: 'Виноград',
                    country: 'Страна',
                    region: 'Регион',
                    winery: 'Производство',
                    style: 'Стиль',
                },
                tableData: {},
                currentAction: [],

            }
        },
        computed: {

            comparisonStart: {
                get() {
                    return this.$store.getters.comparisonStart;
                },
                set(value) {
                    this.$store.commit('comparisonStart', value);
                }
            },
            comparisonLimit: {
                get() {
                    return this.$store.getters.comparisonLimit;
                },
                set(value) {
                    this.$store.commit('comparisonLimit', value);
                }
            },



/*
            vivinoStart: {
                get() {
                    return this.$store.getters.vivinoStart;
                },
                set(value) {
                    this.$store.commit('vivinoStart', value);
                }
            },
            vivinoPerSeance: {
                get() {
                    return this.$store.getters.vivinoPerSeance;
                },
                set(value) {
                    this.$store.commit('vivinoPerSeance', value);
                }
            },
            vivinoCurrent: {
                get() {
                    return this.$store.getters.vivinoCurrent;
                },
                set(value) {
                    this.$store.commit('vivinoCurrent', value);
                }
            },
            vivinoPagesCount: {
                get() {
                    return this.$store.getters.vivinoPagesCount;
                },
                set(value) {
                    this.$store.commit('vivinoPagesCount', value);
                }
            },
            */
        },
        methods: {

            getImage(item){
                if(item.v.info.vintage && item.v.info.vintage.image) {
                    // return 'http://' + item.v.vintage.image.location.slice(2)
                    return 'http://' + item.v.info.vintage.image.location.slice(2)
                } else {
                    return ';;;;;;;;;;'
                }
            },

            showChanged(key){
                this.keyToChange = key
            },

            async loadComparison(){
                this.loading = true
                try {
                    let response = await axios.post('/comparison',{
                        func: 'loader',
                        start: this.comparisonStart,
                        limit: this.comparisonLimit,
                    });
                    console.log(response.data);
                    this.items = response.data
                    this.loading = false
                } catch (error) {
                    console.log(error);
                }
            },
            async isChecked(id,func, imgFromWinstyle){
                let response = await axios.post('/comparison',{
                    func: func, id, imgFromWinstyle
                });
                if(await response.data){
                    let NewItems = {}
                    for(let i in this.items) if(Number(i) !== Number(id)){
                        NewItems[i] = this.items[i]
                    }
                    this.$set(this.$data,'items',NewItems)
                }
            },
            replaceItem(id){},




            showAction(key) {
                this.$set(this.$data, 'currentActionKey', key);
            },
            clearResolve(){
                this.link = ''
                this.showParsing = false
                this.currentID = null
                this.currentItem = {}
                this.loading = false
            },
            async nextItem(state = '') {
                console.log('nextItem',state);
                if(this.tableData['image']){
                    console.log('this.tableData[image]');
                    let response = await axios.post('/comparison',{
                        func: 'completeResolve',
                        id: this.currentID,
                        vintage_id:this.tableData.v_s_code,
                        wine_id:this.tableData.v_w_code,
                    });
                    if(await response.data.result ){
                        for(let i in this.items)
                            if(this.items.hasOwnProperty(i) && Number(this.items[i].item.id ) === Number(this.currentID)){
                            this.$set(this.items,i,response.data)
                        }
                        this.clearResolve();
                    } else {
                        this.loading = false
                        this.$Message['error']('Не удалось привязать новый продукт')
                    }
                } else {
                    this.clearResolve();
                }
            },
            prepareObj() {
                let newObj = {}
                for (let t in this.table) {
                    newObj[t] = null;
                }
                return newObj
            },



    /*

// id, search_name



            async startParse() {

                // let id = this.vivinoPagesCount ? this.vivinoStart - 1 :
                await this.tableData.unshift(this.prepareObj());
                this.currentAction = [];
                try {
                    this.currentAction.push({text: 'Получение продукта', val: 'loading'});
                    let response = await axios.post('/vivino', {
                        func: 'search',
                        id: this.vivinoCurrent
                    });
                    if (response.data) {
                        if (response.data === 'double') {
                            await this.currentAction.splice(this.currentAction.length - 1, 1, {
                                text: 'Продукт спарсен',
                                val: 'в базе'
                            });
                            this.tableData['']step = 'база';
                            this.vivinoCurrent++;
                            await this.nextItem();
                        } else {
                            this.vivinoCurrent = await response.data.id;
                            this.search.name = await response.data.name;
                            this.tableData['']step = 1;
                            this.tableData['']p_id = await response.data.id;
                            this.tableData['']p_code = await response.data.code;
                            this.tableData['']p_s_name = await response.data.name;
                            await this.currentAction.splice(this.currentAction.length - 1, 1, {
                                text: 'Получен продукт',
                                val: response.data.id
                            });
                            // await this.tableData.unshift(tableItem);
                            await this.vivinoSearch();
                        }

                    }
                } catch (error) {
                    console.log(error);
                }
            },
// id, search_name
            async vivinoSearch() {
                this.currentAction.push({text: 'Поиск на vivino', val: 'loading'});
                try {
                    let response = await axios.post('/vivino', {
                        func: 'vivinoSearch',
                        name: this.tableData['']p_s_name.replace(/'/g, '')
                    });
                    if (response.data === 'nothing') {
                        this.tableData['']v_s_code = null;
                        this.tableData['']step = await this.tableData['']step + 1;
                        await this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'НЕ найден продукт',
                            val: false
                        });
                        await this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'Попытка #' + this.tableData['']step,
                            val: false
                        });
                        if (this.tableData['']step <= 3) {
                            await this.vivinoSearch();
                        } else {
                            await this.nextItem();
                        }
                    } else {
                        this.tableData['']v_s_code = Number(response.data.replace('/wines/', ''));
                        await this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'Найден продукт',
                            val: this.tableData['']v_s_code
                        });
                        await this.vivinoJson(this.tableData['']v_s_code);
                    }
                } catch (error) {
                    await this.currentAction.splice(this.currentAction.length - 1, 1, {
                        text: 'НЕ найден продукт (error)',
                        val: false
                    });
                    console.log(error);
                }
            },
            */
// json

            async resolveProduct(item){ // 3104351
                this.loading = true
                this.currentID = item.item.id
                this.$set(this.$data,'currentItem',item)
                this.tableData['p_id'] = item.p.id
                this.tableData['p_code'] = item.p.code
                this.tableData['p_s_name'] = item.p.name
                this.tableData['v_s_code'] = Number(item.item.vintage_id)

                await this.vivinoJson(Number(item.item.vintage_id));

/*                try {
                    let response = await axios.post('/comparison',{
                        func: 'resolve',
                        id: id
                    });
                    console.log(response.data);
                    if(response.data){
                        await this.vivinoJson(this.link);
                    }

                } catch (error) {
                    await this.nextItem()
                    console.log(error);
                }*/
            },
            async vivinoJson(link) {
                console.log('link',link);
                if(!link){
                    this.$Message['error']('Укажите код продукта с vivino')
                    await this.nextItem('vivinoJson !link')
                    return false;
                }
                this.tableData['p_s_name'] = this.i
                this.showParsing = true
                this.currentAction.push({text: 'Получаем json', val: 'loading'});
                try {
                    let response = await axios.post('/vivino', {
                        func: 'vivinoJson',
                        link: link
                    });
                    if (await response.data) {
                        console.log('response.data',response.data);
                        await this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'Получен json',
                            val: 'ok'
                        });
                        //await this.nextItem();
                        this.tableData['info'] = await response.data.info;
                        this.tableData['tastes'] = await response.data.tastes;
                        this.tableData['tastesReview'] = await response.data.tastesReview;
                        this.tableData['scoredReview'] = await response.data.scoredReview;
                        this.tableData['v_w_code'] = await response.data.v_w_code;
                        this.tableData['vivinoName'] = await response.data.vivinoName;
                        // this.tableData['check'] = this.check(this.tableData['p_s_name'], this.tableData['vivinoName']);
                        let obImage = await response.data.image.variations;

                        if (obImage.hasOwnProperty('bottle_large')) {
                            this.tableData['image'] = obImage.bottle_large;
                        } else if (obImage.hasOwnProperty('large')) {
                            this.tableData['image'] = obImage.large;
                        }

                        console.log('vivinoJson before save');
                        await this.vivinoSave();

                    } else {

                        await this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'НЕ Получен json ',
                            val: false
                        });

                    }
                } catch (error) {
                    console.log(error);
                    await this.currentAction.splice(this.currentAction.length - 1, 1, {
                        text: 'НЕ Получен json (error)',
                        val: false
                    });
                }
            },
            async vivinoSave() {
                this.currentAction.push({text: 'Сохраняем данные ', val: 'loading'});
                try {
                    let response = await axios.post('/vivino', {
                        func: 'saveJsonData',
                        row: this.tableData
                    });
                    if (response.data) {
                        await this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'Данные сохранены',
                            val: 'success'
                        });
                        this.tableData['finished'] = true;
                        console.log('vivinoSave before propsHighlights');
                        await this.propsHighlights();

                    }
                } catch (error) {
                    await this.currentAction.splice(this.currentAction.length - 1, 1, {
                        text: 'Данные не сохранены (error)',
                        val: false
                    });
                    this.tableData['finished'] = false;
                    await this.nextItem('vivinoSave error');
                    console.log(error);
                }
            },
            async propsHighlights() {
                this.currentAction.push({text: 'Формируем highlights', val: 'loading'});
                try {
                    let response = await axios.post('/vivino', {
                        func: 'props',
                        row: this.tableData,
                        case: 'highlights'
                    });
                    if (response.data) {
                        await this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'highlights',
                            val: 'success'
                        });
                        this.tableData['highlights'] = await this.itemsCnt(response.data.result);
                        console.log('propsHighlights before propsRecommended');
                        await this.propsRecommended();
                    }
                } catch (error) {
                    await this.currentAction.splice(this.currentAction.length - 1, 1, {
                        text: 'highlights не сохранено (error)',
                        val: false
                    });

                    await this.nextItem('propsHighlights error');
                    console.log(error);
                }
            },

            async propsRecommended() {
                this.currentAction.push({text: 'Формируем Recommended', val: 'loading'});
                try {
                    let response = await axios.post('/vivino', {
                        func: 'props',
                        row: this.tableData,
                        case: 'recommended'
                    });
                    if (response.data) {
                        await this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'recommended',
                            val: 'success'
                        });
                        this.tableData['recommended'] = await this.itemsCnt(response.data.result);
                        console.log('propsRecommended before propsReviews');
                        await this.propsReviews();
                    }
                } catch (error) {
                    await this.currentAction.splice(this.currentAction.length - 1, 1, {
                        text: 'recommended не сохранено (error)',
                        val: false
                    });
                    await this.nextItem('propsRecommended error');
                    console.log(error);
                }
            },
            async propsReviews() {
                this.currentAction.push({text: 'Формируем Reviews', val: 'loading'});
                try {
                    let response = await axios.post('/vivino', {
                        func: 'props',
                        row: this.tableData,
                        case: 'reviews'
                    });
                    if (response.data) {
                        await this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'Reviews',
                            val: 'success'
                        });
                        this.tableData['scoredReviews'] = await this.itemsCnt(response.data.result);
                        console.log('propsReviews before propsTastes');
                        await this.propsTastes();

                    }
                } catch (error) {
                    await this.currentAction.splice(this.currentAction.length - 1, 1, {
                        text: 'Reviews не сохранено (error)',
                        val: false
                    });

                    await this.nextItem('propsReviews error');
                    console.log(error);
                }
            },
            async propsTastes() {
                this.currentAction.push({text: 'Формируем propsTastes', val: 'loading'});
                try {
                    let response = await axios.post('/vivino', {
                        func: 'props',
                        row: this.tableData,
                        case: 'tastes'
                    });
                    if (response.data) {
                        await this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'propsTastes',
                            val: 'success'
                        });

                        this.tableData['group'] = await this.itemsCnt(response.data.result.group);
                        this.tableData['keywords'] = await this.itemsCnt(response.data.result.keywords);
                        this.tableData['reviewsTastes'] = await this.itemsCnt(response.data.result.reviews);
                        console.log('propsTastes before propsOthers');
                        await this.propsOthers();

                    }
                } catch (error) {
                    await this.currentAction.splice(this.currentAction.length - 1, 1, {
                        text: 'propsTastes не сохранено (error)',
                        val: false
                    });

                    await this.nextItem('propsTastes error');
                    console.log(error);
                }
            },

            async propsOthers() {
                this.currentAction.push({text: 'Формируем остальные', val: 'loading'});
                try {
                    let response = await axios.post('/vivino', {
                        func: 'props',
                        row: this.tableData,
                        case: 'others'
                    });
                    if (response.data) {
                        await this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'propsOthers',
                            val: 'success'
                        });

                        this.tableData['foods'] = await this.itemsCnt(response.data.result.foods);
                        this.tableData['grapes'] = await this.itemsCnt(response.data.result.grapes);
                        this.tableData['country'] = await this.itemsCnt(response.data.result.country);
                        this.tableData['region'] = await this.itemsCnt(response.data.result.region);
                        this.tableData['winery'] = await this.itemsCnt(response.data.result.winery);
                        this.tableData['style'] = await this.itemsCnt(response.data.result.style);
                        console.log('propsOthers before nextItem');
                        await this.nextItem('propsOthers success');

                    }
                } catch (error) {
                    await this.currentAction.splice(this.currentAction.length - 1, 1, {
                        text: 'propsOthers не сохранено (error)',
                        val: false
                    });

                    await this.nextItem('propsOthers error');
                    console.log(error);
                }
            },


            itemsCnt(result) {
                return result.length + '/+' + result.reduce((acc, c, i) => {
                    if (c) {
                        acc++
                    }
                    return acc
                }, 0);
            },
            check(a, b) {
                let arrVinStyle = a.replace(/[,.]/g, '').split(' ');
                let arrVivino = b.replace(/[,.]/g, '').split(' ');
                let arrVinStyleLength = arrVinStyle.length;
                let arrVivinoLength = arrVivino.length;
                let result = arrVivino.filter(function (i) {
                    return arrVinStyle.indexOf(i) !== -1;
                });
                let unique = result.filter(function (value, index, self) {
                    return self.indexOf(value) === index;
                });
                return arrVinStyleLength + '/' + arrVivinoLength + '/(' + unique.length + ')';
            },

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>

    .console {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 999999999999;
        width: 100%;
        box-sizing: border-box;
        padding: 20px 100px;
        background: rgba(255, 255, 255, 0.7);
    }
    .console p {
    }
    .console p span {
        display: inline-block;
        color: #000;
    }
    .console p span:first-of-type {
        width: 400px;
    }
    .console p span:last-of-type {
        color: red;
    }

    .bbb td, .bbb th {
        width: 200px;
        max-width: 200px;
    }
    .bbb img {
        max-width: 200px;
        max-height: 450px;
        width: auto;
        height: auto;
    }
    .bbb th {
        vertical-align: middle;
    }
    .bbb {}


    [type="text"] {
        width: 50px;
    }

    .product-error {
        cursor: pointer;
    }

    .some {
        background: rgb(140, 84, 51);
    }

    .vertical {
        -webkit-writing-mode: vertical-rl;
        writing-mode: tb-rl;
        display: flex;
        width: 100%;
        justify-content: center;


    }

    .vertical-inner {
        text-align: center;
        margin: 0 auto;
    }
</style>
