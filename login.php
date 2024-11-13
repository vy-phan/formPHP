<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <!-- 
        bài 2 câu 1 Tạo chức năng đăng kí . Tạo file page/register xử lý chức năg đăng kí 
        mô tả xử lí chức năng người dùng dùng đăng nhập thông qua qua form ở trang đăng kí trang page/register.php
        kiểm tra tên đăng nhập đã tồn tại trong file user.txt hay chưa . Nếu đã tồn tại ko báo lỗi , néu chưa thì thêm thông tin vào file và chuyển hướng đến trang đăng nhập login.php 
        câu b tạo chức năng đăng nhập giống bài trước tạo file pagephp xử lsi chức năg đăng nhập . Mô tả xử lí chức năng người dùng nhập tên dăng nhập và mật khẩu qua form đăng nhập trong php kiểm tra thông tin đăng nhập có khớip với dữ liệu file trong txt hay khong ? 
        Nếu đăng nhập thành công chuyển đến trang hiển thị danh sách công việc page/text.php (xem ở câu 2 ) nếu đăng nhập thất bại thì báo lỗi 
        -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center">Login</h2>
                            <p class="card-text">
                                <!-- gui bag phuong thuc post -->
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="" class="form-label">Username:</label>
                                    <input type="text" class="form-control" name="username" id=""
                                        aria-describedby="helpId" placeholder="" />
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Password:</label>
                                    <input type="password" class="form-control" name="password" id=""
                                        aria-describedby="helpId" placeholder="" />
                                </div>
                                <button type="submit" class="btn btn-outline-primary">
                                    Login
                                </button> <br>
                                <?php
                                $username = null;
                                $password = null;

                                if (isset($_POST['username']) and isset($_POST['password'])) {
                                    $username = $_POST['username'];
                                    $password = $_POST['password'];
                                    // đọc file 
                                    $file = 'user.txt';
                                    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                                    $users = [];

                                    // đọc từng file lưa vào mảng 
                                    foreach ($lines as $line) {
                                        $data = explode(',', $line);
                                        if (count($data) == 2) {
                                            $users[] = [
                                                'username' => $data[0],
                                                'password' => $data[1]
                                            ];
                                        }
                                    }

                                    if (!empty($username) && !empty($password)) {
                                        $userExists = false;
                                        foreach ($users as $user) {
                                            if ($user['username'] == $username and $user['password'] == $password) {
                                                $userExists = true;
                                                break;
                                            }
                                        }
                                        if ($userExists) {
                                            echo '<div class="alert alert-success" role="alert"><strong>Đăng nhập thành công</strong></div>';
                                            header('Location: ./../cau2/page.php');
                                        } else {
                                            echo '<div class="alert alert-danger" role="alert"><strong>Tên đăng nhập hoặc mật khẩu không đúng</strong></div>';
                                        }
                                    } else {
                                        echo '<div class="alert alert-danger" role="alert"><strong>Vui lòng nhập đầy đủ thông tin</strong></div>';
                                    }
                                }
                                ?>
                                <a href="register.php">You don't have account ? Here register account</a>
                            </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </header>
    <main>




    </main>
    <footer>

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>