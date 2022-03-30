<div class="nav_s">
</div>
<form method="GET" action="{{route('periphery')}}">
    <input class="field" name="s" id="s" placeholder="搜索" type="text">
    <input class="field" name="fl" hidden value="{{$select}}">
    <input class="submit" id="searchsubmit" value="" type="submit">
</form>