<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
            <!-- Styles -->
            <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                User Details
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th>Name</th>
                      <th>Phone Number</th>
                      <th>Gender</th>
                      <th>Address</th>
                      <th>Profile picture</th>
                        </tr>
                    
                    </thead>
                    <tbody> 
                        <tr>
                        <td><?php echo e($user->name); ?></td>
                     <td><?php echo e($user->phone_number); ?></td>
                     <td>

                     <?php if($user->gender == 0): ?>
                Male
            <?php else: ?>
                Female
            <?php endif; ?>
                     </td>
                     <td><?php echo $user->address; ?></td>
                     <td>
                     <img src="<?php echo e(asset('images/'.$user->image)); ?>" alt="profile picture" width="100px" height="100px"></td>
                     </td>
                        </tr>
                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\RegisterForm\resources\views/show.blade.php ENDPATH**/ ?>