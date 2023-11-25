@extends('tpl.admin')
@section('admin')
    <div data-v-c82ec18a="" class="root">
        <div data-v-c82ec18a="" class="h-row-flex h-row-flex-middle" style="margin: -5px;">
            <div data-v-c82ec18a="" class="h-col" style="margin: 5px;">Стартовый ID:</div>
            <div data-v-c82ec18a="" class="h-col" style="margin: 5px;"><input data-v-c82ec18a="" type="text"></div>
            <div data-v-c82ec18a="" class="h-col" style="margin: 5px;">Товаров за сеанс:</div>
            <div data-v-c82ec18a="" class="h-col" style="margin: 5px;"><input data-v-c82ec18a="" type="text"></div>
            <div data-v-c82ec18a="" class="h-col" style="margin: 5px;">ID текущего товара:</div>
            <div data-v-c82ec18a="" class="h-col" style="margin: 5px;"><input data-v-c82ec18a="" type="text"></div>
            <!---->
            <div data-v-c82ec18a="" class="h-col" style="margin: 5px;">
                <button data-v-c82ec18a="" type="button" class="h-btn"><i class="h-icon-down"></i><span>Пауза </span>
                </button>
            </div> <!----></div>
        <div data-v-c82ec18a="" class="h-row-flex h-row-flex-middle" style="margin: -5px;">
            <div data-v-c82ec18a="" class="h-col"
                 style="margin: 21px 5px; padding: 11px 21px; width: 100%; background: rgba(210, 214, 222, 0.39);">
                Текущее действие: <span data-v-c82ec18a=""> Получен продукт <span data-v-c82ec18a=""
                                                                                  class="h-tag h-tag-green">108</span></span><span
                    data-v-c82ec18a=""> НЕ найден продукт (error) <span data-v-c82ec18a=""
                                                                        class="h-tag h-tag-red">null</span></span></div>
            <div data-v-c82ec18a="" style="width: 100%; overflow-x: auto;">
                <table data-v-c82ec18a="" class="table">
                    <thead data-v-c82ec18a="">
                    <tr data-v-c82ec18a="">
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Успех</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">попытка</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a=""
                                                                           class="vertical-inner">ID</span></div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Код продукта</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Имя WinStyle</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Имя Vivino </span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Сходство</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Винтаж ID</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Вино ID</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Основа</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Вкусы</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Отзывы вкус</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Отзывы оценка</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Изображения</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">highlights</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Задачи +</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Группы</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Ключ. слова</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Ревью</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Ревью +</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Кухня</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Виноград</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Страна</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Регион</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Производство</span>
                            </div>
                        </th>
                        <th data-v-c82ec18a="">
                            <div data-v-c82ec18a="" class="vertical"><span data-v-c82ec18a="" class="vertical-inner">Стиль</span>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody data-v-c82ec18a="">
                    <tr data-v-c82ec18a="">
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-blue">1</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-blue">108</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-blue">96203</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-blue">Conte di Campiano Primitivo di Manduria DOC</span>
                        </td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                        <td data-v-c82ec18a=""><span data-v-c82ec18a="" class="h-tag h-tag-gray">null</span></td>
                    </tr>
                    </tbody>
                </table>
            </div> <!----></div>
    </div>

@endsection
