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
    $currentLanguageId = \App\Models\Language::where('language_short_name',$current_short_name)->first()->id;
@endphp

<div class="sidebar">

    <div class="widget">
        @foreach($global_sidebar_top_ad as $row)
            <div class="ad-sidebar">
                @if($row->sidebar_ad_url == '')
                    <img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt="">
                @else
                    <a href="{{ $row->sidebar_ad_url }}"><img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt=""></a>
                @endif

            </div>
        @endforeach
    </div>

    <div class="widget">
        <div class="tag-heading">
            <h2>Tags</h2>
        </div>
        <div class="tag">
            @php
                $tags = \App\Models\Tag::select('tag_name')->distinct()->get();
            @endphp
            @foreach($tags as $tag)
                @php
                    $count = 0;
                    $allData = \App\Models\Tag::where('tag_name',$tag->tag_name)->get();
                    $allPostIds = [];
                    foreach ($allData as $tagdata)
                        {
                            $temp = \App\Models\NewsPosts::where('id',$tagdata->post_id)->where('language_id',$currentLanguageId)->count();
                            if($temp > 0){
                                $count = 1;
                                break;
                            }
                        }
                    if($count == 0){
                        continue;
                    }

                @endphp
                <div class="tag-item">
                    <a href="{{ route('show_tag_post',$tag->tag_name) }}"><span class="badge bg-secondary">{{ $tag->tag_name }}</span></a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="widget">
        <div class="archive-heading">
            <h2>Archive</h2>
        </div>
        <div class="archive">
            @php
                $archive_array = [];
                $all_post_data = \App\Models\NewsPosts::orderBy('id','desc')->get();
                foreach($all_post_data as $row) {
                    $ts = strtotime($row->created_at);
                    $month = date('m',$ts);
                    $month_full = date('F',$ts);
                    $year = date('Y',$ts);
                    $archive_array[] = $month.'-'.$month_full.'-'.$year;
                }
                $archive_array = array_values(array_unique($archive_array));
            @endphp
            <form action="{{ route('archive_show') }}" method="post">
                @csrf
                <select name="archive_month_year" class="form-select" onchange="this.form.submit()">
                    <option value="">Select Month</option>
                    @for($i=0;$i<count($archive_array);$i++)
                        @php
                            $temp_arr = explode('-',$archive_array[$i]);
                        @endphp
                        <option value="{{ $temp_arr[0].'-'.$temp_arr[2] }}">{{ $temp_arr[1] }}, {{ $temp_arr[2] }}</option>
                    @endfor

                </select>
            </form>
        </div>
    </div>

    <div class="widget">
        @php
            $liveChannelData = \App\Models\LiveChannel::where('language_id',$currentLanguageId)->get();
        @endphp
        @foreach($liveChannelData as $data)
            <div class="live-channel">
                <div class="live-channel-heading">
                    <h2>{{ $data->heading }}</h2>
                </div>
                <div class="live-channel-item">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $data->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        @endforeach
    </div>

    <div class="widget">
        <div class="news">
            <div class="news-heading">
                <h2>Popular & Recent News</h2>
            </div>

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Recent News</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Popular News</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @php
                        $recentNewsData = \App\Models\NewsPosts::orderby('id','desc')
                                           ->where('language_id',$currentLanguageId)
                                           ->limit(4)
                                           ->get();
                    @endphp
                    @foreach($recentNewsData as $data)
                        <div class="news-item">
                            <div class="left">
                                <img src="{{ asset('uploads/'.$data->post_photo) }}" alt="">
                            </div>
                            <div class="right">
                                <div class="category">
                                    <span class="badge bg-success">{{ $data->rSubCategory->sub_category_name }}</span>
                                </div>
                                <h2><a href="{{ route('news_details',$data->id) }}">{{ $data->post_title }}</a></h2>
                                <div class="date-user">
                                    <div class="user">
                                        @if($data->author_id == 0)
                                            @php
                                                $userData = \App\Models\Admin::where('id',$data->admin_id)->first();
                                            @endphp
                                        @else
                                            @php
                                                $userData = \App\Models\Author::where('id',$data->author_id)->first();
                                            @endphp
                                        @endif
                                        <a href="javascript:void;">{{ $userData->name }}</a>
                                    </div>
                                    <div class="date">
                                        @php
                                            $ts = strtotime($data->updated_at);
                                            $updated_at = date('d F Y',$ts);
                                        @endphp
                                        <a href="">{{ $updated_at }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @php
                        $popularNewsData = \App\Models\NewsPosts::orderby('visitors','desc')
                                            ->where('language_id',$currentLanguageId)
                                            ->limit(4)
                                            ->get();
                    @endphp
                    @foreach($popularNewsData as $data)
                        <div class="news-item">
                            <div class="left">
                                <img src="{{ asset('uploads/'.$data->post_photo) }}" alt="">
                            </div>
                            <div class="right">
                                <div class="category">
                                    <span class="badge bg-success">{{ $data->rSubCategory->sub_category_name }}</span>
                                </div>
                                <h2><a href="{{ route('news_details',$data->id) }}">{{$data->post_title}}</a></h2>
                                <div class="date-user">
                                    <div class="user">
                                        @if($data->author_id == 0 )
                                            @php
                                                $userData = \App\Models\Admin::where('id',$data->admin_id)->first();
                                            @endphp
                                        @else
                                            @php
                                                $userData = \App\Models\Author::where('id',$data->author_id)->first();
                                            @endphp
                                        @endif
                                        <a href="javascript:void;">{{ $userData->name }}</a>
                                    </div>
                                    <div class="date">
                                        @php
                                            $ts = strtotime($data->updated_at);
                                            $updated_at = date('d F Y',$ts);
                                        @endphp
                                        <a href="">{{ $updated_at }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="widget">
        @foreach($global_sidebar_bottom_ad as $row)
            <div class="ad-sidebar">
                @if($row->sidebar_ad_url == '')
                    <img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt="">
                @else
                    <a href="{{ $row->sidebar_ad_url }}"><img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt=""></a>
                @endif

            </div>
        @endforeach

    </div>

    <div class="widget">
        <div class="poll-heading">
            <h2>Online Poll</h2>
        </div>
        @php
            $onlinePollData = \App\Models\OnlinePoll::where('language_id',$currentLanguageId)->orderby('id','desc')->first();
        @endphp
        <div class="poll">
            <div class="question">
                {{ $onlinePollData->question }}
            </div>

            @php
                if( $onlinePollData->yes_vote > 0 || $onlinePollData->no_vote > 0)
                {
                    $totalVote = $onlinePollData->yes_vote + $onlinePollData->no_vote;
                   $totalYesVotePercentage = floor(($onlinePollData->yes_vote * 100)/$totalVote);
                   $totalNoVotePercentage  = floor(($onlinePollData->no_vote * 100)/$totalVote);
                }

            @endphp
            @if(Session::get('current_poll_id') == $onlinePollData->id)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td style="width: 100px">Yes ({{$onlinePollData->yes_vote}})</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{$totalYesVotePercentage}}%" aria-valuenow="{{$totalYesVotePercentage}}" aria-valuemin="0" aria-valuemax="100">
                                        {{$totalYesVotePercentage}}%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 100px">No ({{$onlinePollData->no_vote}})</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{$totalNoVotePercentage}}%" aria-valuenow="{{$totalNoVotePercentage}}" aria-valuemin="0" aria-valuemax="100">
                                        {{$totalNoVotePercentage}}%</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <a href="{{ route('previous_poll_result') }}" class="btn btn-primary old" style="margin-top: 0">Old Result</a>
            @endif

            @if(Session::get('current_poll_id') != $onlinePollData->id)
                <div class="answer-option">
                    <form action="{{ route('poll_submit',$onlinePollData->id) }}" method="post">
                        @csrf
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="vote" id="poll_id_1" value="yes">
                            <label class="form-check-label" for="poll_id_1">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="vote" id="poll_id_2" value="no">
                            <label class="form-check-label" for="poll_id_2">No</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('previous_poll_result') }}" class="btn btn-primary old">Old Result</a>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>

</div>
