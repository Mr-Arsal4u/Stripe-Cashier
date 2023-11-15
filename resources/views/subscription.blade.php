<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <table class="table">
        <thead>
            @if (count($subscriptions) > 0)
                <tr>
                    <th scope="col">plan Name</th>

                    <th scope="col">sub Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Start</th>
                    <th scope="col">End</th>
                    <th scope="col">Auto Renew</th>

                </tr>
                <style>
                    .switch {
                        position: relative;
                        display: inline-block;
                        width: 60px;
                        height: 34px;
                    }

                    /* Hide default HTML checkbox */
                    .switch input {
                        opacity: 0;
                        width: 0;
                        height: 0;
                    }

                    /* The slider */
                    .slider {
                        position: absolute;
                        cursor: pointer;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        background-color: #ccc;
                        -webkit-transition: .4s;
                        transition: .4s;
                    }

                    .slider:before {
                        position: absolute;
                        content: "";
                        height: 26px;
                        width: 26px;
                        left: 4px;
                        bottom: 4px;
                        background-color: white;
                        -webkit-transition: .4s;
                        transition: .4s;
                    }

                    input:checked+.slider {
                        background-color: #2196F3;
                    }

                    input:focus+.slider {
                        box-shadow: 0 0 1px #2196F3;
                    }

                    input:checked+.slider:before {
                        -webkit-transform: translateX(26px);
                        -ms-transform: translateX(26px);
                        transform: translateX(26px);
                    }

                    /* Rounded sliders */
                    .slider.round {
                        border-radius: 34px;
                    }

                    .slider.round:before {
                        border-radius: 50%;
                    }
                </style>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

                <script>
                    $(document).ready(function() {
                        $('#switcher').click(function() {
                            var subscriptionName = $('#switcher').val();

                            if ($(this).is(":checked")) {
                                $.ajax({
                                    url: '{{ route("subscription.resume") }}',
                                    data: {
                                         subscriptionName
                                    },
                                    type: "GET",
                                    success: function(response) {
                                    },
                                    error: function(response) {
                                    }
                                });
                            } else {
                                $.ajax({
                                    url: '{{ route("subscription.cancel") }}',
                                    data: {
                                         subscriptionName
                                    },
                                    type: "GET",
                                    success: function(response) {
                                    },
                                    error: function(response) {
                                    }
                                });
                            }
                        });
                    });
                </script>

        </thead>
        <tbody>
            @foreach ($subscriptions as $subscription)
                <tr>
                    <td>{{ $subscription->plan->name }}</td>
                    <td>{{ $subscription->name }}</td>
                    <td>{{ $subscription->plan->price }}</td>
                    <td>{{ $subscription->quantity }}</td>
                    <td>{{ $subscription->created_at }}</td>
                    <td>{{ $subscription->trial_ends_at }}</td>
                    <td>
                        <label class="switch">
                            @if ($subscription->ends_at == null)
                            <input id="switcher" checked type="checkbox" value="{{ $subscription->name }}">

                            @else
                            <input id="switcher" type="checkbox" value="{{ $subscription->name }}">

                            @endif
                            <span class="slider round"></span>
                        </label>

                    </td>
                </tr>
            @endforeach
        @else
            <h1>No Subscription </h1>
            @endif

        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
