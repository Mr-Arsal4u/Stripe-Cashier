<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
    :root {
        --main-color: #08886e;
    }

    .pricingTable {
        color: var(--main-color);
        background: var(--main-color);
        font-family: 'Open Sans', sans-serif;
        text-align: center;
        padding: 30px 15px 18px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        position: relative;
        z-index: 1;
    }

    .pricingTable:before,
    .pricingTable:after {
        content: "";
        background: #EEEEEE;
        width: 100%;
        height: 120px;
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        clip-path: polygon(0 0, 100% 0, 100% 50%, 85% 100%, 15% 100%, 0% 50%);
    }

    .pricingTable:after {
        transform: rotateX(180deg);
        top: auto;
        bottom: 0;
    }

    .pricingTable .pricingTable-header {
        margin: 0 0 55px;
    }

    .pricingTable .title {
        font-size: 40px;
        font-weight: 700;
        text-transform: capitalize;
        margin: 0;
    }

    .pricingTable .pricing-content {
        color: #fff;
        text-align: left;
        padding: 0;
        margin: 0 0 20px;
        list-style: none;
        display: inline-block;
    }

    .pricingTable .pricing-content li {
        font-size: 17px;
        font-weight: 500;
        text-transform: capitalize;
        line-height: 35px;
        padding: 0 0 0 25px;
        margin: 0 0 5px;
        position: relative;
    }

    .pricingTable .pricing-content li:last-child {
        margin: 0;
    }

    .pricingTable .pricing-content li:before {
        content: "\f00c";
        color: #fff;
        font-family: "Font Awesome 5 free";
        font-size: 14px;
        font-weight: 900;
        position: absolute;
        top: 2px;
        left: 0;
    }

    .pricingTable .pricing-content li.disable:before {
        content: "\f00d";
    }

    .pricingTable .price-value {
        margin: 0 0 15px;
    }

    .pricingTable .price-value .amount {
        font-size: 45px;
        font-weight: 600;
        line-height: 45px;
        display: inline-block;
    }

    .pricingTable .price-value .duration {
        font-size: 25px;
        font-weight: 600;
        line-height: 30px;
        text-transform: capitalize;
        margin: 0 0 0 -10px;
        vertical-align: bottom;
        display: inline-block;
    }

    .pricingTable .pricingTable-signup a {
        color: var(--main-color);
        font-size: 22px;
        font-weight: 700;
        text-transform: capitalize;
        text-decoration: underline;
        display: inline-block;
        transition: all 0.3s ease-in-out;
    }

    .pricingTable .pricingTable-signup a:hover {
        letter-spacing: 3px;
        text-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
    }

    .pricingTable.orange {
        --main-color: #fc7a00;
    }

    .pricingTable.red {
        --main-color: #2f5fc7;
    }

    @media only screen and (max-width: 990px) {
        .pricingTable {
            margin: 0 0 40px;
        }
    }
</style>
</head>
<body>
<div class="demo">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                        <h3 class="title">Standard</h3>
                    </div>
                    <ul class="pricing-content">
                        <li>50GB Disk Space</li>
                        <li>50 Email Accounts</li>
                        <li>50GB Bandwidth</li>
                        <li class="disable">Maintenance</li>
                        <li class="disable">15 Subdomains</li>
                    </ul>
                    <div class="price-value">
                        <span class="amount">$10/</span>
                        <span class="duration">month</span>
                    </div>
                    <div class="pricingTable-signup">
                    <a href="{{ route('checkout', $basic->plan_id) }}">Buy Plan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable orange">
                    <div class="pricingTable-header">
                        <h3 class="title">Business</h3>
                    </div>
                    <ul class="pricing-content">
                        <li>50GB Disk Space</li>
                        <li>50 Email Accounts</li>
                        <li>50GB Bandwidth</li>
                        <li>Maintenance</li>
                        <li class="disable">15 Subdomains</li>
                    </ul>
                    <div class="price-value">
                        <span class="amount">$20/</span>
                        <span class="duration">month</span>
                    </div>
                    <div class="pricingTable-signup">
                        <a href="{{ route('checkout', $standard->plan_id )}}">Buy Plan</a>
                    </div>
                </div>
            </div>
             <div class="col-md-4 col-sm-6">
                <div class="pricingTable orange">
                    <div class="pricingTable-header">
                        <h3 class="title">Business</h3>
                    </div>
                    <ul class="pricing-content">
                        <li>50GB Disk Space</li>
                        <li>50 Email Accounts</li>
                        <li>50GB Bandwidth</li>
                        <li>Maintenance</li>
                        <li class="disable">15 Subdomains</li>
                    </ul>
                    <div class="price-value">
                        <span class="amount">$20/</span>
                        <span class="duration">month</span>
                    </div>
                    <div class="pricingTable-signup">
                        <a href="{{ route('checkout', $professional->plan_id )}}">Buy Plan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>


