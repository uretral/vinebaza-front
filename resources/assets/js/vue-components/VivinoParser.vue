<template>
    <div class="root">

        <Row :space="10" type="flex" align="middle">

            <Cell>Стартовый ID:</Cell>
            <Cell v-if="vivinoStart">
                <input type="text" v-model="vivinoStart">
            </Cell>
            <Cell>Товаров за сеанс:</Cell>
            <Cell v-if="vivinoPerSeance">
                <input type="text" v-model="vivinoPerSeance">
            </Cell>
            <Cell>ID текущего товара:</Cell>
            <Cell>
                <input type="text" v-model="vivinoCurrent">
            </Cell>

            <Cell v-if="vivinoPause">
                <Button :color="vivinoPause ? '' : 'primary'" icon="h-icon-right"
                        @click="startParse(),vivinoPause = false">Старт
                </Button>
            </Cell>
            <Cell v-if="!vivinoPause">
                <Button :color="vivinoPause ? 'primary' : ''" icon="h-icon-down" @click="vivinoPause = true">Пауза
                </Button>
            </Cell>
        </Row>

        <Row :space="10" type="flex" align="middle">
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

    </div>
</template>



<script>
    import {mapState, mapMutations, mapActions, mapGetters} from 'vuex';

    export default {
        name: 'VivinoParser',
        props: ['donors'],
        data() {
            return {
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
                tableData: [],
                currentAction: [],

            }
        },
        computed: {
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
        },
        methods: {

            showAction(key) {
                this.$set(this.$data, 'currentActionKey', key);
            },
            async nextItem() {
                if (!this.vivinoPause) {
                    await this.startParse()
                }
            },
            prepareObj() {
                let newObj = {}
                for (let t in this.table) {
                    newObj[t] = null;
                }
                return newObj
            },
            async startParse() {

                // let id = this.vivinoPagesCount ? this.vivinoStart - 1 :
                this.tableData.unshift(this.prepareObj());
                this.currentAction = [];
                try {
                    this.currentAction.push({text: 'Получение продукта', val: 'loading'});
                    let response = await axios.post('/vivino', {
                        func: 'search',
                        id: this.vivinoCurrent
                    });
                    if (response.data) {
                        if (response.data === 'double') {
                            this.currentAction.splice(this.currentAction.length - 1, 1, {
                                text: 'Продукт спарсен',
                                val: 'в базе'
                            });
                            this.tableData[0].step = 'база';
                            this.vivinoCurrent++;
                            await this.nextItem();
                        } else {
                            this.vivinoCurrent = await response.data.id;
                            this.search.name = await response.data.name;
                            this.tableData[0].step = 1;
                            this.tableData[0].p_id = await response.data.id;
                            this.tableData[0].p_code = await response.data.code;
                            this.tableData[0].p_s_name = await response.data.name;
                            this.currentAction.splice(this.currentAction.length - 1, 1, {
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
                        name: this.tableData[0].p_s_name.replace(/'/g, '')
                    });
                    if (response.data === 'nothing') {
                        this.tableData[0].v_s_code = null;
                        this.tableData[0].step = await this.tableData[0].step + 1;
                        this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'НЕ найден продукт',
                            val: false
                        });
                        this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'Попытка #' + this.tableData[0].step,
                            val: false
                        });
                        if (this.tableData[0].step <= 3) {
                            await this.vivinoSearch();
                        } else {
                            await this.nextItem();
                        }
                    } else {
                        console.log( this.tableData[0]);
                        this.tableData[0].v_s_code = Number(response.data.replace('/wines/', ''));
                        this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'Найден продукт',
                            val: this.tableData[0].v_s_code
                        });
                        await this.vivinoJson(this.tableData[0].v_s_code);
                    }
                } catch (error) {
                    this.currentAction.splice(this.currentAction.length - 1, 1, {
                        text: 'НЕ найден продукт (error)',
                        val: false
                    });
                    console.log(error);
                }
            },
