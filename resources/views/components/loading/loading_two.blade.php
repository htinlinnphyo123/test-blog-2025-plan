<style>
    .loading-two {
        display: inline-block;
        font-size: 48px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        color: #333131;
        position: relative;
    }

    .loading-two::before {
        content: '';
        position: absolute;
        left: 34px;
        bottom: 19px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 5px solid #201f1f;
        border-bottom-color: #FF3D00;
        box-sizing: border-box;
        animation: rotation 0.6s linear infinite;
    }

    @keyframes rotation {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div role="status" class="grid h-80 place-items-center" id="loadingTrue">
    <br><br><br><br><br><br>
    <div role="status">
        <span class="loading-two">L &nbsp; ading</span>
    </div>
</div>
@vite('resources/js/common/loading.js')
