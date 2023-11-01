<div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
    <div class="me-10">
        <button class="btn btn-flex btn-link btn-color-gray-700 btn-active-color-primary rotate fs-base" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-offset="0px, 0px">
            @if (LaravelLocalization::getCurrentLocaleName() == 'English')
                <img data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3" src="{{asset('assets/media/flags/united-states.svg')}}" alt="" /></span></span>
                <span data-kt-element="current-lang-name" class="me-1">English</span>
            @else
                <img data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3" src="{{asset('assets/media/flags/saudi-arabia.svg')}}" alt="" /></span></span>
                <span data-kt-element="current-lang-name" class="me-1">العربية</span>
            @endif

        </button>
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7" data-kt-menu="true" id="kt_auth_lang_menu">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <div class="menu-item px-3">
                    <a class="menu-link d-flex px-5 active" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"  data-language="{{ $localeCode }}">
                        @if ($properties['native'] == 'English')
                        <span class="symbol symbol-20px me-4">
                            <img class="rounded-1" src="{{asset('assets/media/flags/united-states.svg')}}" alt="" />
                        </span>
                        @endif
                        @if ($properties['native'] == 'العربية')
                        <span class="symbol symbol-20px me-4">
                            <img class="rounded-1" src="{{asset('assets/media/flags/saudi-arabia.svg')}}" alt="" />
                        </span>
                        @endif
                        {{ $properties['native'] }}
                    </a>
                </div>
            @endforeach
        </div>

    </div>

</div>
