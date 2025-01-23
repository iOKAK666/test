<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Defenders - Control Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://kit-pro.fontawesome.com/releases/v6.2.0/css/pro.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@600&family=Kanit&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-color: #ededed;
        }
        * {
            font-family: 'Kanit', sans-serif; 
        }
        body {
            background-color: var(--bg-color);
        }
        .table-light {
            --bs-table-color: #000;
            --bs-table-bg: var(--bg-color);
            --bs-table-border-color: #c6c7c8;
            --bs-table-striped-bg: #ecedee;
            --bs-table-striped-color: #000;
            --bs-table-active-bg: #dfe0e1;
            --bs-table-active-color: #000;
            --bs-table-hover-bg: #e5e6e7;
            --bs-table-hover-color: #000;
            color: var(--bs-table-color);
            border-color: var(--bs-table-border-color);
        }

        thead.table-light {
            background-color: #f8f9fa;
        }

        thead.table-light th {
            text-align: center;
            border-bottom: 2px solid #dee2e6;
        }

        thead.table-light th:first-child {
            border-top-left-radius: 1vh;
        }

        thead.table-light th:last-child {
            border-top-right-radius: 1vh;
        }

    </style>

</head>
<body>
    <div class="container-sm mt-2">
        <div class="bg-white border border-2 shadow-sm" style="border-radius: 1vh;">
            <div class="p-3">
                <div class="align-self-center">
                    <a class="btn btn-outline-success mt-1" type="submit">Add Account</a>
                    <a class="btn btn-outline-danger mt-1" type="submit">Delete Account</a>
                </div>
                <div class="bg-white border border-2 mt-2 shadow-sm" style="border-radius: 1.5vh;">
                    <div class="p-3">
                        <div class="table-responsive">
                            <table class="table table-borderless text-center" style="border-radius: 1vh;">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">
                                            <input class="form-check-input" type="checkbox" value="" id="selectAll">
                                        </th>
                                        <th scope="col" style="color: #707070;">Website</th>
                                        <th scope="col" style="color: #707070;">Domain</th>
                                        <th scope="col" style="color: #707070;">Datebuy</th>
                                        <th scope="col" style="color: #707070;">Servicelife</th>
                                        <th scope="col" style="color: #707070;">Online</th>
                                        <th scope="col" style="color: #707070;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <input class="form-check-input rowCheckbox" type="checkbox" value="">
                                        </th>
                                        <td>Test1</td>
                                        <td>Roblox1</td>
                                        <td>100</td>
                                        <td>200</td>
                                        <td><i class="fa-duotone fa-earth-oceania" style="--fa-primary-color: #24ff32; --fa-secondary-color: #24ff32; --fa-secondary-opacity: 1;"></i></td>
                                        <td>
                                            <a href="" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">⋮</a>
                                        </td>
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Test1</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text" id="basic-addon1">Website</span>
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
                                                    </div>
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text" id="basic-addon1">Domain</span>
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
                                                    </div>
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text">
                                                        <?php
                                                        function pingDomain($domain){
                                                            $starttime = microtime(true);
                                                            $file      = @fsockopen($domain, 80, $errno, $errstr, 10);
                                                            $stoptime  = microtime(true);
                                                            $status    = 0;

                                                            if (!$file){
                                                                $status = -1; 
                                                            } else {
                                                                fclose($file);
                                                                $status = ($stoptime - $starttime) * 1000;
                                                                $status = floor($status);
                                                            }
                                                            return $status;
                                                        }

                                                        $domain = "xdnvc.xyz"; 
                                                        $response = pingDomain($domain);

                                                        if ($response == -1) {
                                                            echo "Site is down!";
                                                        } else {
                                                            echo "Ping " . $response . " ms.";
                                                        }

                                                        ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary">Viewsite</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <input class="form-check-input rowCheckbox" type="checkbox" value="">
                                        </th>
                                        <td>Test2</td>
                                        <td>Roblox2</td>
                                        <td>100</td>
                                        <td>200</td>
                                        <td><i class="fa-duotone fa-earth-oceania" style="--fa-primary-color: #eeff00; --fa-secondary-color: #eeff00; --fa-secondary-opacity: 1;"></i></td>
                                        <td><a href="" style="text-decoration: none;">⋮</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <input class="form-check-input rowCheckbox" type="checkbox" value="">
                                        </th>
                                        <td>Test3</td>
                                        <td>Roblox3</td>
                                        <td>100</td>
                                        <td>200</td>
                                        <td><i class="fa-duotone fa-earth-oceania" style="--fa-primary-color: #ff2424; --fa-secondary-color: #ff2424; --fa-secondary-opacity: 1;"></i></td>
                                        <td><a href="" style="text-decoration: none;">⋮</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.rowCheckbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>
</body>
</html>