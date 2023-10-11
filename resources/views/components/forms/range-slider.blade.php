<div wire:ignore class="ranger" x-data="ranger( {
    min: @entangle($min),
    max: @entangle($max),
    rangeInputMin: {{$dynamicMin}},
    rangeInputMax: {{$dynamicMax}},
    staticMax: {{$staticMax}},
    gap: {{$gap}}
} )">

    <div class="ranger-values">
        <span><em x-text="min"></em> {{$icon}}</span>
        <span><em x-text="max"></em> {{$icon}}</span>
    </div>

    <div class="ranger-wrapper">
        <input type="hidden" class="input-min" x-model="min" @input="updateMin()">
        <input type="hidden" class="input-max" x-model="max" @input="updateMax()">

        <div class="ranger-slider">
            <div class="ranger-progress" x-ref="progress" :style="style"></div>
        </div>
        <div class="ranger-input">
            <input type="range" class="range-min" min="{{$staticMin}}" max="{{$staticMax}}" x-model="rangeInputMin" step="{{$step}}" @input="slideMin()" @change="trigger()">
            <input type="range" class="range-max" min="{{$staticMin}}" max="{{$staticMax}}" x-model="rangeInputMax" step="{{$step}}" @input="slideMax()" @change="trigger()">
        </div>
    </div>
</div>

