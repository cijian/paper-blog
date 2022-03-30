<?php
    $cate = \App\Models\Animation\Cate::query()->select(['id','name','action'])->get();
?>


@foreach ($cate as $key => $value)
    <a class="channel {{ $value->id == $now?"channel-now":"" }}" href="{{ route($value->action) }}" />
    <span>{{ $value->name }}</span>
    </a>
@endforeach