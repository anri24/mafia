<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('assets/css/timer.css') }}">


<!-- full container -->
<div class = "border container-fluid">
    <!-- plus/minus buttons -->
    <div class = "spaceTop col-sm-8 col-sm-push-8">
        <div class = "row">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button style="margin-right: 10px" type="button" class="btn btn-secondary" id="minus">- 10 sec</button>
                <button type="button" class="btn btn-secondary" id="plus">+10 sec</button>
            </div>
        </div>
    </div>
    <!-- jumbotron with timer inside -->
    <div class = "container-fluid">
        <div class="jumbotron jumbotron-fluid infoSection">
            <div class="container">
                <h1 class="display-3 text-center" id = "time">30</h1>
            </div>
        </div>
    </div>
    <!-- start/stop buttons -->
    <div class = "spaceBottom col-sm-4 col-sm-push-3">
        <div class = "row">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-secondary" id="stop">Stop</button>
                <button type="button" class="btn btn-secondary" id="start">Start</button>
            </div>
        </div>
    </div>
    <div>

    </div>
</div>

<script src="{{ asset('assets/js/timer.js') }}" ></script>

