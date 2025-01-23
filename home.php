<!DOCTYPE html>
<html lang="en" serviceby="xdnvccloud" alt="xdnvccloud">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="<?php echo $config['name']; ?> - ยินดีต้อนรับ">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $_SERVER['SERVER_NAME'] ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="og:image" content="<?php echo $config['logo']; ?>">
    <meta property="og:description" content="<?php echo $config['des']; ?>">
    <title><?php echo $config['name']; ?></title>
    <link rel="shortcut icon" href="<?php echo $config['logo']; ?>" type="image/png" sizes="16x16">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://kit-pro.fontawesome.com/releases/v6.4.0/css/pro.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Kanit&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Rubik:wght@900&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Pridi:wght@600&display=swap");

        :root {
            --main: <?php echo $config["main_color"]; ?>;
            --sub: <?php echo $config["sec_color"]; ?>;
            --font: <?= $config["font_color"]; ?>;
            --main-color: #63c4ff;
            --sub-color: #fff;
            --main-sub: linear-gradient(90deg , var(--main) 0%, var(--sub) 100%)!important;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Kanit", sans-serif;
        }

        

        .bg-cover {
            position: fixed;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            width: 100%;
            min-height: 100vh;
            z-index: -10;
        }

        .bg-80 {
            width: 100%;
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bg-80-center {
            width: 1200px;
            height: auto;
        }

        .float-ani {
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translatey(0px);
            }

            50% {
                transform: translatey(-30px);
            }

            100% {
                transform: translatey(0px);
            }
        }

        .btn-main {
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border-radius: 10px;
            width: 200px;
            padding: 20px;
            filter: drop-shadow(0 0 10px var(--main));
            background-color: var(--main);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-main:hover {
            color: white;
            background-color: var(--main-color);
            border: 2.5px solid var(--main-color);
            filter: drop-shadow(0 0 10px var(--main));
        }

        .btn-main:hover {
            background-color: var(--main);
            transform: translateY(-5px);
            border: 2.5px solid #ffffff;
            filter: drop-shadow(0 0 10px var(--main));
        }

        @media (max-width: 768px) {
            .btn-main {
                width: 150px;
                padding: 15px;
                margin-right: 5px;
            }

            .icon-font {
                font-size: 3em;
            }
        }

        .font-bold {
            font-weight: bold;
            font-size: 1.25rem;
            white-space: nowrap;
        }

        .bdr1vh {
            box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
            border: 1px solid var(--sub);
            border-radius: 1vh;
            filter: drop-shadow(0 0 10px var(--main));
        }

        .bg-main80 {
            background-color: var(--main);
        }

        .text-strongest {
            font-family: 'Kanit', sans-serif;
            font-weight: 600;
        }

        .text-font {
            color: var(--font);
        }

        .text-font:hover {
            color: var(--font);
        }

        .typewrite {
            color: #ffffff;
        }

        .typewrite:hover {
            color: #ffffff;
        }
    </style>

</head>
<body>
    <main>
        <?php if ($tst['ui'] == "light") : ?>
            <div class="bg-cover" style="background-image: linear-gradient(to left, white, transparent 60%),linear-gradient(to top, white, transparent 60%),url(<?= $config['bg2'] ?>);"></div>
        <?php endif ?>
        <?php if ($tst['ui'] == "dark") : ?>
            <div class="bg-cover" style="background-image: linear-gradient(to left, black, transparent 60%),linear-gradient(to top, black, transparent 60%),url(<?= $config['bg2'] ?>);"></div>
        <?php endif ?>
            <div class="container-sm">
            </div>
            <div class="bg-80 p-3">
            <div class="bg-80-center">
                <center data-aos="fade-up" id="img-load" class="aos-init aos-animate" style="margin-top: 0px; transform: scale(1);">
                    <div><img src="<?php echo $config['logo']; ?>" class="float-ani" width="300"></div>
                </center>
                <div>
                    <center class="letter" style="opacity: 1; transform: translateY(0px) translateZ(0px);">
                        <h1 style="font-size: 50px" class="text-font text-strongest aos-init aos-animate" data-aos="fade-up" data-aos-delay="2200" data-aos-duration="800"><?php echo $config['name']; ?></h1>
                        <div class="bg-main80 shadow-main mb-4 aos-init aos-animate" style="width: 14%; border-radius: 5px; height: 5px;" data-aos="fade-up" data-aos-delay="2300" data-aos-duration="800">
                        </div>
                        <style>
                            .ic-home {
                                font-size: 55px;
                            }
                        </style>
                        <center>
                            <div class="col-lg-4 col-10">
                                <div class="bdr1vh bg-main80 ps-2 pe-2 shadow-main aos-init aos-animate" style="" data-aos="fade-up" data-aos-delay="2400" data-aos-duration="800">
                                    <h5 style="font-size: 16px; margin-top: 4px;">
                                        <a href="" class="typewrite" style="text-decoration: none;"><span class="wrap" id="typewriter"></span></a>
                                    </h5>
                                </div>
                            </div>
                        </center>
                        <div class="mt-2 aos-init aos-animate" data-aos="fade-up">
                            <a href="?page=login" class="btn-main btn btnm bdc mt-2 icon-font">
                                <i class="fa-solid fa-sign-in ic-home" style="color: #ffffff;"></i>
                                <span class="font-bold mt-3" style="color: #ffffff;">เข้าสู่ระบบเลย</span>
                            </a>
                            <a href="?page=home" class="btn-main btn btnm bdc mt-2 icon-font ms-lg-2">
                                <i class="fa-solid fa-store ic-home" style="color: #ffffff;"></i>
                                <span class="font-bold mt-3" style="color: #ffffff;">เยี่ยมชมสินค้า</span>
                            </a>
                        </div>
                    </center> 
                </div>
            </div>
        </div>
    </main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const text = '<?php echo $config['des']; ?>';
        const typewriterElement = document.getElementById('typewriter');
        let index = 0;

        function type() {
            if (index < text.length) {
                typewriterElement.textContent += text.charAt(index);
                index++;
                setTimeout(type, 100);  // Adjust the speed here
            }
        }

        type();
    });
</script>
</body>
</html>