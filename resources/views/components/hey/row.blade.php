<div {{$attributes}}>
    {{$slot}}
    <div v-if="type != 'flex'" class="h-row-clear"></div>
</div>
