<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="This is a Website for E-Book Community" />
    <meta name="author" content="Osamu" />
    <title>Xl_Xzle</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .comic-episode {
            display: none; 
            width: 100%;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fafafa;
            text-align: center;
        }

        .comic-page {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .controls {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 20px;
        }

        button {
            padding: 10px 20px;
            font-size: 1.2em;
            cursor: pointer;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }

        button:disabled {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <?php include('read_novel_nav.php'); ?>

    <div class="comic-container">
        <!-- ตอนที่ 1 -->
        <section class="comic-episode" id="episode1">
            <h2>ตอนที่ 1: การเริ่มต้น</h2>
            <img src="./novel_page/1_1.jpg" alt="การ์ตูนหน้า 1" class="comic-page">
            <img src="./novel_page/1_2.jpg" alt="การ์ตูนหน้า 2" class="comic-page">
            <img src="./novel_page/1_3.jpg" alt="การ์ตูนหน้า 3" class="comic-page">
            <img src="./novel_page/1_4.jpg" alt="การ์ตูนหน้า 4" class="comic-page">
            <img src="./novel_page/1_5.jpg" alt="การ์ตูนหน้า 5" class="comic-page">
            <img src="./novel_page/1_6.jpg" alt="การ์ตูนหน้า 6" class="comic-page">
        </section>

        <!-- ตอนที่ 2 -->
        <section class="comic-episode" id="episode2">
            <h2>ตอนที่ 2: การผจญภัย</h2>
            <img src="./novel_page/ตอนที่2/2-1.jpg" alt="การ์ตูนหน้า 1" class="comic-page">
            <img src="./novel_page/ตอนที่2/2-2.jpg" alt="การ์ตูนหน้า 1" class="comic-page">
            <img src="./novel_page/ตอนที่2/2-3.jpg" alt="การ์ตูนหน้า 1" class="comic-page">
            <img src="./novel_page/ตอนที่2/2-4.jpg" alt="การ์ตูนหน้า 1" class="comic-page">
            <img src="./novel_page/ตอนที่2/2-5.jpg" alt="การ์ตูนหน้า 1" class="comic-page">
            <img src="./novel_page/ตอนที่2/2-6.jpg" alt="การ์ตูนหน้า 1" class="comic-page">
            <img src="./novel_page/ตอนที่2/2-7.jpg" alt="การ์ตูนหน้า 1" class="comic-page">
            <img src="./novel_page/ตอนที่2/2-8.jpg" alt="การ์ตูนหน้า 1" class="comic-page">
            <img src="./novel_page/ตอนที่2/2-9.jpg" alt="การ์ตูนหน้า 1" class="comic-page">
            <img src="./novel_page/ตอนที่2/2-10.jpg" alt="การ์ตูนหน้า 1" class="comic-page">
            <img src="./novel_page/ตอนที่2/2-11.jpg" alt="การ์ตูนหน้า 1" class="comic-page">
            <img src="./novel_page/ตอนที่2/2-12.jpg" alt="การ์ตูนหน้า 1" class="comic-page">
            <img src="./novel_page/ตอนที่2/2-13.jpg" alt="การ์ตูนหน้า 1" class="comic-page">
            <img src="./novel_page/ตอนที่2/2-14.jpg" alt="การ์ตูนหน้า 1" class="comic-page">
            <img src="./novel_page/ตอนที่2/2-15.jpg" alt="การ์ตูนหน้า 1" class="comic-page">
            <img src="./novel_page/ตอนที่2/2-16.jpg" alt="การ์ตูนหน้า 1" class="comic-page">

        </section>

        <!-- ตอนที่ 3 -->
        <section class="comic-episode" id="episode3">
            <h2>ตอนที่ 3: การทดสอบ</h2>
            <img src="./novel_page/ตอนที่3/3-1.jpg" alt="การ์ตูนหน้า 1" class="comic-page">
        </section>

        <div class="controls">
            <button id="prevButton">ย้อนกลับ</button>
            <button id="nextButton">ถัดไป</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const episodes = document.querySelectorAll('.comic-episode');
            let currentEpisodeIndex = 0;

            episodes.forEach(episode => episode.style.display = 'none');
            episodes[currentEpisodeIndex].style.display = 'block';

            const nextButton = document.getElementById('nextButton');
            nextButton.addEventListener('click', function() {
                goToNextEpisode();
            });

            const prevButton = document.getElementById('prevButton');
            prevButton.addEventListener('click', function() {
                goToPreviousEpisode();
            });

            function goToNextEpisode() {
                if (currentEpisodeIndex < episodes.length - 1) {
                    episodes[currentEpisodeIndex].style.display = 'none';
                    currentEpisodeIndex++;
                    episodes[currentEpisodeIndex].style.display = 'block';
                }
                updateButtons();
            }

            function goToPreviousEpisode() {
                if (currentEpisodeIndex > 0) {
                    episodes[currentEpisodeIndex].style.display = 'none';
                    currentEpisodeIndex--;
                    episodes[currentEpisodeIndex].style.display = 'block';
                }
                updateButtons();
            }

            function updateButtons() {
                prevButton.disabled = currentEpisodeIndex === 0;
                nextButton.disabled = currentEpisodeIndex === episodes.length - 1;
            }

            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const episodeNumber = link.getAttribute('data-episode');
                    showEpisode(episodeNumber);
                });
            });

            function showEpisode(episodeNumber) {
                episodes.forEach(episode => episode.style.display = 'none');
                const episodeToShow = document.getElementById('episode' + episodeNumber);
                episodeToShow.style.display = 'block';
            }

            document.querySelector('.nav-link').addEventListener('click', function(e) {
    e.preventDefault(); // ป้องกันการทำงานปกติ
    location.reload();  // ทำให้หน้าโหลดใหม่
    
});


            updateButtons();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
