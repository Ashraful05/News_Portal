@extends('frontend.frontend_master')
@section('title','Previous Poll Result')
@section('main_content')
    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Poll Results</h2>
                    <nav class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front_home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Poll Results</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    @foreach($onlinePollData as $data)
                        @if($loop->iteration == 1)
                            @continue
                        @endif
                    <div class="poll-item">
                        <div class="question">
                            Question: {{ $data->question }}?
                        </div>
                        <div class="poll-date">
                            @php
                                $ts = strtotime($data->created_at);
                                $created_date = date('d F, Y',$ts);
                            @endphp
                            <b>Poll Date:</b>{{ $created_date }}
                        </div>


                        <div class="total-vote">
                            @php
                                if( $data->yes_vote>0 || $data->no_vote>0)
                                {
                                    $totalVote = $data->yes_vote + $data->no_vote;
                                    $totalYesVotePercentage = floor(($data->yes_vote * 100)/$totalVote);
                                    $totalNoVotePercentage  = floor(($data->no_vote * 100)/$totalVote);
                                }
                                else{
                                    $totalVote = 0;
                                    $totalYesVotePercentage=0;
                                    $totalNoVotePercentage=0;
                                }
                            @endphp
                            <b>Total Votes:</b> {{ $totalVote }}
                        </div>
                        <div class="poll-result">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Yes ({{ $data->yes_vote }})</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $totalYesVotePercentage }}%" aria-valuenow="{{ $totalYesVotePercentage }}" aria-valuemin="0" aria-valuemax="100">
                                                    {{ $totalYesVotePercentage }}%</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No ({{ $data->no_vote }})</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{$totalNoVotePercentage}}%" aria-valuenow="{{$totalNoVotePercentage}}" aria-valuemin="0" aria-valuemax="100">
                                                    {{$totalNoVotePercentage}}%</div>
                                            </div>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
@endsection
