<style>
    .square-circle {
        width: 105px;
        aspect-ratio: 1;
        position: relative;
    }

    .square-circle:before,
    .square-circle:after {
        content: "";
        position: absolute;
        border-radius: 50px;
        box-shadow: 0 0 0 3px inset rgb(75 85 99);
        animation: sc 2.5s infinite;
    }

    .square-circle:after {
        animation-delay: -1.25s;
        border-radius: 0;
    }

    @keyframes sc {
        0% {
            inset: 0 75px 75px 0
        }

        12.5% {
            inset: 0 75px 0 0
        }

        25% {
            inset: 75px 75px 0 0
        }

        37.5% {
            inset: 75px 0 0 0
        }

        50% {
            inset: 75px 0 0 75px
        }

        62.5% {
            inset: 0 0 0 75px
        }

        75% {
            inset: 0 0 75px 75px
        }

        87.5% {
            inset: 0 0 75px 0
        }

        100% {
            inset: 0 75px 75px 0
        }
    }
</style>
<div role="status" class="grid h-80 place-items-center" id="loadingTrue">
    <br><br><br><br><br><br>
    <div role="status">
        <div class="square-circle"></div>
    </div>
</div>


@vite('resources/js/common/loading.js')
