@if (Auth::guard('web')->check())
<p>
    you are login in user
</p>
@else

you are logout user

@endif

@if (Auth::guard('admin')->check())
<p>
    you are login in admin
</p>
@else
<p>
you are logout admin
</p>
@endif