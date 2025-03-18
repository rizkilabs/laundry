<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Customer Lists</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Customer Name</th>
                            <th>Photo</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Deleted At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if ($koneksi->connect_error) {
                            die("Connection failed: " . $koneksi->connect_error);
                        }

                        $sql = "SELECT id, customer_name, photo, address, created_at, updated_at, deleted_at FROM customers";
                        $result = $koneksi->query($sql);

                        if ($result->num_rows > 0) {
                            $no = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . htmlspecialchars($row['customer_name']) . "</td>";
                                echo "<td>";
                                if (!empty($row['photo'])) {
                                    echo "<img src='" . htmlspecialchars($row['photo']) . "' alt='Photo' width='50'>";
                                } else {
                                    echo "No Photo";
                                }
                                echo "</td>";
                                echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                                echo "<td>" . (empty($row['created_at']) ? '-' : htmlspecialchars($row['created_at'])) . "</td>";
                                echo "<td>" . (empty($row['updated_at']) ? '-' : htmlspecialchars($row['updated_at'])) . "</td>";
                                echo "<td>" . (empty($row['deleted_at']) ? '-' : htmlspecialchars($row['deleted_at'])) . "</td>";
                                echo "<td>
                                        <a href='edit_customer.php?id=" . $row['id'] . "' class='btn btn-sm btn-primary'>Edit</a> | 
                                        <a href='delete_customer.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                    </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No data found</td></tr>";
                        }

                        $koneksi->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>