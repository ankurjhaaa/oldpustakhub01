<?php include_once "db.php"; ?>
<?php
$email = $_SESSION['email'];
if ($email != "akj41731@gmail.com") {
    echo "<script>window.location.href='login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <!-- Tailwind CSS -->`
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body class="bg-gray-100">
    
    <nav class="sticky top-0 z-50 bg-blue-600 p-4 flex items-center">
        <a href="javascript:history.back()" class="text-white text-xl mr-4">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <h1 class="text-white text-lg font-bold">User List (<?= mysqli_num_rows(mysqli_query($connect,"SELECT * FROM users")) ?>)</h1>
    </nav>


    <!-- Main Container -->
    <div class="container mx-auto p-4">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Full Name</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Mobile</th>
                        <th class="px-4 py-2 text-left">DP</th>
                        <th class="px-4 py-2 text-left">Is Public</th>
                        <th class="px-4 py-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $call_user = mysqli_query($connect, "SELECT * FROM users ORDER BY id DESC");

                    while ($user = mysqli_fetch_array($call_user)) { ?>

                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2"><?= $user['id'] ?></td>
                            <td class="px-4 py-2"><?= $user['firstname'] ?>     <?= $user['lastname'] ?></td>
                            <td class="px-4 py-2"><?= $user['email'] ?></td>
                            <td class="px-4 py-2"><?= $user['mobile'] ?></td>
                            <td class="px-4 py-2">
                                
                            </td>

                            <!-- popupppppppppppppppppppppppppp -->
                            


                            
                            
                        </tr>

                    <?php } ?>
                    <!-- Sample Row 1 -->


                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

<!-- popup ppppppppppppppppppppppppppp -->
<script>
    function openUserPopup(element) {
        // Extract data attributes from clicked image
        var id = element.getAttribute('data-id');
        var firstName = element.getAttribute('data-first_name');
        var lastName = element.getAttribute('data-last_name');
        var email = element.getAttribute('data-email');
        var mobile = element.getAttribute('data-mobile');
        var dp = element.getAttribute('data-dp');

        // Set modal image source
        document.getElementById('modalUserImage').src = "dp/" + dp;

        // Populate user details in modal
        var detailsHtml = `
        <p class="font-bold">ID: ${id}</p>
        <p class="font-bold">Name: ${firstName} ${lastName}</p>
        <p>Email: ${email}</p>
        <p>Mobile: ${mobile}</p>
    `;
        document.getElementById('modalUserDetails').innerHTML = detailsHtml;

        // Display the modal
        document.getElementById('userModal').classList.remove('hidden');
    }

    function closeUserPopup() {
        // Hide the modal
        document.getElementById('userModal').classList.add('hidden');
    }
</script>