<div class="root" x-data="vivinoParser({
   start: @entangle('start').live ,
  output: @entangle('output').live,
  results: @entangle('results').live
  })">
    {{--    @foreach($results as $result)
            {{$result}}
        @endforeach
        {{$test}}

            {{$start}}--}}
    <br/>
    <div x-on:test-event.window="test = $event.detail" x-text="test"></div>
    <div class="h-row-flex h-row-flex-middle" style="margin: -5px;">
        <div class="h-col" style="margin: 5px;">Стартовый ID:</div>
        <div class="h-col" style="margin: 5px;"><input type="text" wire:model.live="startId"></div>
        <div class="h-col" style="margin: 5px;">Товаров за сеанс:</div>
        <div class="h-col" style="margin: 5px;"><input type="text" wire:model.live="perSeance"></div>
        <div class="h-col" style="margin: 5px;">ID искомого товара:</div>
        <div class="h-col" style="margin: 5px;" ><input type="text" style="width: 100px" wire:model="concreteWineId"></div>

        <div class="h-col" style="margin: 5px;">
            <button type="button" class="h-btn" @click="makeStart()">
                <span x-text="startBtnState"></span>
            </button>

            <button type="button" class="h-btn" wire:click="parseKnownProduct">
                <span>По wine id</span>
            </button>

            <button type="button" class="h-btn" @click="makeTest()">
                <span>TEST</span>
            </button>

        </div>

        <div class="h-col" style="margin: 5px;">
            <div>
                {{var_export($jobResponse)}}
            </div>
        </div>
    </div>
    <div class="h-row-flex h-row-flex-middle" style="margin: -5px;">

        <x-admin.vivino-parser-actions-row>
            Действие:
            <span> <span class="h-tag h-tag-green" x-on:action.window="action = $event.detail"
                         x-text="action"></span></span> {{--{{$currentAction}}--}}
            Результат:
            <template x-if="php.output.hasOwnProperty('error')">
                <span> (error) <span class="h-tag h-tag-red" x-text="php.output.error"></span></span>
            </template>
            <template x-if="php.output.hasOwnProperty('message')">
                <span> (Success) <span class="h-tag h-tag-primary" x-text="php.output.message"></span></span>
            </template>
            {{--            @if(array_key_exists('error',$output))
                            <span> (error) <span class="h-tag h-tag-red">{{$output['error']}}</span></span>
                        @endif
                        @if(array_key_exists('message',$output))
                            <span> (Success) <span class="h-tag h-tag-primary">{{$output['message']}}</span></span>
                        @endif--}}

        </x-admin.vivino-parser-actions-row>

        <div style="width: 100%; overflow-x: auto;">
            <x-admin.vivino-parser-table>
                <tr>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-blue">1</span></td>
                    <td><span class="h-tag h-tag-blue">108</span></td>
                    <td><span class="h-tag h-tag-blue">96203</span></td>
                    <td><span class="h-tag h-tag-blue">Conte di Campiano Primitivo di Manduria DOC</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                    <td><span class="h-tag h-tag-gray">null</span></td>
                </tr>
            </x-admin.vivino-parser-table>
        </div>
    </div>
</div>
