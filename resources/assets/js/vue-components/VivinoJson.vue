<template>
    <div>

        JSON SPLITTER
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
                        @click="start">Старт
                </Button>
            </Cell>
            <Cell v-if="!vivinoPause">
                <Button :color="vivinoPause ? 'primary' : ''" icon="h-icon-down" @click="vivinoPause = true">Пауза
                </Button>
            </Cell>
            <template v-for="(cell,cellKey) in table">
                <Cell width="1"><Checkbox v-model="cell.make">{{cell.name}}</Checkbox></Cell>
            </template>
        </Row>











    </div>
</template>



<script>
    import {mapState, mapMutations, mapActions, mapGetters} from 'vuex';

    import axios from 'axios'

    export default {
        name: 'VivinoJSON',
        props: ['donors'],
        data() {
            return {
                vivinoPause: true,
                table: {
                    price: {name:'Цена', make: true},
                    rating: {name:'Рейтинг', make: true},
                    review: {name:'Отзыв', make: true},


                    /*                    finished: 'Успех',
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
                                        style: 'Стиль',*/
                },

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
        },
        methods: {

            async start(){
                this.vivinoPause = false
                await this.nextItem(this.comparisonStart)

            },
            async nextItem(prevID) {
                try {
                    let response = await axios.post('/vivino_json', {prevID:prevID})
                    if(response) {
                        // console.log(response.data.id);

                        if(!this.vivinoPause){
                            this.comparisonStart = await response.data.id
                           await this.start()
                        }
                    }
                } catch (e) {
                    this.vivinoPause = true
                    console.log('error',e);
                }
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
