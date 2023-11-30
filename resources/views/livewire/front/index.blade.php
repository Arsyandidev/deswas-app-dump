@push('css')
    <style>
        .circle {
            padding: 13px 20px;
            border-radius: 50%;
            background-color: #ED8D8D;
            color: #fff;
            max-height: 50px;
            z-index: 2;
        }

        .how-it-works.row .col-2 {
            align-self: stretch;
        }

        .how-it-works.row .col-2.bottom::after {
            height: 50%;
            left: 50%;
            top: 50%;
        }

        .how-it-works.row .col-2.full::after {
            height: 100%;
            left: calc(50% - 3px);
        }

        .how-it-works.row .col-2.top::after {
            height: 50%;
            left: 50%;
            top: 0;
        }


        .timeline div {
            padding: 0;
            height: 40px;
        }

        .timeline hr {
            border-top: 3px solid #ED8D8D;
            margin: 0;
            top: 17px;
            position: relative;
        }

        .timeline .col-2 {
            display: flex;
            overflow: hidden;
        }

        .timeline .corner {
            border: 3px solid #ED8D8D;
            width: 100%;
            position: relative;
            border-radius: 15px;
        }

        .timeline .top-right {
            left: 50%;
            top: -50%;
        }

        .timeline .left-bottom {
            left: -50%;
            top: calc(50% - 3px);
        }

        .timeline .top-left {
            left: -50%;
            top: -50%;
        }

        .timeline .right-bottom {
            left: 50%;
            top: calc(50% - 3px);
        }

        @media only screen and (max-width:768px) {

            .container {
                margin-top: 66px;
            }

        }

        .height {
            height: 100vh;
        }

        .card-testi {

            border: none;
            cursor: pointer;
            box-shadow: 0 0 40px rgba(51, 51, 51, .1)
        }

        .card-testi:hover {

            background-color: #eee;

        }

        .ratings i {

            color: orange;
        }

        .testimonial-list {

            list-style: none;
        }

        .testimonial-list li {

            margin-bottom: 20px;
        }

        .testimonials-margin {

            margin-top: -19px;
        }
    </style>
@endpush

<div>
    <x-navbar></x-navbar>

    <x-hero></x-hero>

    <x-timeline></x-timeline>
    <x-ask></x-ask>

    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <br>

    <x-article></x-article>
    <br><br>

    <x-footer></x-footer>
</div>
