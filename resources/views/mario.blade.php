<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mario Animation</title>
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }
        .dashboard-icon {
            width: 100px;
            height: 100px;
            background-color: #548CFF;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            color: white;
            font-size: 14px;
        }
        .mario-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none; /* 初期状態で非表示 */
        }
        .mario {
            position: relative;
            width: 100px;
            height: 100px;
            background: url('https://deshinon.com/wp-content/uploads/2019/03/mario_run.gif') no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <!-- Dashboardアイコン -->
    <div class="dashboard-icon" id="dashboardIcon">
        Click Me!
    </div>

    <!-- マリオ表示エリア -->
    <div class="mario-container" id="marioContainer">
        <div class="mario"></div>
    </div>

    <script>
        // Dashboardアイコンのクリックイベント
        document.getElementById('dashboardIcon').addEventListener('click', function() {
            const marioContainer = document.getElementById('marioContainer');

            // マリオを表示
            marioContainer.style.display = 'block';

            // 3秒後に非表示にする
            setTimeout(() => {
                marioContainer.style.display = 'none';
            }, 3000);
        });
    </script>
</body>
</html>


/*<!DOCTYPE html>*/
/*<html lang="en">*/
/*<head>*/
/*    <meta charset="UTF-8">*/
/*    <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/*    <title>Super Mario Animation</title>*/
/*    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">*/
/*    <style>*/
        /* CSSの内容をここに埋め込む */
/*        html, body {*/
/*            font-family: 'Press Start 2P', cursive;*/
/*            height: 100%;*/
/*            width: 100%;*/
/*            overflow: hidden;*/
/*            margin: 0;*/
/*            padding: 0;*/
/*        }*/
/*        .sky, .ground {*/
/*            position: relative;*/
/*        }*/
/*        .sky {*/
/*            height: 90%;*/
/*            background-color: #548CFF;    */
/*        }*/
/*        .ground {*/
/*            height: 10%;*/
/*            background-color: #C84C0C;*/
/*            background-image: url('https://raw.githubusercontent.com/LantareCode/random-this-and-thats/master/CSS/SuperMario-Animation/images/groundblock.png');*/
/*        }*/
/*        .scorebar {*/
/*            position: absolute;*/
/*            height: 120px;*/
/*            width: 100%;*/
/*            font-size: 180%;*/
/*            color: white;*/
/*            padding-left: 50px;*/
/*            padding-right: 50px;*/
/*            line-height: 0.2;*/
/*        }*/
/*        .cloud {*/
/*            position: absolute;*/
/*            height: 100px;*/
/*        }*/
/*        .cloud:nth-child(2) {*/
/*            top: 120px; */
/*            animation: wind 80s both infinite linear reverse; */
/*        }*/
/*        .cloud:nth-child(3) {*/
/*            top: 280px;*/
/*            animation: wind 50s both infinite linear reverse;*/
/*        }*/
/*        .cloud:nth-child(4) {*/
/*            top: 450px;*/
/*            animation: wind 30s both infinite linear reverse;*/
/*        }*/
/*        .skyblocks {*/
/*            position: absolute;   */
/*            top: -250px;*/
/*        }*/
/*        .brick {*/
/*            position: fixed;        */
/*            margin: -2px;*/
/*        }*/
/*        .brick:nth-child(1) { left:600px; }*/
/*        .brick:nth-child(2) { left:670px; }*/
/*        .brick:nth-child(3) { left:740px; }*/
/*        .brick:nth-child(4) { left:810px; }*/
/*        .bush {*/
/*            position: absolute;*/
/*            top: -70px;*/
/*        }*/
/*        .bush:nth-child(1) { left:*/
