@extends('vendor.log-viewer.bootstrap-4._master_log')

@section('content')
            <div class="log">
                <a href="{{ route('log-viewer::logs.list') }}">Danh sách lỗi</a>
            </div>
    <div class="container-fluid">
        <main role="main" class="pt-3">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <canvas id="stats-doughnut-chart" height="300" class="mb-3"></canvas>
                </div>

                <div class="col-md-6 col-lg-9">
                    <div class="row">
                        @foreach ($percents as $level => $item)
                            <div class="col-sm-6 col-md-12 col-lg-4 mb-3">
                                <div class="box level-{{ $level }} {{ $item['count'] === 0 ? 'empty' : '' }}">
                                    <div class="box-icon">
                                        {!! log_styler()->icon($level) !!}
                                    </div>

                                    <div class="box-content">
                                        <span class="box-text">{{ $item['name'] }}</span>
                                        <span class="box-number">
                                            {{ $item['count'] }} @lang('entries') - {!! $item['percent'] !!} %
                                        </span>
                                        <div class="progress" style="height: 3px;">
                                            <div class="progress-bar" style="width: {{ $item['percent'] }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection

@section('scripts')
    <script>
        $(function() {
            new Chart(document.getElementById("stats-doughnut-chart"), {
                type: 'doughnut',
                data: {!! $chartData !!},
                options: {
                    legend: {
                        position: 'bottom'
                    }
                }
            });
        });
    </script>
@endsection
