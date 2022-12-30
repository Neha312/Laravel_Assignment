@include('layout.link')
<!DOCTYPE html>
<html>
<title>Task</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>
    <!-- Sidebar -->
    <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
        <button onclick="w3_close()" class="w3-bar-item w3-large" style="background-color:lightgray">CLOSE
            &times;</button>
        <a href="/user/index" class="w3-bar-item w3-button">USER</a>
        <a href="/role/index" class="w3-bar-item w3-button">ROLE</a>
        <a href="/permission/index" class="w3-bar-item w3-button">PERMISSION</a>
        <a href="/module/index" class="w3-bar-item w3-button">MODULE</a>
    </div>
    <script>
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
        }
    </script>
</body>

</html>
