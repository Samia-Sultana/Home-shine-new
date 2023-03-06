<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Maknoon Lifestyle</title>

    <!---===========favicon=====-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/logo/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/logo/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/logo/favicon/site.webmanifest">

    <!--======== Bootstrap 4.6===-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--======== font awesome===-->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!---======= owl carousel======-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <!---======= Header css-->
    <link rel="stylesheet" href="assets/css/header-css/reset.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">


</head>


<body class="pattern-bg">


<table class="myTable display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table>
   
    


    <!---=====jquery====-->
    
    <script
  src="https://code.jquery.com/jquery-3.6.2.min.js"
  integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA="
  crossorigin="anonymous"></script>
    <!--=====popper js=====-->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <!--=====bootstrap=====-->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!--=====Owl carousel=====-->
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <!--=====header script=====-->
    <script src="{{asset('assets/js/script.js')}}"></script>
    <!--=====header script=====-->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
 <script type="text/Javascript">

    $(document).ready( function () {
    $('.myTable').DataTable();
    });
   
    </script>


    <script>
        /* Set the width of the side navigation to 250px */
        function openNav() {
            if ($(window).width() > 600) {
                document.getElementById("mySidenav").style.width = "23vw";

            } else {
                document.getElementById("mySidenav").style.width = "90vw";
            }
        }

        /* Set the width of the side navigation to 0 */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";

        }
    </script>

    <script type="text/javascript">
        $(".btn-submit").click(function(e) {
            e.preventDefault();

            var $button = $(this);
            var productId = $button.parent().find("input:even").val();
            var productSku = $button.parent().find("input:odd").val();
            console.log(productId,productSku);
            var quantity = 1;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('addToCart') }}",
                data: {
                    productId: productId,
                    productSku: productSku,
                    quantity: quantity
                },
                success: function(data) {
                    console.log(JSON.parse(data.cart));
                }
            });

        });
    </script>
    

    <script>
        /******newsletter */
        let input = document.querySelector('#newsletter');
        let labelText = document.querySelector('.label-text');
        let root = document.querySelector('body');

        input.addEventListener('click', () => {
            labelText.classList.add('label-text-up');
        });

        document.addEventListener('mousedown', () => {
            if (!input.value) {
                labelText.classList.remove('label-text-up');
            }
        });
    </script>

</body>

</html>