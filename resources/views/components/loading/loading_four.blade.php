<style>
    .loading-four {
        width: 175px;
        height: 80px;
        display: block;
        margin: auto;
        background-image: radial-gradient(circle 25px at 25px 25px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 50px at 50px 50px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 25px at 25px 25px, rgb(75 85 99) 100%, transparent 0), linear-gradient(rgb(75 85 99) 50px, transparent 0);
        background-size: 50px 50px, 100px 76px, 50px 50px, 120px 40px;
        background-position: 0px 30px, 37px 0px, 122px 30px, 25px 40px;
        background-repeat: no-repeat;
        position: relative;
        box-sizing: border-box;
    }

    .loading-four::before {
        content: '';
        left: 60px;
        bottom: 18px;
        position: absolute;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background-color: #f1eeec;
        background-image: radial-gradient(circle 8px at 18px 18px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 4px at 18px 0px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 4px at 0px 18px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 4px at 36px 18px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 4px at 18px 36px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 4px at 30px 5px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 4px at 30px 5px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 4px at 30px 30px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 4px at 5px 30px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 4px at 5px 5px, rgb(75 85 99) 100%, transparent 0);
        background-repeat: no-repeat;
        box-sizing: border-box;
        animation: rotationBack 3s linear infinite;
    }

    .loading-four::after {
        content: '';
        left: 94px;
        bottom: 15px;
        position: absolute;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: #f1eeec;
        background-image: radial-gradient(circle 5px at 12px 12px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 2.5px at 12px 0px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 2.5px at 0px 12px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 2.5px at 24px 12px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 2.5px at 12px 24px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 2.5px at 20px 3px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 2.5px at 20px 3px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 2.5px at 20px 20px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 2.5px at 3px 20px, rgb(75 85 99) 100%, transparent 0), radial-gradient(circle 2.5px at 3px 3px, rgb(75 85 99) 100%, transparent 0);
        background-repeat: no-repeat;
        box-sizing: border-box;
        animation: rotationBack 4s linear infinite reverse;
    }

    @keyframes rotationBack {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(-360deg);
        }
    }
</style>
<div role="status" class="grid h-80 place-items-center" id="loadingTrue">
    <br><br><br><br><br><br>
    <div role="status">
        <div class="loading-four"></div>
    </div>
</div>


@vite('resources/js/common/loading.js')
