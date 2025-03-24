<style>
    .loading-three {
        display: inline-block;
        text-align: center;
        line-height: 86px;
        text-align: center;
        position: relative;
        padding: 0 48px;
        font-size: 48px;
        font-family: Arial, Helvetica, sans-serif;
        color: #3f3d3d;
    }

    .loading-three:before,
    .loading-three:after {
        content: "";
        display: block;
        width: 15px;
        height: 15px;
        background: currentColor;
        position: absolute;
        animation: load .7s infinite alternate ease-in-out;
        top: 0;
    }

    .loading-three:after {
        top: auto;
        bottom: 0;
    }

    @keyframes load {
        0% {
            left: 0;
            height: 43px;
            width: 15px;
            transform: translateX(0)
        }

        50% {
            height: 10px;
            width: 40px
        }

        100% {
            left: 100%;
            height: 43px;
            width: 15px;
            transform: translateX(-100%)
        }
    }
</style>

<div role="status" class="grid h-80 place-items-center" id="loadingTrue">
    <br><br><br><br><br><br>
    <div role="status">
        <div class="loading-three">Loading</div>
    </div>
</div>


@vite('resources/js/common/loading.js')
