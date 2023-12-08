@if(!session()->get('session_short_name'))
    @php
        $current_short_name = $global_default_language_data;
    @endphp
@else
    @php
        $current_short_name = session()->get('session_short_name');
    @endphp
@endif
@php
    $currentLanguageId = \App\Models\Language::where('language_short_name',$current_short_name)->first();
@endphp

<div class="website-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('front_home') }}">{{HOME}}</a>
                            </li>
                            @foreach($global_categories as $category)
                                @if($currentLanguageId->id == $category->language_id)
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ $category->category_name }}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @foreach($category->rSubCategory as $subcategory)
                                                <li><a class="dropdown-item" href="{{ route('category',$subcategory->id) }}">{{ $subcategory->sub_category_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
