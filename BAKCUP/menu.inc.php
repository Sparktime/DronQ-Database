        <ul class="navbar-nav">
            <li class="nav-item">
                <a href = "." class="navbar-brand">Home</a>
            </li>
            <li class="nav-item">
                <a href = "customer-list.php" class="nav-link">Customers</a>
            </li>
            <li class="nav-item">
                <a href = "reseller-list.php" class="nav-link">Resellers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">Products</a>
            </li>
            <li class="nav-item">
                <a href = "order-list.php" class="nav-link">Orders</a>
            </li>
            <li class="nav-item">	
                <a href = "create-tables.php" class="btn btn-danger navbar-btn" onclick="resetfunction()">Reset Database</a>
            </li>
            <!--<a href = "customer-list-2.php">klanten (join)</a>-->
        </ul>

<!-- Warning before reset -->
        <script>
            function resetfunction() {
                var txt;
                var r = confirm("Are you sure you want to reset the database?");
                if (r == true) {
                    txt = "Reset";}
                else {txt = "Cancel";}
                document.getElementById("demo").innerHTML = txt;
                }
        </script>
