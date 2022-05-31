<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        main>.container {
            padding: 60px 15px 0;
        }

    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
            </div>
        </nav>
    </header>
    <main class="flex-shrink-0">
        <div class="container">
            <div class="row" id="post">
                {{-- Code Append here --}}
            </div>

        </div>
    </main>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        var page = 1;
        autoLoadData(page);
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                autoLoadData(++page);
            }
        });

        function autoLoadData(page) {
            $.ajax({
                    url: '?page=' + page,
                    type: 'get',
                })
                .done(function(data) {
                    if (data.length == 0) {
                        $('#table').DataTable();
                        return;
                    } else {
                        $('#post').append(data);
                    }
                })
        }
    </script>
</body>

</html>
