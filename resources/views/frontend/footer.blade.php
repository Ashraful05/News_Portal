<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">{{ FOOTER_COLUMN_1_HEADING }}</h2>
                    <p>
                        {{FOOTER_COLUMN_1_TEXT}}
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">{{ FOOTER_COLUMN_2_HEADING }}</h2>
                    <ul class="useful-links">
                        <li><a href="{{ route('front_home') }}">{{HOME}}</a></li>
                        @if($global_pages->terms_status == 'show')
                            <li><a href="{{ route('front_terms') }}">Terms and Conditions</a></li>
                        @endif
                        @if($global_pages->privacy_status == 'show')
                            <li><a href="{{ route('front_privacy') }}">Privacy Policy</a></li>
                        @endif
                        @if($global_pages->disclaimer_status == 'show')
                            <li><a href="{{ route('front_disclaimer') }}">Disclaimer</a></li>
                        @endif
                        @if($global_pages->contact_status == 'show')
                            <li><a href="{{ route('front_contact') }}">Contact</a></li>
                        @endif
                    </ul>
                </div>
            </div>


            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">{{FOOTER_COLUMN_3_HEADING}}</h2>
                    <div class="list-item">
                        <div class="left">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="right">
                            {{FOOTER_ADDRESS}}
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="right">
                            {{FOOTER_EMAIL}}
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="right">
                            {{ FOOTER_PHONE }}
                        </div>
                    </div>
                    <ul class="social">
                        @foreach($global_social_media as $media)
                            <li><a href="{{ $media->url }}"><i class="{{ $media->icon }}"></i></a></li>
                        @endforeach

                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">{{FOOTER_COLUMN_4_HEADING}}</h2>
                    <p>
                        {{NEWS_LETTER_TEXT}}:
                    </p>
                    <form action="{{ route('subscribe') }}" method="post" class="form_contact_ajax">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="email" placeholder="{{EMAIL_ADDRESS}}" class="form-control">
                            <span class="text-danger error-text email_error"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="{{SUBSCRIBE_NOW}}">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    (function($){
        $(".form_contact_ajax").on('submit', function(e){
            e.preventDefault();
            $('#loader').show();
            var form = this;
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.error-text').text('');
                },
                success:function(data)
                {
                    $('#loader').hide();
                    if(data.code == 0)
                    {
                        $.each(data.error_message, function(prefix, val) {
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }
                    else if(data.code == 1)
                    {
                        $(form)[0].reset();
                        iziToast.success({
                            title: '',
                            position: 'topRight',
                            message: data.success_message,
                        });
                    }

                }
            });
        });
    })(jQuery);
</script>
<div id="loader"></div>

@if(session()->get('success_message'))
    <script>
        iziToast.success({
            title:'',
            position:'topRight',
            message: '{{ session()->get('success_message') }}'
        });
    </script>
@endif