// json
            async vivinoJson(link) {
                this.currentAction.push({text: 'Получаем json', val: 'loading'});
                try {
                    let response = await axios.post('/vivino', {
                        func: 'vivinoJson',
                        link: link
                    });
                    if (await response.data) {
                        this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'Получен json',
                            val: 'ok'
                        });
                        this.tableData[0].info = await response.data.info;
                        this.tableData[0].tastes = await response.data.tastes;
                        this.tableData[0].tastesReview = await response.data.tastesReview;
                        this.tableData[0].scoredReview = await response.data.scoredReview;
                        this.tableData[0].v_w_code = await response.data.v_w_code;
                        this.tableData[0].vivinoName = await response.data.vivinoName;
                        this.tableData[0].check = this.check(this.tableData[0].p_s_name, this.tableData[0].vivinoName);
                        let obImage = await response.data.image.variations;

                        if (obImage.hasOwnProperty('bottle_large')) {
                            this.tableData[0].image = obImage.bottle_large;
                        } else if (obImage.hasOwnProperty('large')) {
                            this.tableData[0].image = obImage.large;
                        }

                        await this.vivinoSave();

                    } else {

                        this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'НЕ Получен json',
                            val: false
                        });

                    }
                } catch (error) {
                    console.log(error);
                    this.currentAction.splice(this.currentAction.length - 1, 1, {
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
                        row: this.tableData[0]
                    });
                    if (response.data) {
                        this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'Данные сохранены',
                            val: 'success'
                        });
                        this.tableData[0].finished = true;
                        await this.propsHighlights();

                    }
                } catch (error) {
                    this.currentAction.splice(this.currentAction.length - 1, 1, {
                        text: 'Данные не сохранены (error)',
                        val: false
                    });
                    this.tableData[0].finished = false;
                    await this.nextItem();
                    console.log(error);
                }
            },
            async propsHighlights() {
                this.currentAction.push({text: 'Формируем highlights', val: 'loading'});
                try {
                    let response = await axios.post('/vivino', {
                        func: 'props',
                        row: this.tableData[0],
                        case: 'highlights'
                    });
                    if (response.data) {
                        this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'highlights',
                            val: 'success'
                        });
                        this.tableData[0].highlights = await this.itemsCnt(response.data.result);

                        await this.propsRecommended();
                    }
                } catch (error) {
                    this.currentAction.splice(this.currentAction.length - 1, 1, {
                        text: 'highlights не сохранено (error)',
                        val: false
                    });

                    await this.nextItem();
                    console.log(error);
                }
            },

            async propsRecommended() {
                this.currentAction.push({text: 'Формируем Recommended', val: 'loading'});
                try {
                    let response = await axios.post('/vivino', {
                        func: 'props',
                        row: this.tableData[0],
                        case: 'recommended'
                    });
                    if (response.data) {
                        this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'recommended',
                            val: 'success'
                        });
                        this.tableData[0].recommended = await this.itemsCnt(response.data.result);
                        await this.propsReviews();
                    }
                } catch (error) {
                    this.currentAction.splice(this.currentAction.length - 1, 1, {
                        text: 'recommended не сохранено (error)',
                        val: false
                    });
                    await this.nextItem();
                    console.log(error);
                }
            },
            async propsReviews() {
                this.currentAction.push({text: 'Формируем Reviews', val: 'loading'});
                try {
                    let response = await axios.post('/vivino', {
                        func: 'props',
                        row: this.tableData[0],
                        case: 'reviews'
                    });
                    if (response.data) {
                        this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'Reviews',
                            val: 'success'
                        });
                        this.tableData[0].scoredReviews = await this.itemsCnt(response.data.result);

                        await this.propsTastes();

                    }
                } catch (error) {
                    this.currentAction.splice(this.currentAction.length - 1, 1, {
                        text: 'Reviews не сохранено (error)',
                        val: false
                    });

                    await this.nextItem();
                    console.log(error);
                }
            },
            async propsTastes() {
                this.currentAction.push({text: 'Формируем propsTastes', val: 'loading'});
                try {
                    let response = await axios.post('/vivino', {
                        func: 'props',
                        row: this.tableData[0],
                        case: 'tastes'
                    });
                    if (response.data) {
                        this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'propsTastes',
                            val: 'success'
                        });

                        this.tableData[0].group = await this.itemsCnt(response.data.result.group);
                        this.tableData[0].keywords = await this.itemsCnt(response.data.result.keywords);
                        this.tableData[0].reviewsTastes = await this.itemsCnt(response.data.result.reviews);

                        await this.propsOthers();

                    }
                } catch (error) {
                    this.currentAction.splice(this.currentAction.length - 1, 1, {
                        text: 'propsTastes не сохранено (error)',
                        val: false
                    });

                    await this.nextItem();
                    console.log(error);
                }
            },

            async propsOthers() {
                this.currentAction.push({text: 'Формируем остальные', val: 'loading'});
                try {
                    let response = await axios.post('/vivino', {
                        func: 'props',
                        row: this.tableData[0],
                        case: 'others'
                    });
                    if (response.data) {
                        this.currentAction.splice(this.currentAction.length - 1, 1, {
                            text: 'propsOthers',
                            val: 'success'
                        });

                        this.tableData[0].foods = await this.itemsCnt(response.data.result.foods);
                        this.tableData[0].grapes = await this.itemsCnt(response.data.result.grapes);
                        this.tableData[0].country = await this.itemsCnt(response.data.result.country);
                        this.tableData[0].region = await this.itemsCnt(response.data.result.region);
                        this.tableData[0].winery = await this.itemsCnt(response.data.result.winery);
                        this.tableData[0].style = await this.itemsCnt(response.data.result.style);

                        await this.nextItem();

                    }
                } catch (error) {
                    this.currentAction.splice(this.currentAction.length - 1, 1, {
                        text: 'propsOthers не сохранено (error)',
                        val: false
                    });

                    await this.nextItem();
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

<style>
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

    .root {
        max-width: unset;
        width: 100%;
    }
</style>
