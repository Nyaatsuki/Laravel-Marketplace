@if(session()->has('success'))
<div class="flashSuccess" x-data="{show: true}" x-init='setTimeout(() => show = false, 4000)' x-show='show'>
    <span>{{ session('success') }}</span>
</div>
@endif