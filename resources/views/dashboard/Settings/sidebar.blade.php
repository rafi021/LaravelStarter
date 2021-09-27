<div class="list-group">
    <a href="{{ route('settings.general') }}" class="list-group-item list-group-item-action {{ Route::is('settings.general') ? 'active' : ''  }}">
        General
    </a>
    <a href="{{ route('settings.appearance.index') }}" class="list-group-item list-group-item-action {{ Route::is('settings.appearance.index') ? 'active' : ''  }}">
        Appearance</a>

    <a href="{{ route('settings.mail.index') }}" class="list-group-item list-group-item-action {{ Route::is('settings.mail.index') ? 'active' : ''  }}">
        Mail
    </a>
    <a href="{{ route('settings.socialite.index') }}" class="list-group-item list-group-item-action {{ Route::is('settings.socialite.index') ? 'active' : ''  }}">
        Socialite
    </a>
</div>
