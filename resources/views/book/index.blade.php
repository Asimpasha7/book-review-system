<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Book - Review System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">



    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        footer {
            margin-top: auto;
        }
    </style>
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="homepage.html" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">Book Review System</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ $user->first_name ?? '' }} </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/login">
                                < <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </header>

    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link " href="homepage">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a> 
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a> 
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('index.book') }}">Books</a> 
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index.review') }}">Reviews</a> 
            </li>
        </ul>
    </aside>


    <main id="main" class="main">
    <div class="block-header bg-gd-sea block-header-default">
        <h3 class="block-title"></h3>
            <div class="block-options">
                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <a class="btn btn-sm btn-danger me-2" href="{{ route('book.create') }}">
                                <i class="fa fa-plus"></i> Add
                            </a>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="">
            <div class="container">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>{{ $message }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


                <h2>Books</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publication</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $key => $book)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->publication }}</td>
                            <td>{{ $book->quantity }}</td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-primary me-2" href="{{ route('book.edit', $book->id) }}">Edit</a>
                                    <form action="{{ route('book.destroy', $book->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger me-2">Delete</button>
                                    </form>
                                    
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align: center;">No invoices available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>



    <footer id="footer" class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center text-lg-start">
                    <div class="credits">
                        Designed by <a href="https://www.linkedin.com/in/asim-pasha-25b222180/">Asim Pasha</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>