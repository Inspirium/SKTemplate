@extends('sktemplate::layout')

@section('content')

    <!-- Activity Stream -->

    <div class="content">
        <div class="page-name-xl mb-1 mt-2">@lang('Activity Stream')</div>
        <h4 class="activity-day weight-600 text-uppercase">@lang('Today')</h4>
        @php $today = true; @endphp
        @foreach ($notifications as $notification)
            @if(!$notification->created_at->isToday() && $today)
                <h4 class="activity-day weight-600 text-uppercase mt-5">@lang('Older Activity')</h4>
                @php $today = false; @endphp
            @endif
        <div class="activity align-items-center mt-1">
            @if(isset($notification->data['tasktype']))
                @if(is_array($notification->data['tasktype']))
                    <div class="activity-label mx-1 {{ $notification->data['tasktype']['className'] }}">{{ $notification->data['tasktype']['title'] }}</div>
                @else
                    <div class="activity-label mx-1 tasktype-1">{{ $notification->data['tasktype'] }}</div>
                @endif
            @endif
            <div class="activity-avatar file-box-sty d-flex align-items-center">
                <a href="{{ $notification->data['sender']['link'] }}">
                    <img class="profile-l mx-3" src="{{ $notification->data['sender']['image'] }}">
                </a>
            </div>
            <div class="activity-content">
                <h4 class="activitiy-user"><a href="{{ $notification->data['link'] }}">{{ $notification->data['title'] }}</a></h4>
                <h5>{{ $notification->data['message'] }}</h5>
                <div class="activity-time">{{ $notification->created_at->toDateTimeString() }}</div>
            </div>
        </div>
        @endforeach





    </div>
@endsection


