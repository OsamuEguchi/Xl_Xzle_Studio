<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Layout</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: black;
            color: white;
            padding: 10px;
        }

        .header div {
            margin: 0 10px;
        }

        .background {
            color: black;
            margin-left: 0px ;
            width: 100% ;
            height: 300px ;
        }

        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .episodes {
            background-color: black;
            color: white;
            padding: 10px;
            border-radius: 8px;
            width: 50%;
        }

        .episode {
            display: flex;
            align-items: center;
            background-color: white;
            color: black;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .episode:hover {
            background-color: #f0f0f0;
        }

        .episode img {
            width: 100px;
            height: 100px;
            border-radius: 4px;
            margin-right: 10px;
        }

        .episode-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .controls {
            text-align: center;
            margin: 20px 0;
        }

        .episode-title {
            font-weight: bold;
            text-align: center;
        }

        .timestamp {
            font-size: 12px;
            color: gray;
            text-align: right;
        }

        .controls span, .controls button {
            background-color: black;
            color: white;
            margin: 0 5px;
            padding: 10px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        .details {
            background-color: gray;
            color: black;
            padding: 10px;
            margin-left: 20px;
            border-radius: 8px;
            flex: 1;
        }

        .details h2 {
            margin: 0;
        }

        .footer {
            background-color: black;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .actions button {
            margin: 5px;
            background-color: white;
            color: black;
            border: 1px solid black;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .actions button:hover {
            background-color: black;
            color: white;
        }

        .episode .ep {
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            padding: 0px;
            margin: 0px;
            text-decoration: underline;  
        }

     
    </style>
</head>
<body>
    <?php include 'nav.php' ?>

    <img src="./assets/img/pre_novel_wallpaper_test.jpg" alt="#" class="background"> 

    <div class="container">
        <div class="episodes">
            <div class="episode">
                <a href="./read_novel_1.php">
                    <img src="./assets/img/fortune_white_card.png"  alt="Episode 1 Image">
                </a>
                <div class="ep">ใส่ชื่อตอนที่นี่</div>
            </div>
            <div class="episode">
                <img src="./assets/img/fortune_white_card.png" alt="Episode 2 Image">
                <div class="ep">ใส่ชื่อตอนที่นี่</div>
            </div>
            <div class="episode">
                <img src="./assets/img/fortune_white_card.png" alt="Episode 3 Image">
                <div class="ep">ใส่ชื่อตอนที่นี่</div>
            </div>
            <div class="episode">
                <img src="./assets/img/fortune_white_card.png" alt="Episode 4 Image">
                <div class="ep">ใส่ชื่อตอนที่นี่</div>
            </div>
            <div class="episode">
                <img src="./assets/img/fortune_white_card.png" alt="Episode 5 Image">
                <div class="ep">ใส่ชื่อตอนที่นี่</div>
            </div>

            <div class="controls">
                <span class="shell" id="left-shell"></span>
                <span>1</span>
                <span>2</span>
                <span>3</span>
                <span>4</span>
                <span>5</span>
                <span>6</span>
                <span class="shell" id="right-shell"></span>
            </div>
        </div>

        <div class="details">
            <div class="actions">
                <button>view</button>
                <button>sub</button>
                <button>rate</button>
                <button>Contact</button>
            </div>
            <h2>Preface</h2>
        </div>
    </div>

    <?php include 'footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
