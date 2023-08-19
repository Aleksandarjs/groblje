@extends('cms.layout.container')

@section('content')
<div class="col-sm-9 main">
    <div class="row main__title">
        <div class="col-sm-8">
            <h2><i class="fas fa-list"></i>{{ $title }}</h2>
            <p>{{ __('app.add') }}</p>
        </div>
        <div class="col-sm-4 shortcuts">
            <a
                href="{{ url('cms') }}"
                class="shortcut"
                data-toggle="tooltip"
                data-placement="bottom"
                title="{{ __('app.daschlow') }}"
            >
                <i class="fas fa-desktop"></i>
            </a>
            <a
                href="{{ url('cms/'.$route) }}"
                class="shortcut"
                data-toggle="tooltip"
                data-placement="bottom"
                title="{{ __('app.list') }}"
            >
                <i class="far fa-clone"></i>
            </a>
            <a
                href="{{ url('cms/'.$route.'/create') }}"
                class="shortcut"
                data-toggle="tooltip"
                data-placement="bottom"
                title="{{ __('app.add') }}"
            >
                <i class="fas fa-plus"></i>
            </a>
            <a
                href="https://symple.kayako.com/"
                target="_blank"
                class="shortcut"
                data-toggle="tooltip"
                data-placement="bottom"
                title="Support"
            >
                <i class="fas fa-question"></i>
            </a>
        </div>
    </div>
    @include('cms.partials.alerts')
    <form method="post" action="@if(!$editing) {{ url('cms/'.$route) }} @else {{ url('cms/'.$route.'/'.$item->id) }} @endif" enctype="multipart/form-data">
        @csrf
        @if($editing) @method('PUT') @endif
        <div class="form__wrap">
            <div class="row form__title">
                <h3>{{ $title }}</h3>
            </div>
            <div class="row form__block">
                <div class="col-md-3">
                    <label class="label-left">
                        {{ __('app.title')}}
                    </label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="title" class="input-default" placeholder="{{ __('app.title')}}" value="{{ old('title', $item->title) }}" {!! $errors->has('title') ? 'style="border-color:red;"' : '' !!}>
                </div>
            </div>
            @if($item->id!=5 && $item->id!=11)
            <div class="row form__block">
                <div class="col-md-3">
                    <label class="label-left">
                        {{ __('app.subtitle')}}
                    </label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="subtitle" class="input-default" placeholder="{{ __('app.subtitle')}}" value="{{ old('subtitle', $item->subtitle) }}" {!! $errors->has('subtitle') ? 'style="border-color:red;"' : '' !!}>
                </div>
            </div>
            @endif
            @if($item->id==8)
            <div class="row form__block">
                <div class="col-md-3">
                    <label class="label-left">
                        {{ __('app.telefon')}}
                    </label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="telefon" class="input-default" placeholder="{{ __('app.telefon')}}" value="{{ old('telefon', $item->telefon) }}" {!! $errors->has('telefon') ? 'style="border-color:red;"' : '' !!}>
                </div>
            </div>
            @endif
            @if($item->id!=3 && $item->id!=8 && $item->id!=10)
            <div class="row form__title">
                <h3> {{ __('app.description')}}</h3>
            </div>
            <textarea name="description" id="description" rows="5" class="textarea-default editor" placeholder="{{ __('app.description')}}" {!! $errors->has('description') ? 'style="border-color:red;"' : '' !!}>
                {{ old('description', $item->description) }}
            </textarea>
            @endif
            @if($item->id!=1 && $item->id!=3 && $item->id!=5 && $item->id!=6 && $item->id!=7 && $item->id!=8 && $item->id!=9 && $item->id!=10 && $item->id!=11 && $item->id!=12 && $item->id!=13 && $item->id!=14)
            <div class="row form__block">
                <div class="col-md-3">
                    <label class="label-left">
                        {{ __('app.url')}}
                    </label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="url" class="input-default" placeholder="{{ __('app.url')}}" value="{{ old('url', $item->url) }}" {!! $errors->has('url') ? 'style="border-color:red;"' : '' !!}>
                </div>
            </div>
            <div class="row form__block">
                <div class="col-md-3">
                    <label class="label-left">
                        {{ __('app.urltitle')}}
                    </label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="urltitle" class="input-default" placeholder="{{ __('app.urltitle')}}" value="{{ old('urltitle', $item->urltitle) }}" {!! $errors->has('urltitle') ? 'style="border-color:red;"' : '' !!}>
                </div>
            </div>
            @endif
            @foreach($pics as $key => $i)
            @if($width[$i] != 0 || $height[$i] != 0)
            <div class="row form__block">
                <div class="col-md-3">
                    <label class="label-left">
                        {{ __($key) }} ({{ $width[$i] }}x{{ $height[$i] }}px):
                    </label>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="add-image">
                                <div class="add-image-wrap"  {!! $errors->has($i) ? 'style="border-color:red;"' : '' !!}>
                                    @if(!is_null($item[$i]) && $item[$i]!='')<a href="{{ url('cms/'.$route.'/imagedelete/'.$item->id.'?image='.$i) }}"><span class="add-image-btn"><i class="fas fa-times"></i></span></a>@endif
                                    @if(is_null($item[$i]) || $item[$i]=='')
                                    <a href="{{ asset('cmsfiles/images/photo.png') }}" data-fancybox="photo">
                                        <img src="{{ asset('cmsfiles/images/photo.png') }}" alt="photo">
                                    </a>
                                    @else
                                    <a href="{{ asset('storage/'.$item[$i]) }}" data-fancybox="photo">
                                        <img src="{{ asset('storage/'.$item[$i]) }}" alt="photo">
                                    </a>
                                    @endif
                                </div>
                                <label for="my-file{{ $i }}" class="input-file-trigger{{ $i }}">
                                <input name="{{ $i }}" class="input-file{{ $i }}" id="my-file{{ $i }}" type="file">
                                    <span >{{ __('app.bildaktual') }}</span>
                                </label>
                                <script>
                                    var fileInput = document.querySelector(".input-file{{ $i }}"),
                                        button = document.querySelector(".input-file-trigger{{ $i }}");
            
                                    button.addEventListener("keydown", function (event) {
                                        if (event.keyCode == 13 || event.keyCode == 32) {
                                            fileInput.focus();
                                        }
                                    });
                                    button.addEventListener("click", function () {
                                        fileInput.focus();
                                        return false;
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            <div class="row form__submit">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="button">@if($editing){{ __('app.edit') }}@else{{ __('app.add') }}@endif</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $('input[type="file"]').change(function() {        
        readURL(this, $(this).parents('.add-image').children('.add-image-wrap').find('img'));
    });

    tinymce.init({
        selector : ".editor",
        language : "{{ str_replace('_', '-', app()->getLocale()) }}",
        plugins : ["advlist autolink lists link charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table paste "],
        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code",
    });
</script>  
@endsection
